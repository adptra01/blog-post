# Panduan Konfigurasi Multiple Environment (Local & Ngrok)

## Cara Kerja

Aplikasi ini sudah dikonfigurasi untuk otomatis mendeteksi dan beralih antara environment local (http://127.0.0.1) dan ngrok (https://toad-current-humbly.ngrok-free.app).

## Penggunaan

### 1. Mode Local (Default)

Saat menjalankan aplikasi secara lokal tanpa ngrok:

```bash
php artisan serve
```

Aplikasi akan otomatis menggunakan URL: `http://127.0.0.1:8000`

**File `.env`:**
```env
APP_URL=http://127.0.0.1
APP_PORT=8000
NGROK_URL=
```

### 2. Mode Ngrok

Saat menggunakan ngrok, ada 2 cara:

#### Cara 1: Set NGROK_URL di .env (Direkomendasikan)

1. Jalankan ngrok:
```bash
ngrok http 8000
```

2. Update file `.env`:
```env
APP_URL=http://127.0.0.1
APP_PORT=8000
NGROK_URL=https://toad-current-humbly.ngrok-free.app
```

3. Restart aplikasi:
```bash
php artisan serve
```

#### Cara 2: Deteksi Otomatis (Tanpa Update .env)

Jika tidak set `NGROK_URL`, aplikasi akan otomatis mendeteksi ngrok dari:
- Header `X-Forwarded-Host`
- Header `X-Forwarded-Proto`
- Hostname yang mengandung kata "ngrok"

## Prioritas Deteksi URL

Sistem akan mengecek URL dalam urutan prioritas berikut:

1. **NGROK_URL** dari .env (jika diset)
2. **Headers** dari proxy/ngrok (`X-Forwarded-Host`)
3. **Hostname** yang mengandung "ngrok"
4. **Default** http://127.0.0.1:port

## File yang Dimodifikasi

### 1. `.env` & `.env.example`
Ditambahkan variabel `NGROK_URL` untuk URL ngrok manual.

### 2. `app/Helpers/UrlHelper.php`
Helper class untuk mendeteksi dan mengatur URL secara dinamis:
- `getAppUrl()` - Mendapatkan URL aplikasi yang sesuai
- `getStorageUrl()` - Mendapatkan URL storage
- `forceDynamicUrl()` - Memaksa URL secara global

### 3. `app/Providers/AppServiceProvider.php`
Mengatur URL secara otomatis saat aplikasi boot:
- Memaksa URL dinamis di environment local/development
- Memaksa HTTPS scheme untuk ngrok

## Testing

### Test Local:
```bash
php artisan serve
# Akses: http://127.0.0.1:8000
```

### Test Ngrok:
```bash
# Terminal 1
php artisan serve

# Terminal 2
ngrok http 8000

# Update NGROK_URL di .env dengan URL dari ngrok
# Akses aplikasi via URL ngrok yang diberikan
```

## Solusi Masalah Filament Styles yang Rusak di Ngrok

### Masalah Umum
Saat mengakses Filament Admin melalui ngrok, CSS/JS tidak dimuat dengan benar karena:

1. **Mixed Content Error**: Halaman HTTPS (ngrok) mencoba memuat aset HTTP
2. **Wrong Asset URLs**: Laravel menghasilkan URL aset berdasarkan local URL
3. **Untrusted Proxies**: Laravel tidak mengenali ngrok sebagai proxy yang valid

### Solusi yang Telah Diimplementasikan

#### 1. Trust Proxies Middleware
File: `app/Http/Middleware/TrustProxies.php` & `bootstrap/app.php`

```php
// Trust all proxies termasuk ngrok
protected $proxies = '*';
```

Ini memungkinkan Laravel untuk mengenali header proxy dari ngrok:
- `X-Forwarded-For`
- `X-Forwarded-Host`
- `X-Forwarded-Proto`
- `X-Forwarded-Port`

#### 2. Force HTTPS Scheme
File: `app/Providers/AppServiceProvider.php`

Sistem otomatis mendeteksi ketika diakses via HTTPS (ngrok) dan memaksa semua URL menggunakan HTTPS:

```php
// Deteksi dari headers atau NGROK_URL
if (request()->server('HTTP_X_FORWARDED_PROTO') === 'https' ||
    request()->header('X-Forwarded-Proto') === 'https' ||
    (!empty(env('NGROK_URL')) && str_starts_with(env('NGROK_URL'), 'https'))) {
    URL::forceScheme('https');
}
```

#### 3. Dynamic Asset URL
File: `app/Helpers/UrlHelper.php`

Helper otomatis mengatur:
- Root URL aplikasi
- Storage URL
- Asset URL scheme
- Filament asset URL

### Langkah-langkah Penggunaan

#### Setup Awal (Sekali Saja)
```bash
# 1. Jalankan storage link
php artisan storage:link

# 2. Clear semua cache
php artisan optimize:clear
```

#### Untuk Setiap Sesi Ngrok

**Cara 1: Manual Set NGROK_URL (Recommended)**

1. Jalankan server Laravel:
```bash
php artisan serve
```

2. Di terminal baru, jalankan ngrok:
```bash
ngrok http 8000
```

3. Copy URL ngrok yang muncul (misalnya: `https://toad-current-humbly.ngrok-free.app`)

4. Update file `.env`:
```env
NGROK_URL=https://toad-current-humbly.ngrok-free.app
```

5. Restart Laravel server:
```bash
# Ctrl+C di terminal server, lalu jalankan lagi
php artisan serve
```

6. Akses aplikasi via URL ngrok

**Cara 2: Auto-detect (Tidak Perlu Update .env)**

Sistem akan otomatis mendeteksi ngrok dari headers, tapi Cara 1 lebih reliable.

### Verifikasi

Setelah setup, verifikasi dengan membuka DevTools browser (F12):

1. **Tab Network**: Pastikan semua aset dimuat dengan status 200
2. **Tab Console**: Tidak ada error "Mixed Content"
3. **CSS Applied**: Filament styles terlihat dengan benar

### Troubleshooting

#### Styles Masih Rusak
```bash
# 1. Clear cache Laravel
php artisan config:clear
php artisan route:clear
php artisan view:clear

# 2. Clear cache Filament
php artisan filament:cache-clear

# 3. Restart server
# Ctrl+C lalu php artisan serve
```

#### Mixed Content Warning
Pastikan `NGROK_URL` di `.env` menggunakan `https://` bukan `http://`:
```env
# ❌ SALAH
NGROK_URL=http://toad-current-humbly.ngrok-free.app

# ✅ BENAR
NGROK_URL=https://toad-current-humbly.ngrok-free.app
```

#### Assets 404 Not Found
```bash
# Re-link storage
php artisan storage:link

# Build assets jika menggunakan Vite/Mix
npm run build
```

#### Ngrok URL Berubah
Setiap kali restart ngrok, URL berubah. Update `NGROK_URL` di `.env` dan restart server.

### Debug Tips

#### Cek Current App URL
Tambahkan route temporary untuk debug:
```php
Route::get('/debug-url', function() {
    return [
        'config_url' => config('app.url'),
        'helper_url' => \App\Helpers\UrlHelper::getAppUrl(),
        'request_host' => request()->getHost(),
        'is_secure' => request()->isSecure(),
        'headers' => [
            'X-Forwarded-Proto' => request()->header('X-Forwarded-Proto'),
            'X-Forwarded-Host' => request()->header('X-Forwarded-Host'),
        ],
    ];
});
```

#### Cek Asset URLs di Browser
Buka DevTools → Network, filter CSS/JS, periksa URL yang di-request.

### Penjelasan Teknis

#### Mengapa Trust Proxies Penting?
Ngrok bertindak sebagai reverse proxy. Tanpa trust proxies:
- Laravel tidak tahu request aslinya HTTPS
- `request()->isSecure()` return `false`
- Asset URLs generated sebagai HTTP
- Browser block mixed content

#### Mengapa Force HTTPS?
URL::forceScheme('https') memastikan:
- `asset()` generates `https://...`
- `route()` generates `https://...`
- `url()` generates `https://...`
- Filament assets load via HTTPS

#### Priority Detection
Sistem mengecek URL dalam urutan:
1. `NGROK_URL` dari .env (paling reliable)
2. Proxy headers (auto-detect)
3. Hostname contains 'ngrok'
4. Default local (127.0.0.1)

## Catatan Penting

- **Local Development**: Gunakan `http://127.0.0.1:8000` (bukan localhost)
- **Ngrok**: Selalu gunakan `https://` untuk ngrok URL
- **Cache**: Clear cache setelah perubahan config
- **Restart**: Restart server setelah update `.env`
- **Storage Link**: Jalankan `php artisan storage:link` sekali saat setup
- **Ngrok Free**: URL berubah setiap restart, update `.env` setiap kali
