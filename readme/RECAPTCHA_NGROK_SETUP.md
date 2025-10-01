# ✅ reCAPTCHA Enabled - Setup Guide

## 🎉 Yang Sudah Dilakukan

### 1. Bug Fix: Form ID Mismatch
**Masalah**: Form ID tidak match antara callback JavaScript dan form HTML.

**Fixed**:
- File: [`resources/views/vendor/filament-blog/components/comment.blade.php`](resources/views/vendor/filament-blog/components/comment.blade.php:4)
- Changed: `id="comments"` → `id="comment-box"`
- Match dengan: `document.getElementById("comment-box")` di layout

### 2. reCAPTCHA Enabled
**File**: [`config/filamentblog.php`](config/filamentblog.php:82)
```php
'recaptcha' => [
    'enabled' => true,  // ✅ Enabled
],
```

### 3. Environment Configuration
**File**: [`.env`](.env:71)
```env
NGROK_URL=https://toad-current-humbly.ngrok-free.app
RECAPTCHA_SITE_KEY=6Leq_NkrAAAAAAbiNALhZxhHpthdz3qryV3f20hB
RECAPTCHA_SECRET_KEY=6Leq_NkrAAAAACvd7WAweCtiFH-ItISthPrLkXaJ
```

### 4. Cache Cleared
✅ Config, views, dan cache sudah di-clear.

## 🔑 Verifikasi reCAPTCHA Keys

### Check Domain Registration

Pastikan domain Anda terdaftar di Google reCAPTCHA:

1. Login ke: https://www.google.com/recaptcha/admin
2. Pilih site Anda
3. Verify "Domains" section harus include:
   - ✅ `127.0.0.1` (untuk local)
   - ✅ `localhost` (untuk local)
   - ✅ `toad-current-humbly.ngrok-free.app` (untuk ngrok)

**PENTING**: Jika domain ngrok tidak terdaftar, tambahkan sekarang!

### Test Keys

Anda bisa test keys dengan command ini:
```bash
curl -X POST "https://www.google.com/recaptcha/api/siteverify" \
  -d "secret=YOUR_SECRET_KEY" \
  -d "response=test"
```

## 🚀 Testing

### 1. Test Local (http://127.0.0.1:8000)

```bash
# Jalankan server
php artisan serve

# Akses di browser
http://127.0.0.1:8000/{post-slug}
```

**Expected**:
- Form komentar muncul (jika sudah login)
- reCAPTCHA badge muncul di kanan bawah
- Submit form berhasil

### 2. Test Ngrok (https://toad-current-humbly.ngrok-free.app)

**Prerequisite**: 
- NGROK_URL sudah diset di `.env`
- Server Laravel sudah restart
- Ngrok sudah running

```bash
# Terminal 1: Laravel server
php artisan serve

# Terminal 2: Ngrok
ngrok http 8000

# Update .env jika URL ngrok berubah
NGROK_URL=https://your-new-ngrok-url.ngrok-free.app

# Restart Laravel server (Ctrl+C, lalu php artisan serve)
```

**Akses**:
```
https://toad-current-humbly.ngrok-free.app/{post-slug}
```

**Expected**:
- Styles Filament dimuat dengan benar (tidak rusak)
- Form komentar muncul
- reCAPTCHA badge muncul
- Submit berhasil

## 🔍 Troubleshooting

### reCAPTCHA Badge Tidak Muncul

**Possible Causes**:
1. Script tidak dimuat
2. Keys tidak valid
3. Domain tidak terdaftar

**Fix**:
1. Check Console browser (F12):
   - Tidak boleh ada error reCAPTCHA
   - Script `https://www.google.com/recaptcha/api.js` loaded

2. Verify keys di `.env`:
   ```bash
   php artisan tinker
   config('filamentblog.recaptcha.site_key')
   config('filamentblog.recaptcha.secret_key')
   ```

3. Clear cache lagi:
   ```bash
   php artisan config:clear
   ```

### Error: "Invalid site key"

**Cause**: Domain tidak terdaftar atau keys salah

**Fix**:
1. Go to: https://www.google.com/recaptcha/admin
2. Edit site
3. Add domain:
   - For local: `127.0.0.1`, `localhost`
   - For ngrok: `toad-current-humbly.ngrok-free.app`
4. Save
5. Wait 1-2 minutes for propagation
6. Test again

### Form Submit Tidak Jalan

**Check**:
1. Browser Console (F12) untuk JavaScript errors
2. Network tab untuk failed requests
3. Laravel log: `storage/logs/laravel.log`

**Common Issues**:
- Form ID masalah → ✅ Sudah diperbaiki
- CSRF token missing → Check `@csrf` di form
- reCAPTCHA verification failed → Check secret key

### reCAPTCHA Badge Overlap dengan Content

**Fix**: Tambahkan CSS untuk adjust posisi
```html
<!-- Di layout atau component -->
<style>
    .grecaptcha-badge {
        z-index: 999 !important;
    }
</style>
```

## 📱 Testing Checklist

### Local Testing
- [ ] Server running: `php artisan serve`
- [ ] Access: `http://127.0.0.1:8000`
- [ ] User logged in
- [ ] Navigate to blog post
- [ ] reCAPTCHA badge visible (bottom-right)
- [ ] Fill comment form
- [ ] Click "Post a comment"
- [ ] Success message appears
- [ ] Comment saved (check admin panel)

### Ngrok Testing
- [ ] Ngrok running: `ngrok http 8000`
- [ ] NGROK_URL set di `.env`
- [ ] Laravel server restarted
- [ ] Domain terdaftar di reCAPTCHA admin
- [ ] Access via ngrok URL
- [ ] Styles loaded correctly (not broken)
- [ ] reCAPTCHA badge visible
- [ ] Form submit successful
- [ ] Comment saved

## 📋 Command Reference

```bash
# Start Laravel server
php artisan serve

# Start ngrok (separate terminal)
ngrok http 8000

# Clear all caches
php artisan config:clear && php artisan view:clear && php artisan cache:clear

# Check config values
php artisan tinker
>>> config('filamentblog.recaptcha')
>>> exit

# Tail logs (for debugging)
tail -f storage/logs/laravel.log

# Republish views (if needed)
php artisan vendor:publish --tag=filament-blog-views --force
```

## 🎯 Summary

**Status**: ✅ **reCAPTCHA ENABLED & BUG FIXED**

**Changes Made**:
1. ✅ Published blog views
2. ✅ Fixed form ID bug (`comments` → `comment-box`)
3. ✅ Enabled reCAPTCHA in config
4. ✅ Cleared caches

**Ready to Use**:
- ✅ Local: `http://127.0.0.1:8000`
- ✅ Ngrok: `https://toad-current-humbly.ngrok-free.app`

**Next Steps**:
1. Pastikan domain terdaftar di Google reCAPTCHA admin
2. Test form komentar di local
3. Test form komentar di ngrok
4. Approve komentar di admin panel

## 🔗 Related Documentation

- [`COMMENT_QUICK_FIX.md`](COMMENT_QUICK_FIX.md) - Quick troubleshooting
- [`FILAMENT_BLOG_COMMENT_FIX.md`](FILAMENT_BLOG_COMMENT_FIX.md) - Complete guide
- [`NGROK_SETUP.md`](NGROK_SETUP.md) - Ngrok configuration
- [Google reCAPTCHA Admin](https://www.google.com/recaptcha/admin)
