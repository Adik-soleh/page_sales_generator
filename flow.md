Build a web application that transforms raw product/service information into a complete,
structured sales page with persuasive marketing copy.
What You Must Build:
1. User Authentication — Register, login, and logout functionality using Laravel Auth.
2. Product Input Form — A structured form where users provide: product/service name,
description, key features (comma-separated or multi-input), target audience, price, and
any unique selling points.
3. AI Sales Page Generation — Send product data to an LLM API and generate a
structured sales page that includes: a compelling headline, sub-headline, product
description, benefits section, features breakdown, social proof placeholder, pricing
display, and a clear call-to-action. Output must be rendered as a styled, presentable
page — not raw text.
4. Saved Pages — Save all generated sales pages to the database. Users can view, edit
(re-generate), and delete their past pages.
5. Live Preview — Display the generated sales page in a preview mode that resembles a
real landing page layout.
Bonus (Optional):
•
Export sales page as standalone HTML file
•
Multiple design templates/styles to choose from
•
Section-by-section regeneration (regenerate only the headline, or only the CTA)


requerment:
database : postgresql (DATABASE_URL="postgresql://sm:@localhost:5432/sales_page_db?schema=public")
tech : Laravel (Blade + Tailwind)
deploy : render
api_keys openrouter : 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


sudah terinstal :
Composer version 2.9.5 2026-01-29 11:40:53 PHP version 8.5.4 (/opt/homebrew/Cellar/php/8.5.4/bin/php) Run the "diagnose" command to get more detailed diagnostics output