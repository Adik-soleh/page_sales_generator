# 🎬 Video Script — SalesForge Technical Walkthrough

**Estimasi durasi: 5-7 menit**

---

## 🎙️ OPENING (30 detik)

> "Hai, selamat datang. Di video ini saya akan menjelaskan project yang saya buat, yaitu **SalesForge** — sebuah AI-powered Sales Page Generator.
>
> Singkatnya, user cukup input informasi produk mereka, lalu AI akan otomatis generate seluruh copy untuk sales page yang siap pakai — lengkap dengan headline, benefits, features, pricing, dan call-to-action."

---

## 🛠️ TECH STACK (45 detik)

> "Untuk tech stack, saya menggunakan:
>
> - **Laravel 13** sebagai backend framework — menggunakan Blade template engine
> - **Tailwind CSS** untuk styling, dengan custom design system warna orange, kuning, hitam, dan putih
> - **PostgreSQL** sebagai database untuk menyimpan data user dan sales pages
> - **OpenRouter API** yang terkoneksi ke model **Google Gemma 4** untuk AI content generation
> - **Alpine.js** untuk interaktivitas di frontend
> - **SweetAlert2** untuk confirmation dialog dan notifikasi
> - Dan semua di-deploy ke **Render**"

---

## 🏠 DEMO: LANDING PAGE (30 detik)

*[Tunjukkan halaman utama / di browser]*

> "Ini adalah landing page dari SalesForge. Di sini user bisa melihat overview tentang app — bagaimana cara kerjanya dalam 3 step, fitur-fitur yang tersedia, dan langsung bisa register atau login."

---

## 🔐 DEMO: AUTHENTICATION (30 detik)

*[Tunjukkan register → login → dashboard]*

> "Untuk authentication saya menggunakan Laravel Breeze. User bisa register dengan nama, email, dan password. Setelah login, user masuk ke dashboard yang menampilkan statistik — berapa total sales page yang sudah dibuat."

---

## ✏️ DEMO: CREATE SALES PAGE (1 menit)

*[Buka halaman Create, isi form, submit]*

> "Ini bagian inti dari aplikasi. User mengisi form dengan data produk:
> - Nama produk
> - Deskripsi
> - Key features — dipisah dengan koma
> - Target audience
> - Harga
> - Unique selling points
> - Dan pilih design template — ada Modern, Bold, dan Minimal
>
> Setelah klik 'Generate Sales Page', data dikirim ke backend, lalu Laravel memanggil OpenRouter API. AI akan menganalisis informasi produk dan generate konten sales page dalam format JSON yang structured."

---

## 👁️ DEMO: LIVE PREVIEW (1 menit)

*[Tunjukkan halaman preview / show]*

> "Ini hasilnya — sales page yang di-generate AI langsung ditampilkan dalam format landing page yang profesional.
>
> Ada beberapa section: Hero dengan headline dan sub-headline, description section, benefits dengan numbered cards, features breakdown, stats bar, testimonial dengan star rating, pricing card, dan final CTA.
>
> Yang menarik, setiap section punya tombol regenerate yang muncul saat hover. Kalau misalnya headline-nya kurang cocok, user bisa klik tombol refresh dan AI akan generate ulang section itu saja — tanpa mengubah section lainnya. Ini menggunakan AJAX call ke endpoint khusus."

---

## 🎨 DEMO: TEMPLATE SWITCHING (30 detik)

*[Tunjukkan perbedaan Modern vs Bold vs Minimal]*

> "Ada 3 design template yang bisa dipilih:
> - **Modern** — tema warm dengan gradient orange, cocok untuk SaaS dan tech products
> - **Bold** — dark mode dengan efek glow, cocok untuk produk yang lebih premium
> - **Minimal** — layout editorial yang clean, cocok untuk produk yang simpel dan elegan
>
> User bisa ganti template kapan saja melalui halaman Edit tanpa perlu regenerate konten."

---

## 📦 DEMO: EXPORT HTML (30 detik)

*[Klik Export, buka file HTML yang didownload]*

> "Salah satu bonus feature-nya adalah HTML Export. User bisa download sales page-nya sebagai file HTML standalone — lengkap dengan inline CSS dan Google Fonts. File ini bisa langsung di-upload ke hosting manapun tanpa dependency tambahan. Dan yang penting, tema export-nya menyesuaikan dengan template yang dipilih."

---

## ⚙️ TECHNICAL DEEP DIVE (1.5 menit)

*[Bisa tunjukkan code / diagram]*

> "Dari sisi teknis, ada beberapa hal yang menarik:
>
> **Pertama, AI Integration** — Saya menggunakan OpenRouterService sebagai service class yang handle semua komunikasi dengan AI. Prompt-nya dirancang khusus agar AI mengembalikan JSON yang structured, bukan free text. Saya juga implement multi-model fallback — kalau model utama gagal atau kena rate limit, sistem otomatis coba model alternatif.
>
> **Kedua, Authorization** — Setiap user hanya bisa akses sales page milik mereka sendiri. Ini dijaga oleh Laravel Policy yang mengecek user_id di setiap operasi view, edit, dan delete.
>
> **Ketiga, Database Design** — Konten AI disimpan sebagai JSON column di PostgreSQL. Ini memungkinkan kita menyimpan structured data seperti array of benefits dan features breakdown tanpa perlu tabel terpisah. Ketika user regenerate satu section, kita cukup update field JSON tersebut.
>
> **Keempat, UX Details** — Saya menggunakan SweetAlert2 untuk semua confirmation dialog dan notifikasi, loading states dengan spinner saat proses generate, dan micro-animations untuk hover effects."

---

## 🔒 DEMO: DELETE WITH SWEETALERT (15 detik)

*[Klik delete, tunjukkan SweetAlert confirmation]*

> "Untuk operasi delete, saya menggunakan SweetAlert2 yang menampilkan modal konfirmasi yang lebih user-friendly dibanding alert bawaan browser."

---

## 🏁 CLOSING (30 detik)

> "Jadi itulah SalesForge — AI Sales Page Generator yang saya buat. Aplikasi ini mendemonstrasikan full-stack development dengan Laravel, integrasi AI API, responsive design, dan fitur-fitur interaktif yang fokus pada user experience.
>
> Terima kasih sudah menonton. Jika ada pertanyaan, silakan hubungi saya."

---

## 📝 Tips Saat Rekam:

1. **Buka browser** dengan app yang sudah di-deploy (URL Render)
2. **Zoom browser** sedikit (Cmd + =) agar tulisan terlihat jelas
3. **Gunakan screen recorder** seperti OBS atau QuickTime
4. **Bicara pelan dan jelas** — tidak perlu buru-buru
5. **Siapkan data dummy** yang sudah diisi agar tidak perlu mengetik saat demo
6. **Pastikan internet stabil** agar AI generation tidak timeout saat demo
