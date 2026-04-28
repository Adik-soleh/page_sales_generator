<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GroqService
{
    protected string $apiKey;
    protected string $baseUrl;

    public function __construct()
    {
        $this->apiKey = trim(config('services.groq.api_key', env('GROQ_API_KEY', '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')));
        $this->baseUrl = "https://api.groq.com/openai/v1/chat/completions";
    }

    /**
     * Generate a complete sales page from product data.
     */
    public function generateSalesPage(array $productData): ?array
    {
        $prompt = $this->buildFullPrompt($productData);
        $response = $this->callApi($prompt);

        if ($response) {
            return $this->parseResponse($response);
        }

        return null;
    }

    /**
     * Regenerate a single section of a sales page.
     */
    public function regenerateSection(string $section, array $productData, array $currentContent): mixed
    {
        $prompt = $this->buildSectionPrompt($section, $productData, $currentContent);
        $response = $this->callApi($prompt);

        if ($response) {
            return $this->parseSectionResponse($response, $section);
        }

        return null;
    }

    /**
     * Call the Groq API.
     */
    protected function callApi(string $prompt): ?string
    {
        $systemPrompt = 'You are a senior marketing copywriter at a top agency. You write natural, human-sounding sales copy that feels authentic — never generic, never robotic, never cliché. Avoid overused phrases like "unlock", "revolutionize", "game-changer", "seamless", "cutting-edge". Write like a real human who genuinely believes in the product. Be specific, use concrete numbers and details. IMPORTANT: You must output ONLY a valid JSON object. Your response MUST start with "{" and end with "}". Do not include ANY explanations, reasoning, markdown code blocks, or extra text before or after the JSON.';

        $models = [
            'llama-3.3-70b-versatile',
            'llama3-8b-8192',
            'mixtral-8x7b-32768',
        ];

        foreach ($models as $model) {
            try {
                Log::info("Trying Groq model: {$model}");

                $response = Http::withToken($this->apiKey)
                ->timeout(90)->post($this->baseUrl, [
                    'model' => $model,
                    'messages' => [
                        ['role' => 'system', 'content' => $systemPrompt],
                        ['role' => 'user', 'content' => $prompt]
                    ],
                    'response_format' => ['type' => 'json_object'],
                    'temperature' => 0.8,
                ]);

                if ($response->successful()) {
                    $data = $response->json();
                    $content = $data['choices'][0]['message']['content'] ?? null;
                    if ($content) {
                        Log::info("Success with Groq model: {$model}");
                        return $content;
                    }
                }

                $status = $response->status();
                Log::warning("Groq model {$model} failed", [
                    'status' => $status,
                    'body' => substr($response->body(), 0, 300),
                ]);

                // If rate limited or server error, wait and try next model
                if ($status >= 500 || $status === 429) {
                    sleep(1);
                    continue;
                } else {
                    break;
                }

            } catch (\Exception $e) {
                Log::warning("Groq model {$model} exception: " . $e->getMessage());
                continue;
            }
        }

        Log::error('All Groq fallback models failed for API call');
        return null;
    }

    /**
     * Build the full sales page generation prompt.
     */
    protected function buildFullPrompt(array $data): string
    {
        $features = is_array($data['features']) ? implode(', ', $data['features']) : $data['features'];

        return <<<PROMPT
Write sales page copy for this product. Sound like a real person, not a robot. Be specific, mention real details from the product info. Avoid generic buzzwords.

Return ONLY valid JSON with this structure:

{
    "headline": "A punchy headline that makes people stop scrolling (max 10 words, be creative and specific to THIS product)",
    "sub_headline": "A clear explanation of what the product does and who it's for (max 30 words, be specific not vague)",
    "description": "A detailed, compelling paragraph about the product (3-4 sentences, include specific details from the product info, mention the target audience naturally, explain the real value)",
    "benefits": ["Specific benefit with detail (not just 2 words)", "Another concrete benefit the user will actually feel", "A benefit that addresses a real pain point", "A benefit that differentiates from alternatives"],
    "features_breakdown": [
        {"title": "Short Feature Name", "description": "2-3 sentences explaining this feature in detail. What does it actually do? Why should someone care? Be specific."},
        {"title": "Short Feature Name", "description": "2-3 sentences explaining this feature. Include concrete details, numbers, or examples where possible."},
        {"title": "Short Feature Name", "description": "2-3 sentences explaining this feature. Focus on the real-world impact for the user."}
    ],
    "social_proof": "Write a realistic-sounding testimonial quote with a specific result or experience (e.g. 'We increased our conversion rate by 34% in the first month')",
    "pricing_display": "A value-focused pricing statement that justifies the cost. Compare to alternatives or break down the value. Be specific.",
    "call_to_action": "Short, direct CTA (max 5 words, avoid generic 'Get Started')"
}

Product Details:
- Name: {$data['product_name']}
- Description: {$data['description']}
- Key Features: {$features}
- Target Audience: {$data['target_audience']}
- Price: {$data['price']}
- Unique Selling Points: {$data['selling_points']}

IMPORTANT: Return ONLY the JSON object. No extra text.
PROMPT;
    }

    /**
     * Build a section-specific regeneration prompt.
     */
    protected function buildSectionPrompt(string $section, array $productData, array $currentContent): string
    {
        $features = is_array($productData['features']) ? implode(', ', $productData['features']) : $productData['features'];
        $sectionLabels = [
            'headline' => 'a compelling, attention-grabbing headline (max 12 words)',
            'sub_headline' => 'a supporting sub-headline (max 25 words)',
            'description' => 'a persuasive product description (2-3 sentences)',
            'benefits' => 'an array of 4 key benefits as JSON array of strings',
            'features_breakdown' => 'an array of 3 feature objects with "title" and "description" keys as JSON',
            'social_proof' => 'a compelling social proof statement',
            'pricing_display' => 'a formatted pricing statement with value proposition',
            'call_to_action' => 'a strong CTA text (max 6 words)',
        ];

        $description = $sectionLabels[$section] ?? 'compelling marketing copy for this section';

        return <<<PROMPT
Regenerate ONLY the "{$section}" section for this sales page. Generate {$description}.

Product: {$productData['product_name']}
Description: {$productData['description']}
Features: {$features}
Target Audience: {$productData['target_audience']}
Price: {$productData['price']}

Current content of this section: {$this->formatCurrentContent($section, $currentContent)}

Generate a DIFFERENT and BETTER version. Return ONLY the new content for this section as JSON:
- For string sections: {"value": "your new content here"}
- For array sections (benefits): {"value": ["item1", "item2", "item3", "item4"]}
- For features_breakdown: {"value": [{"title": "...", "description": "..."}, ...]}

Return ONLY valid JSON.
PROMPT;
    }

    protected function formatCurrentContent(string $section, array $content): string
    {
        $value = $content[$section] ?? '';
        if (is_array($value)) {
            return json_encode($value);
        }
        return (string) $value;
    }

    /**
     * Parse the full generation response.
     */
    protected function parseResponse(string $response): ?array
    {
        $cleaned = $response;
        if (preg_match('/\{[\s\S]*\}/', $response, $matches)) {
            $cleaned = $matches[0];
        }

        $data = json_decode($cleaned, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            Log::error('Failed to parse Groq response as JSON', [
                'response' => $response,
                'error' => json_last_error_msg(),
            ]);
            return null;
        }

        // Ensure all required keys exist with defaults
        return [
            'headline' => $data['headline'] ?? 'Your Product Headline',
            'sub_headline' => $data['sub_headline'] ?? 'A compelling sub-headline for your product',
            'description' => $data['description'] ?? 'Product description will appear here.',
            'benefits' => $data['benefits'] ?? ['Benefit 1', 'Benefit 2', 'Benefit 3', 'Benefit 4'],
            'features_breakdown' => $data['features_breakdown'] ?? [],
            'social_proof' => $data['social_proof'] ?? 'Trusted by thousands of customers worldwide.',
            'pricing_display' => $data['pricing_display'] ?? 'Contact us for pricing.',
            'call_to_action' => $data['call_to_action'] ?? 'Get Started Now',
        ];
    }

    /**
     * Parse a section regeneration response.
     */
    protected function parseSectionResponse(string $response, string $section): mixed
    {
        $cleaned = $response;
        if (preg_match('/\{[\s\S]*\}/', $response, $matches)) {
            $cleaned = $matches[0];
        }

        $data = json_decode($cleaned, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            Log::error('Failed to parse section response', [
                'response' => $response,
                'section' => $section,
            ]);
            return null;
        }

        if (isset($data['value'])) {
            return $data['value'];
        }

        if (isset($data[$section])) {
            $val = $data[$section];
            // If it's something like {"pricing_display": {"value": "..."}}
            if (is_array($val) && isset($val['value'])) {
                return $val['value'];
            }
            return $val;
        }

        // If the AI returned a single-key JSON with some other name
        if (is_array($data) && count($data) === 1) {
            $val = reset($data);
            if (is_array($val) && isset($val['value'])) {
                return $val['value'];
            }
            return $val;
        }

        return null;
    }
}
