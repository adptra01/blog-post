# 🔧 Fix Filament Blog Comment Form

## 🐛 Masalah

Form komentar di Filament Blog tidak berfungsi meskipun user sudah login dan `canComment()` return `true`.

## 🔍 Root Cause

Berdasarkan analisis kode, ada beberapa penyebab utama:

### 1. Google reCAPTCHA v3 Configuration

Form komentar menggunakan Google reCAPTCHA v3 yang WAJIB dikonfigurasi dengan benar. Lihat di `vendor/firefly/filament-blog/resources/views/components/comment.blade.php`:

```php
<button type="submit"
    class="g-recaptcha ..."
    data-sitekey="{{ config('filamentblog.recaptcha.site_key') }}"
    data-callback='onSubmit'
    data-action='submit'>
```

### 2. Missing reCAPTCHA Script

reCAPTCHA script mungkin tidak dimuat di layout blog.

### 3. Missing JavaScript Callback

Function `onSubmit` callback untuk reCAPTCHA mungkin tidak terdefinisi.

## ✅ Solusi

### Opsi 1: Disable reCAPTCHA (Quick Fix untuk Development)

Edit `config/filamentblog.php`:

```php
'recaptcha' => [
    'enabled' => false,  // ← Ubah ke false
    'site_key' => env('RECAPTCHA_SITE_KEY'),
    'secret_key' => env('RECAPTCHA_SECRET_KEY'),
],
```

Setelah itu:
```bash
php artisan config:clear
```

### Opsi 2: Setup reCAPTCHA dengan Benar (Production Ready)

#### Step 1: Dapatkan reCAPTCHA Keys

1. Kunjungi: https://www.google.com/recaptcha/admin
2. Login dengan Google account
3. Klik **"+"** untuk register site baru
4. Pilih **reCAPTCHA v3**
5. Tambahkan domain:
   - Local: `127.0.0.1` atau `localhost`
   - Ngrok: `toad-current-humbly.ngrok-free.app`
6. Copy **Site Key** dan **Secret Key**

#### Step 2: Update .env

```env
RECAPTCHA_SITE_KEY=your_site_key_here
RECAPTCHA_SECRET_KEY=your_secret_key_here
```

#### Step 3: Verify config/filamentblog.php

```php
'recaptcha' => [
    'enabled' => true,
    'site_key' => env('RECAPTCHA_SITE_KEY'),
    'secret_key' => env('RECAPTCHA_SECRET_KEY'),
],
```

#### Step 4: Tambahkan reCAPTCHA Script

Periksa layout blog (biasanya di `vendor/firefly/filament-blog/resources/views/layouts/blog.blade.php`).

Pastikan ada script ini di `<head>` atau sebelum `</body>`:

```html
@if(config('filamentblog.recaptcha.enabled'))
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
    function onSubmit(token) {
        document.getElementById("comments").submit();
    }
</script>
@endif
```

#### Step 5: Clear Cache

```bash
php artisan config:clear
php artisan view:clear
php artisan cache:clear
```

## 🧪 Testing

### 1. Pastikan User Sudah Login

Form komentar hanya muncul jika:
- User sudah login (authenticated)
- User model memiliki method `canComment()` yang return `true`

Cek di `app/Models/User.php`:
```php
public function canComment(): bool
{
    return true;
}
```

### 2. Test Login

1. Register atau login ke admin panel: `http://127.0.0.1:8000/admin/login`
2. Buka halaman blog post: `http://127.0.0.1:8000/{post-slug}`
3. Scroll ke bagian komentar
4. Isi form komentar dan klik "Post a comment"

### 3. Verify Form Submit

Buka Browser DevTools (F12):

#### Console Tab
Tidak boleh ada error:
- ❌ `ReCAPTCHA placeholder element must be an element or id`
- ❌ `onSubmit is not defined`
- ❌ `Invalid site key`

#### Network Tab
Saat klik "Post a comment":
1. Request ke `https://www.google.com/recaptcha/api.js` (jika enabled)
2. Request POST ke `/posts/{slug}/comment`
3. Redirect ke post page dengan message success

### 4. Check Database

```bash
php artisan tinker
```

```php
\Firefly\FilamentBlog\Models\Comment::latest()->first();
```

Komentar baru harus ada dengan:
- `approved` = false (default)
- `user_id` = your user id
- `post_id` = post id

### 5. Approve Comment (Admin)

1. Login ke admin panel
2. Go to: `http://127.0.0.1:8000/admin/comments`
3. Edit komentar dan set `Approved` = Yes
4. Save
5. Refresh blog post page, komentar akan muncul

## 🚨 Common Issues

### Issue 1: "Permission denied" atau form tidak muncul

**Cause**: User belum login atau `canComment()` return false

**Fix**:
```php
// app/Models/User.php
public function canComment(): bool
{
    return true; // atau logic sesuai kebutuhan
}
```

### Issue 2: reCAPTCHA error di console

**Cause**: Keys tidak valid atau domain tidak terdaftar

**Fix**:
1. Verifikasi keys di .env
2. Tambahkan domain di Google reCAPTCHA admin
3. Clear cache: `php artisan config:clear`

### Issue 3: Form submit tapi tidak ada response

**Cause**: Route middleware atau CSRF

**Fix**:
1. Pastikan di `<form>` ada `@csrf`
2. Pastikan middleware 'web' aktif di config
3. Check error di `storage/logs/laravel.log`

### Issue 4: Comment tidak muncul setelah post

**Cause**: Default `approved` = false

**Fix**:
1. Approve manual di admin panel
2. Atau ubah default di `CommentController.php`:
   ```php
   'approved' => true, // auto approve
   ```

## 📝 Route Configuration

Verify di `config/filamentblog.php`:

```php
'route' => [
    'prefix' => '/',
    'middleware' => ['web'],
    'login' => [
        'name' => 'filamentblog.post.login',
    ],
],
```

Route komentar: `/posts/{post:slug}/comment` (method: POST)

## 🎯 Quick Checklist

- [ ] User sudah login
- [ ] User model memiliki `canComment()` method
- [ ] reCAPTCHA disabled ATAU configured dengan benar
- [ ] Layout blog memuat reCAPTCHA script (jika enabled)
- [ ] Callback function `onSubmit` terdefinisi (jika recaptcha enabled)
- [ ] `@csrf` token ada di form
- [ ] Middleware 'web' aktif
- [ ] Clear semua cache

## 💡 Recommended Solution

Untuk development/testing, **disable reCAPTCHA**:

```php
// config/filamentblog.php
'recaptcha' => [
    'enabled' => false,
],
```

Untuk production, **setup reCAPTCHA dengan benar** mengikuti Opsi 2.

## 📚 References

- [Google reCAPTCHA v3](https://developers.google.com/recaptcha/docs/v3)
- [Filament Blog Docs](https://filamentphp.com/plugins/firefly-blog)
- Controller: `vendor/firefly/filament-blog/src/Http/Controllers/CommentController.php`
- Route: `vendor/firefly/filament-blog/routes/web.php`
- Form: `vendor/firefly/filament-blog/resources/views/components/comment.blade.php`
