# Leads Management & WhatsApp Dual-Action Contact Unification Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Menyatukan 2 section kontak yang bertumpuk di homepage menjadi 1 section "Hubungi Kami" yang bersih dan anti-slop, dengan tombol "Hubungi Kami" yang otomatis menyimpan data leads ke database backend dan seketika membuka chat WhatsApp ke nomor sales resmi.

**Architecture:** 
- Backend: Endpoint `POST /leads` dengan rate limiting dan sanitasi data yang menyimpan rekaman ke tabel `leads`, lalu mengembalikan response JSON berupa URL WhatsApp yang pre-formatted.
- Admin Panel: `LeadResource` di Filament untuk tim sales memantau, memfilter, dan menindaklanjuti data prospek.
- Frontend: Refactor form di `welcome.blade.php` dan `kontak.blade.php` menggunakan AJAX submit non-blocking, menghapus banner CTA kedua yang dobel di homepage, menyederhanakan placeholder menjadi to-the-point ("Nama", "Nomor WhatsApp", "Perusahaan", dll.), serta mengubah label tombol menjadi "Hubungi Kami".

**Tech Stack:** Laravel 12, PHP 8.2, Livewire/Filament v3, Tailwind CSS v4, Pest PHP.

## Global Constraints
- Simpel & bersih: Header form cukup "Hubungi Kami".
- Placeholder to-the-point: "Nama", "Nomor WhatsApp", "Perusahaan", dsb. (tanpa embel-embel "Contoh Budi Santoso").
- Warna brand: Biru (`#0067b1`), Navy (`#00163c`), Putih (`#ffffff`), dilarang memakai kuning/oranye.
- Zero Lead Loss: Form wajib menyimpan data ke DB sebelum me-redirect ke WhatsApp.

---

### Task 1: Database Migration, Model & Factory `Lead`
**Files:**
- Create: `database/migrations/YYYY_MM_DD_create_leads_table.php`
- Create: `app/Models/Lead.php`
- Create: `database/factories/LeadFactory.php`

- [ ] Write migration for `leads` table:
  - `id`
  - `name` (string)
  - `phone` (string)
  - `company` (string, nullable)
  - `truck_series` (string, nullable)
  - `quantity` (string, nullable)
  - `location` (string, nullable)
  - `notes` (text, nullable)
  - `source` (string, default: 'homepage')
  - `status` (string, default: 'new') - values: `new`, `contacted`, `quoted`, `closed`, `cancelled`
  - `timestamps`
- [ ] Create Model `App\Models\Lead` with `$fillable` and helper casts.
- [ ] Run migration `php artisan migrate`.

### Task 2: Controller & Route Endpoint `POST /leads`
**Files:**
- Create: `app/Http/Controllers/LeadController.php`
- Edit: `routes/web.php`
- Create: `tests/Feature/LeadSubmissionTest.php`

- [ ] Write Pest test `tests/Feature/LeadSubmissionTest.php`:
  - Test valid submission saves lead to DB and returns WhatsApp redirect URL.
  - Test invalid submission (empty name or phone) returns 422 JSON validation errors.
  - Test rate limiting prevents spam submissions.
- [ ] Implement `LeadController::store`:
  - Validate: `name` (required, max:255), `phone` (required, max:50), `company` (nullable), `truck_series` (nullable), `quantity` (nullable), `location` (nullable), `notes` (nullable), `source` (nullable).
  - Store to `Lead`.
  - Format WhatsApp text neatly based on site settings.
  - Return JSON: `{ success: true, message: 'Data Anda berhasil disimpan.', whatsapp_url: $waUrl }`.
- [ ] Register route in `routes/web.php`: `Route::post('/leads', [LeadController::class, 'store'])->middleware('throttle:15,1')->name('leads.store');`.
- [ ] Run `vendor/bin/pest tests/Feature/LeadSubmissionTest.php` to verify all tests pass.

### Task 3: Filament Admin Panel Lead Management
**Files:**
- Create: `app/Filament/Resources/Leads/LeadResource.php`
- Create: `app/Filament/Resources/Leads/Pages/ListLeads.php`
- Create: `app/Filament/Resources/Leads/Pages/ViewLead.php`
- Create: `app/Filament/Resources/Leads/Pages/EditLead.php`
- Create: `app/Filament/Resources/Leads/Tables/LeadsTable.php`
- Create: `app/Filament/Resources/Leads/Schemas/LeadForm.php`

- [ ] Implement Filament LeadResource with table columns (Created At, Name, Phone, Company, Truck Series, Qty, Status badge).
- [ ] Add direct Action button in table: "Follow-Up WA" (opens chat in new tab).
- [ ] Add filters by `status`, `truck_series`, and `source`.

### Task 4: Homepage Contact Refactor & Duplicate Banner Removal
**Files:**
- Edit: `resources/views/welcome.blade.php`

- [ ] Remove redundant duplicate CTA section: `<!-- ================= CTA BANNER SECTION ================= -->` (lines 985-1021).
- [ ] Update `#penawaran-resmi` section:
  - Header: `Hubungi Kami`
  - Subtitle: Singkat & natural: "Diskusikan kebutuhan armada dan penawaran resmi bersama tim spesialis kami."
  - Placeholders:
    - Nama: `placeholder="Nama"`
    - No WA: `placeholder="Nomor WhatsApp"`
    - Perusahaan: `placeholder="Perusahaan / Proyek"`
    - Lokasi: `placeholder="Lokasi Job Site"`
    - Catatan: `placeholder="Catatan / Spesifikasi Kebutuhan"`
  - Submit Button: `Hubungi Kami` (solid `#0067b1`, hover `#00528e`, no awkward WA icon).
  - Sub-label note: `Data Anda tersimpan dengan aman & otomatis terhubung ke WhatsApp sales resmi.`
- [ ] Update JavaScript AJAX handler in `welcome.blade.php`:
  - Handles CSRF token and submits to `/leads`.
  - Loading state on button while sending.
  - On success, reset form and auto-open `whatsapp_url` in new window.
  - Show sweet toast / alert feedback.

### Task 5: Contact Page (`/kontak`) Form Alignment
**Files:**
- Edit: `resources/views/pages/kontak.blade.php`

- [ ] Update form `#contact-form`:
  - Placeholders: `Nama`, `Perusahaan`, `Nomor WhatsApp`, `Rincian Kebutuhan`.
  - Button: `Hubungi Kami`.
  - Submits via AJAX to `/leads` (source: `contact_page`).
  - Auto-opens WhatsApp on success and preserves zero lead loss.

### Task 6: Verification, Pint Formatting & Full Test Run
- [ ] Run `vendor/bin/pint --format agent` to format PHP code.
- [ ] Run `npm run build` to verify frontend assets.
- [ ] Run `vendor/bin/pest` to verify full test suite passes.

