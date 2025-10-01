# Portal Berita & Profil Desa Tangkit

Portal website resmi Desa Tangkit yang menampilkan berita, profil desa, pengumuman, galeri, dan dokumen dengan desain modern yang terinspirasi dari [Danantara Indonesia Website - Dribbble](https://dribbble.com/shots/26124445-Danantara-Indonesia-Website-Redesign-Motion-UI-Concept).

## 🎨 Design System

### Color Palette
- **Primary**: `#AF261D` (Merah desa)
- **Secondary**: `#B28A79` (Cokelat natural)
- **Accent**: `#48292B` (Cokelat tua)
- **Neutral Light**: `#F1F1F1` (Background)
- **Neutral Dark**: `#1C1A16` (Text)

### Typography
- **Font**: Inter (Modern, readable, humanist sans-serif)
- **Fallback**: Instrument Sans, UI Sans Serif, System UI

### Design Principles
- ✅ Mobile-first & Responsive
- ✅ Clean, structured layout
- ✅ Subtle motion UI & transitions
- ✅ Visual hierarchy (size, contrast, spacing)
- ✅ Accessibility (alt text, color contrast)
- ✅ Modern card-based design

## 📁 Struktur Halaman

### 1. Homepage (`/`)
**File**: [`resources/views/home.blade.php`](resources/views/home.blade.php)

**Sections**:
- ✅ Hero Banner dengan CTA buttons
- ✅ Berita Unggulan (Featured Post)
- ✅ Berita Terbaru Grid (3 kolom)
- ✅ Kategori Sekilas (icon cards)
- ✅ Potensi Desa (Produk Lokal)
- ✅ Pengumuman & Agenda (timeline)
- ✅ Galeri Preview (grid 4 kolom)
- ✅ Profil Singkat & Statistik Desa
- ✅ Newsletter Subscribe

### 2. Profil Desa (`/profil`)
**File**: [`resources/views/village-profile/index.blade.php`](resources/views/village-profile/index.blade.php)

**Sections**:
- ✅ Hero dengan pattern overlay
- ✅ Intro/Header Desa
- ✅ Sejarah Desa (2 kolom layout)
- ✅ Visi & Misi (card design)
- ✅ Struktur Perangkat Desa (grid foto + nama + jabatan)
- ✅ Data Statistik (gradient background)
- ✅ Google Maps Embed

### 3. Berita (Filament Blog)
**Routes**: `/blog`, `/blog/category/{slug}`, `/blog/{slug}`

**Customized Files**:
- [`resources/views/vendor/filament-blog/components/header.blade.php`](resources/views/vendor/filament-blog/components/header.blade.php) - Custom header dengan branding desa
- [`resources/views/vendor/filament-blog/layouts/app.blade.php`](resources/views/vendor/filament-blog/layouts/app.blade.php) - Layout dengan custom footer

### 4. Galeri (`/galeri`)
**Files**:
- [`resources/views/gallery/index.blade.php`](resources/views/gallery/index.blade.php) - Grid view dengan filter kategori

**Features**:
- ✅ Filter tabs (Kegiatan, Alam, Budaya, Produk Lokal)
- ✅ Responsive grid layout
- ✅ Lightbox untuk preview full image/video
- ✅ Keyboard navigation (Arrow keys, Escape)
- ✅ Play button overlay untuk video
- ✅ Smooth transitions

### 5. Pengumuman & Agenda (`/pengumuman`)
**Files**:
- [`resources/views/announcement/index.blade.php`](resources/views/announcement/index.blade.php) - List view
- [`resources/views/announcement/show.blade.php`](resources/views/announcement/show.blade.php) - Detail view

**Features**:
- ✅ Upcoming Events section (timeline)
- ✅ Filter: Semua, Pengumuman, Event
- ✅ Date badge untuk events
- ✅ Event details (lokasi, contact person)
- ✅ Share buttons (Facebook, Twitter, WhatsApp)
- ✅ Related announcements

### 6. Dokumen & Peraturan (`/dokumen`)
**Files**:
- [`resources/views/document/index.blade.php`](resources/views/document/index.blade.php) - List view dengan search
- [`resources/views/document/show.blade.php`](resources/views/document/show.blade.php) - Detail view

**Features**:
- ✅ Search functionality
- ✅ Filter by type (Peraturan, SK, Laporan, Formulir)
- ✅ File info (type, size, download count)
- ✅ Download functionality dengan counter
- ✅ Document metadata

### 7. Kontak (`/kontak`)
**File**: [`resources/views/contact/index.blade.php`](resources/views/contact/index.blade.php)

**Features**:
- ✅ Office information card
- ✅ Office hours schedule
- ✅ Social media links
- ✅ Contact form (Nama, Email, Phone, Subject, Message, Attachment)
- ✅ Google Maps embed
- ✅ Responsive layout

## 🗂️ Database Structure

### Models & Migrations

#### 1. VillageProfile
**File**: [`app/Models/VillageProfile.php`](app/Models/VillageProfile.php)
**Migration**: [`database/migrations/2025_10_01_071046_create_village_profiles_table.php`](database/migrations/2025_10_01_071046_create_village_profiles_table.php)

**Fields**:
- `section` - Type: intro, history, vision_mission, structure, statistics
- `title` - Judul section
- `content` - Konten HTML
- `data` - JSON data untuk struktur/statistik
- `image` - Gambar ilustrasi
- `order` - Urutan tampilan
- `is_active` - Status aktif

#### 2. Gallery
**File**: [`app/Models/Gallery.php`](app/Models/Gallery.php)
**Migration**: [`database/migrations/2025_10_01_071053_create_galleries_table.php`](database/migrations/2025_10_01_071053_create_galleries_table.php)

**Fields**:
- `title`, `description`
- `type` - image/video
- `media_path`, `thumbnail_path`
- `category` - kegiatan/alam/budaya/produk_lokal
- `order`, `is_featured`, `is_active`

#### 3. Announcement
**File**: [`app/Models/Announcement.php`](app/Models/Announcement.php)
**Migration**: [`database/migrations/2025_10_01_071054_create_announcements_table.php`](database/migrations/2025_10_01_071054_create_announcements_table.php)

**Fields**:
- `title`, `slug`, `content`
- `type` - announcement/event
- `image`, `event_date`, `location`
- `contact_person`, `contact_phone`
- `is_featured`, `is_active`, `published_at`

#### 4. Document
**File**: [`app/Models/Document.php`](app/Models/Document.php)
**Migration**: [`database/migrations/2025_10_01_071055_create_documents_table.php`](database/migrations/2025_10_01_071055_create_documents_table.php)

**Fields**:
- `title`, `slug`, `description`
- `type` - peraturan/sk/laporan/formulir
- `file_path`, `file_type`, `file_size`
- `document_date`, `document_number`
- `download_count`, `is_active`, `published_at`

## 🎯 Controllers

### HomeController
**File**: [`app/Http/Controllers/HomeController.php`](app/Http/Controllers/HomeController.php)

Menghandle homepage dengan semua data:
- Featured & latest posts
- Categories
- Potentials (produk lokal)
- Upcoming events
- Gallery preview
- Village profile

### Other Controllers
- [`VillageProfileController.php`](app/Http/Controllers/VillageProfileController.php) - Profil desa
- [`GalleryController.php`](app/Http/Controllers/GalleryController.php) - Galeri dengan filter
- [`AnnouncementController.php`](app/Http/Controllers/AnnouncementController.php) - Pengumuman & events
- [`DocumentController.php`](app/Http/Controllers/DocumentController.php) - Dokumen dengan download

## 🎨 Components

### Reusable Blade Components

1. **Header** - [`resources/views/components/header.blade.php`](resources/views/components/header.blade.php)
   - Sticky navigation
   - Mobile menu
   - Top bar dengan contact info
   - Social media links

2. **Footer** - [`resources/views/components/footer.blade.php`](resources/views/components/footer.blade.php)
   - Quick links
   - Contact information
   - Office hours
   - Back to top button

3. **Hero** - [`resources/views/components/hero.blade.php`](resources/views/components/hero.blade.php)
   - Customizable title, subtitle
   - Background image/gradient
   - CTA buttons
   - Scroll indicator

4. **News Card** - [`resources/views/components/news-card.blade.php`](resources/views/components/news-card.blade.php)
   - Featured variant (large)
   - Regular variant (grid)
   - Category badge
   - Meta info (date, views)

## 🔧 Installation & Setup

### 1. Install Dependencies
```bash
composer install
npm install
```

### 2. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 3. Database Setup
```bash
# Configure database in .env file
php artisan migrate
php artisan db:seed --class=VillageDataSeeder
```

### 4. Storage Link
```bash
php artisan storage:link
```

### 5. Compile Assets
```bash
npm run build  # Production
# OR
npm run dev    # Development
```

### 6. Run Application
```bash
php artisan serve
```

## 🌐 Routes

| URL | Description | View File |
|-----|-------------|-----------|
| `/` | Homepage | [`resources/views/home.blade.php`](resources/views/home.blade.php) |
| `/profil` | Profil Desa | [`resources/views/village-profile/index.blade.php`](resources/views/village-profile/index.blade.php) |
| `/blog` | Berita (Filament Blog) | Vendor views |
| `/galeri` | Galeri Foto/Video | [`resources/views/gallery/index.blade.php`](resources/views/gallery/index.blade.php) |
| `/pengumuman` | Pengumuman & Agenda | [`resources/views/announcement/index.blade.php`](resources/views/announcement/index.blade.php) |
| `/dokumen` | Dokumen & Peraturan | [`resources/views/document/index.blade.php`](resources/views/document/index.blade.php) |
| `/kontak` | Kontak & Layanan | [`resources/views/contact/index.blade.php`](resources/views/contact/index.blade.php) |
| `/admin` | Admin Panel (Filament) | - |

## 👨‍💼 Admin Panel

### Akses Admin Panel
URL: `http://localhost:8000/admin`

### Resources Available
1. **Blog Management** (Filament Blog Plugin)
   - Posts
   - Categories
   - Tags
   - Comments
   - Subscribers

2. **Village Content**
   - Village Profiles (Sections)
   - Galleries (Photos/Videos)
   - Announcements (Events & Announcements)
   - Documents (Official Documents)

3. **User Management** (Filament Shield)
   - Users
   - Roles & Permissions

### First User Setup
```bash
php artisan make:filament-user
```

## 🎨 Styling

### Tailwind CSS v4
**File**: [`resources/css/app.css`](resources/css/app.css)

**Custom Features**:
- Custom color palette dengan CSS variables
- Custom animations (fade-in, slide-up, scale-in, dll)
- Custom scrollbar styling
- Responsive utilities

### Animations Available
```css
.animate-fade-in       /* Fade in effect */
.animate-slide-up      /* Slide up from bottom */
.animate-slide-in-left /* Slide in from left */
.animate-slide-in-right /* Slide in from right */
.animate-scale-in      /* Scale in effect */
```

## 🚀 Features

### Frontend Features
- ✅ Responsive design (mobile-first)
- ✅ Modern UI dengan smooth animations
- ✅ Lightbox gallery dengan keyboard navigation
- ✅ Sticky header dengan dropdown menu
- ✅ Search functionality
- ✅ Filter & pagination
- ✅ Social media integration
- ✅ SEO optimized
- ✅ Share buttons
- ✅ Back to top button

### Backend Features (Filament Admin)
- ✅ Full CRUD untuk semua content
- ✅ Rich text editor untuk content
- ✅ File upload management
- ✅ Role-based access control
- ✅ Database notifications
- ✅ Activity logging

## 📦 Tech Stack

- **Framework**: Laravel 12
- **Admin Panel**: Filament v4
- **Blog**: Filament Blog Plugin
- **Authentication**: Filament Shield
- **Frontend**: Tailwind CSS v4
- **JavaScript**: Alpine.js
- **Database**: SQLite (development)

## 📝 Content Management Guide

### Mengelola Profil Desa
1. Login ke admin panel (`/admin`)
2. Pilih menu "Village Profiles"
3. Sections available:
   - `intro` - Pengenalan desa
   - `history` - Sejarah
   - `vision_mission` - Visi & Misi
   - `structure` - Struktur Perangkat
   - `statistics` - Data Statistik

### Mengelola Berita
1. Pilih menu "Posts" di admin
2. Create new post
3. Set featured untuk tampil di homepage
4. Assign kategori

### Mengelola Galeri
1. Pilih menu "Galleries"
2. Upload foto/video
3. Pilih kategori: kegiatan, alam, budaya, produk_lokal
4. Set featured untuk tampil di homepage

### Mengelola Pengumuman
1. Pilih menu "Announcements"
2. Pilih type: announcement atau event
3. Untuk event, isi event_date, location, contact
4. Set is_featured untuk prioritas tinggi

### Mengelola Dokumen
1. Pilih menu "Documents"
2. Upload file (PDF, DOC, XLS, dll)
3. Pilih type dokumen
4. Isi metadata (nomor, tanggal)

## 🔧 Customization

### Mengubah Color Palette
Edit [`resources/css/app.css`](resources/css/app.css:8):
```css
@theme {
    --color-primary-500: oklch(...); /* Ubah nilai warna */
    --color-secondary-500: oklch(...);
    /* dst */
}
```

### Mengubah Logo
Update di Filament Blog Settings atau edit header component:
- [`resources/views/vendor/filament-blog/components/header.blade.php`](resources/views/vendor/filament-blog/components/header.blade.php:15)

### Menambah Menu Navigation
Edit header component dan tambahkan menu item baru.

### Mengubah Contact Info
Edit footer component:
- [`resources/views/components/footer.blade.php`](resources/views/components/footer.blade.php)

## 📸 Screenshots Placeholder

_(Upload gambar hero, layout homepage, dll ke public/images/)_

## 🐛 Troubleshooting

### Error: HAVING clause on non-aggregate query
✅ **Fixed** - Menggunakan `whereHas()` di [`HomeController.php:36`](app/Http/Controllers/HomeController.php:36)

### CSS tidak ter-load
Jalankan: `npm run dev` atau `npm run build`

### Gambar tidak muncul
Pastikan storage link sudah dibuat: `php artisan storage:link`

### Route not found
Clear cache: `php artisan route:clear && php artisan config:clear`

## 📱 Browser Support

- ✅ Chrome/Edge (latest)
- ✅ Firefox (latest)
- ✅ Safari (latest)
- ✅ Mobile browsers

## 🔐 Security

- ✅ CSRF Protection
- ✅ SQL Injection Prevention (Eloquent ORM)
- ✅ XSS Protection
- ✅ File upload validation
- ✅ Role-based access control

## 📈 Performance

- ✅ Lazy loading images
- ✅ Asset optimization via Vite
- ✅ Database query optimization
- ✅ Caching strategy ready
- ✅ CDN ready

## 🎓 Credits

- Design Inspiration: [Danantara Indonesia - Dribbble](https://dribbble.com/shots/26124445)
- Laravel Framework
- Filament PHP
- Filament Blog Plugin by Firefly
- Filament Shield by BezhanSalleh

## 📞 Support

Untuk bantuan teknis atau pertanyaan:
- Email: developer@example.com
- Documentation: https://filamentphp.com

---

**Developed with ❤️ for Desa Tangkit**
