# SalesForge — AI Sales Page Generator

## 📋 Technical Documentation

---

### 1. Project Overview

**SalesForge** is a full-stack web application that transforms raw product information into professional, high-converting sales pages using AI-powered copywriting. Users simply input their product details — name, description, features, target audience, and price — and the system generates a complete landing page with headlines, benefits, features breakdown, testimonials, pricing, and call-to-action sections.

### 2. Tech Stack

| Component | Technology |
|-----------|-----------|
| **Backend Framework** | Laravel 13 (PHP 8.4) |
| **Frontend** | Blade Templates + Tailwind CSS v3 |
| **Database** | SQLite |
| **AI Integration** | OpenRouter API (Google Gemma 4 31B) |
| **JavaScript** | Alpine.js (reactivity), Axios (HTTP), SweetAlert2 (modals) |
| **Build Tool** | Vite |
| **Server** | Apache (Docker) |
| **Deployment** | Render (Docker) |

### 3. Architecture & Approach

#### 3.1 Design Pattern — MVC (Model-View-Controller)

```
┌──────────────┐     ┌─────────────────────┐     ┌──────────────┐
│    Views     │────▶│    Controllers      │────▶│   Models     │
│  (Blade)     │◀────│  (SalesPageController│◀────│ (SalesPage)  │
│              │     │   + Auth Controllers)│     │              │
└──────────────┘     └──────────┬──────────┘     └──────┬───────┘
                               │                        │
                    ┌──────────▼──────────┐     ┌──────▼───────┐
                    │  OpenRouterService  │     │    SQLite    │
                    │  (AI Integration)   │     │   Database   │
                    └─────────────────────┘     └──────────────┘
```

#### 3.2 AI Integration Logic

The `OpenRouterService` handles all AI communication:

1. **Structured Prompting** — The system sends a carefully crafted prompt that instructs the AI to return valid JSON with specific sections (headline, sub_headline, description, benefits, features_breakdown, social_proof, pricing_display, call_to_action).

2. **Multi-Model Fallback** — If the primary model (Google Gemma 4) is rate-limited, the system automatically falls back to alternative free models:
   - `google/gemma-4-31b-it:free` (primary)
   - `google/gemma-3-27b-it:free` (fallback 1)
   - `google/gemma-4-26b-a4b-it:free` (fallback 2)
   - `meta-llama/llama-3.3-70b-instruct:free` (fallback 3)

3. **Response Parsing** — The AI response is cleaned (removing any markdown formatting), parsed as JSON, and validated to ensure all required fields exist with fallback defaults.

#### 3.3 Database Schema

```sql
sales_pages
├── id (Primary Key)
├── user_id (Foreign Key → users.id)
├── product_name (VARCHAR 255)
├── description (TEXT)
├── features (JSON - array of strings)
├── target_audience (VARCHAR 255)
├── price (DECIMAL 10,2 - nullable)
├── selling_points (TEXT - nullable)
├── generated_content (JSON - AI-generated content)
├── template (VARCHAR - modern/bold/minimal)
├── created_at (TIMESTAMP)
└── updated_at (TIMESTAMP)
```

The `generated_content` JSON column stores the complete AI output:
```json
{
  "headline": "...",
  "sub_headline": "...",
  "description": "...",
  "benefits": ["...", "...", "...", "..."],
  "features_breakdown": [
    {"title": "...", "description": "..."},
    {"title": "...", "description": "..."},
    {"title": "...", "description": "..."}
  ],
  "social_proof": "...",
  "pricing_display": "...",
  "call_to_action": "..."
}
```

#### 3.4 Authorization & Security

- **Authentication**: Laravel Breeze handles registration, login, email verification, and password reset.
- **Authorization**: A `SalesPagePolicy` ensures users can only access, edit, and delete their own sales pages.
- **CSRF Protection**: All forms include CSRF tokens.
- **Input Validation**: Server-side validation on all form submissions.

### 4. Core Features

| Feature | Description |
|---------|-------------|
| **User Authentication** | Register, login, logout, profile management |
| **AI Content Generation** | Input product data → AI generates complete sales copy |
| **3 Design Templates** | Modern (warm tones), Bold (dark mode), Minimal (clean/editorial) |
| **Live Preview** | Full landing page preview with real styling |
| **Section Regeneration** | AJAX-powered regeneration of individual sections (headline, CTA, etc.) |
| **HTML Export** | Download sales page as standalone HTML file with inline styles |
| **Dashboard** | Statistics overview with quick access to recent pages |
| **CRUD Operations** | Create, read, update, delete sales pages |
| **SweetAlert2** | Beautiful confirmation dialogs and toast notifications |
| **Responsive Design** | Fully responsive on mobile, tablet, and desktop |

### 5. UI/UX Design Decisions

- **Color Palette**: Neutral warm-gray / stone tones (#1C1917, #292524, #78716C, #FAFAF9) — chosen for a clean, professional, and modern feel.
- **Typography**: Outfit (headings) + Inter (body) from Google Fonts — modern and highly readable.
- **Design Philosophy**: Minimal, content-focused design with subtle borders, clean cards, and restrained use of color to keep attention on the content.
- **Template System**: Each template has its own visual identity while sharing the same data structure, making it easy to switch templates without regenerating content.

### 6. API Integration Details

**Endpoint**: `POST https://openrouter.ai/api/v1/chat/completions`

**Key configurations**:
- Temperature: 0.8 (for creative, varied output)
- Max tokens: 2500 (sufficient for detailed copy)
- Timeout: 90 seconds per model attempt
- System prompt: Explicitly instructs AI to avoid cliché buzzwords and write naturally

### 7. How to Run Locally

```bash
# Clone the repository
git clone <repository-url>
cd AI_Sales_Page_Generator

# Install dependencies
composer install
npm install

# Configure environment
cp .env.example .env
php artisan key:generate

# Set up SQLite database
touch database/database.sqlite

# Run migrations
php artisan migrate

# Build frontend assets
npm run build

# Start server
php artisan serve
```

### 8. Deployment (Render with Docker)

The application is deployed on **Render** using Docker:

```dockerfile
FROM php:8.4-apache
```

- **Runtime**: PHP 8.4 with Apache and mod_rewrite
- **Database**: SQLite (file-based, no external database service needed)
- **Port**: 8080
- **Build**: Vite compiles frontend assets during Docker build
- **Startup**: Migrations run automatically on container start

Environment variables to configure on Render:
- `APP_KEY` — Laravel application key
- `APP_ENV` — Set to `production`
- `APP_DEBUG` — Set to `false`
- `OPENROUTER_API_KEY` — API key for AI content generation

---

*Built by Adik Soleh — 2026*
