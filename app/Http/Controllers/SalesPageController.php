<?php

namespace App\Http\Controllers;

use App\Models\SalesPage;
use App\Services\GroqService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesPageController extends Controller
{
    protected GroqService $gemini;

    public function __construct(GroqService $gemini)
    {
        $this->gemini = $gemini;
    }

    /**
     * Display a listing of the user's sales pages.
     */
    public function index()
    {
        $salesPages = Auth::user()->salesPages()
            ->latest()
            ->paginate(9);

        return view('sales-pages.index', compact('salesPages'));
    }

    /**
     * Show the form for creating a new sales page.
     */
    public function create()
    {
        return view('sales-pages.create');
    }

    /**
     * Store a newly created sales page.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'features' => 'required|string',
            'target_audience' => 'required|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'selling_points' => 'nullable|string|max:2000',
            'template' => 'required|in:modern,bold,minimal',
        ]);

        // Convert comma-separated features to array
        $validated['features'] = array_map('trim', explode(',', $validated['features']));
        $validated['user_id'] = Auth::id();

        // Generate sales page content via AI
        set_time_limit(120);
        $generatedContent = $this->gemini->generateSalesPage($validated);

        if (!$generatedContent) {
            return back()
                ->withInput()
                ->with('error', 'Failed to generate sales page. Please try again.');
        }

        $validated['generated_content'] = $generatedContent;

        $salesPage = SalesPage::create($validated);

        return redirect()
            ->route('sales-pages.show', $salesPage)
            ->with('success', 'Sales page generated successfully!');
    }

    /**
     * Display the sales page preview.
     */
    public function show(SalesPage $salesPage)
    {
        $this->authorize('view', $salesPage);

        return view('sales-pages.show', compact('salesPage'));
    }

    /**
     * Show the form for editing the specified sales page.
     */
    public function edit(SalesPage $salesPage)
    {
        $this->authorize('update', $salesPage);

        return view('sales-pages.edit', compact('salesPage'));
    }

    /**
     * Update the specified sales page.
     */
    public function update(Request $request, SalesPage $salesPage)
    {
        $this->authorize('update', $salesPage);

        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'features' => 'required|string',
            'target_audience' => 'required|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'selling_points' => 'nullable|string|max:2000',
            'template' => 'required|in:modern,bold,minimal',
        ]);

        $validated['features'] = array_map('trim', explode(',', $validated['features']));

        // Re-generate content if requested
        if ($request->has('regenerate')) {
            set_time_limit(120);
            $generatedContent = $this->gemini->generateSalesPage($validated);

            if ($generatedContent) {
                $validated['generated_content'] = $generatedContent;
            } else {
                return back()
                    ->withInput()
                    ->with('error', 'Failed to regenerate content. Previous content retained.');
            }
        }

        $salesPage->update($validated);

        return redirect()
            ->route('sales-pages.show', $salesPage)
            ->with('success', 'Sales page updated successfully!');
    }

    /**
     * Remove the specified sales page.
     */
    public function destroy(SalesPage $salesPage)
    {
        $this->authorize('delete', $salesPage);

        $salesPage->delete();

        return redirect()
            ->route('sales-pages.index')
            ->with('success', 'Sales page deleted successfully!');
    }

    /**
     * Export the sales page as a standalone HTML file.
     */
    public function export(SalesPage $salesPage)
    {
        $this->authorize('view', $salesPage);

        $html = view('sales-pages.export', compact('salesPage'))->render();

        $filename = str_replace(' ', '_', strtolower($salesPage->product_name)) . '_sales_page.html';

        return response($html)
            ->header('Content-Type', 'text/html')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

    /**
     * Regenerate a specific section of the sales page.
     */
    public function regenerateSection(Request $request, SalesPage $salesPage)
    {
        $this->authorize('update', $salesPage);

        $request->validate([
            'section' => 'required|string|in:headline,sub_headline,description,benefits,features_breakdown,social_proof,pricing_display,call_to_action',
        ]);

        $section = $request->input('section');

        set_time_limit(120);
        $newContent = $this->gemini->regenerateSection(
            $section,
            $salesPage->toArray(),
            $salesPage->generated_content
        );

        if ($newContent === null) {
            return response()->json(['error' => 'Failed to regenerate section.'], 500);
        }

        $content = $salesPage->generated_content;
        $content[$section] = $newContent;
        $salesPage->update(['generated_content' => $content]);

        return response()->json([
            'success' => true,
            'section' => $section,
            'content' => $newContent,
        ]);
    }
}
