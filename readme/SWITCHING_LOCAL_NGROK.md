# 🔄 Switching Between Local & Ngrok

## ⚠️ Masalah yang Sering Terjadi

Ketika ngrok dimatikan tetapi `NGROK_URL` masih diset di `.env`, aplikasi (termasuk panel admin) tidak berfungsi karena sistem masih mencoba menggunakan URL ngrok yang sudah tidak aktif.

## ✅ Solusi: Kosongkan NGROK_URL saat Mode Local

### Mode Local (Default)

Saat bekerja di local tanpa ngrok:

**1. Update `.env`:**
```env
NGROK_URL=
```
**PENTING**: Harus dikosongkan, jangan hapus variabelnya!

**2. Clear Cache:**
```bash
php artisan config:clear && php artisan cache:clear
```

**3. Restart Server:**
```bash
# Tekan Ctrl+C di terminal server, lalu:
php artisan serve
```

**4. Access:**
```
http://127.0.0.1:8000
http://127.0.0.1:8000/admin
```

### Mode Ngrok

Saat ingin menggunakan ngrok:

**1. Start Ngrok:**
```bash
ngrok http 8000
```

**2. Copy URL dari ngrok (contoh):**
```
https://abc-def-ghi.ngrok-free.app
```

**3. Update `.env`:**
```env
NGROK_URL=https://abc-def-ghi.ngrok-free.app
```

**4. Clear Cache:**
```bash
php artisan config:clear && php artisan cache:clear
```

**5. Restart Server:**
```bash
# Ctrl+C lalu:
php artisan serve
```

**6. Access:**
```
https://abc-def-ghi.ngrok-free.app
https://abc-def-ghi.ngrok-free.app/admin
```

## 🎯 Quick Reference

### Switching to Local
```bash
# 1. Edit .env
NGROK_URL=

# 2. Clear & Restart
php artisan config:clear && php artisan cache:clear
# Ctrl+C lalu php artisan serve

# 3. Access
http://127.0.0.1:8000/admin
```

### Switching to Ngrok
```bash
# 1. Start ngrok
ngrok http 8000

# 2. Edit .env
NGROK_URL=https://your-ngrok-url.ngrok-free.app

# 3. Clear & Restart
php artisan config:clear && php artisan cache:clear
# Ctrl+C lalu php artisan serve

# 4. Access
https://your-ngrok-url.ngrok-free.app/admin
```

## 🐛 Troubleshooting

### Panel Admin Tidak Berfungsi

**Symptom**: Admin panel tidak load atau redirect error

**Cause**: `NGROK_URL` masih diset padahal ngrok sudah mati

**Fix**:
```bash
# 1. Kosongkan NGROK_URL di .env
NGROK_URL=

# 2. Clear cache
php artisan config:clear && php artisan cache:clear

# 3. Restart server
# Ctrl+C lalu php artisan serve

# 4. Hard refresh browser
# Ctrl+Shift+R
```

### Styles Rusak di Ngrok

**Cause**: Lupa set `NGROK_URL` atau belum restart server

**Fix**:
```bash
# 1. Pastikan NGROK_URL diset
NGROK_URL=https://your-url.ngrok-free.app

# 2. Clear cache
php artisan config:clear

# 3. Restart server
```

### URL Ngrok Berubah

**Cause**: Ngrok free tier generate URL baru setiap restart

**Fix**:
```bash
# 1. Copy URL baru dari ngrok terminal
# 2. Update NGROK_URL di .env
# 3. Update domain di Google reCAPTCHA admin (jika perlu)
# 4. Clear cache & restart server
```

## 📋 Checklist

### Before Starting Work

**Local Mode**:
- [ ] `NGROK_URL=` (empty)
- [ ] Cache cleared
- [ ] Server restarted
- [ ] Access: `http://127.0.0.1:8000/admin`

**Ngrok Mode**:
- [ ] Ngrok running
- [ ] `NGROK_URL` set with correct URL
- [ ] Cache cleared
- [ ] Server restarted
- [ ] Domain registered in reCAPTCHA (if using comments)
- [ ] Access via ngrok URL

## 💡 Best Practices

### 1. Always Clear Cache After Changing NGROK_URL
```bash
php artisan config:clear && php artisan cache:clear
```

### 2. Always Restart Server
Setelah update `.env`, WAJIB restart server:
```bash
# Ctrl+C di terminal server
php artisan serve
```

### 3. Keep NGROK_URL Empty by Default
Di development sehari-hari, biarkan kosong:
```env
NGROK_URL=
```
Set hanya saat butuh ngrok.

### 4. Use Hard Refresh
Setelah switching mode, selalu hard refresh browser:
```
Ctrl+Shift+R (Windows/Linux)
Cmd+Shift+R (Mac)
```

### 5. Check Current Configuration
Untuk verify config saat ini:
```bash
php artisan tinker
>>> config('app.url')
>>> env('NGROK_URL')
>>> exit
```

## 🔧 Automation Script (Optional)

Buat file `switch-mode.sh` untuk kemudahan:

```bash
#!/bin/bash

if [ "$1" == "local" ]; then
    echo "Switching to LOCAL mode..."
    sed -i 's/NGROK_URL=.*/NGROK_URL=/' .env
    php artisan config:clear
    php artisan cache:clear
    echo "✅ Switched to LOCAL mode"
    echo "👉 Restart server: php artisan serve"
    echo "👉 Access: http://127.0.0.1:8000/admin"
    
elif [ "$1" == "ngrok" ]; then
    if [ -z "$2" ]; then
        echo "❌ Error: Please provide ngrok URL"
        echo "Usage: ./switch-mode.sh ngrok https://your-url.ngrok-free.app"
        exit 1
    fi
    echo "Switching to NGROK mode..."
    sed -i "s|NGROK_URL=.*|NGROK_URL=$2|" .env
    php artisan config:clear
    php artisan cache:clear
    echo "✅ Switched to NGROK mode"
    echo "👉 Restart server: php artisan serve"
    echo "👉 Access: $2/admin"
    
else
    echo "Usage:"
    echo "  ./switch-mode.sh local"
    echo "  ./switch-mode.sh ngrok https://your-url.ngrok-free.app"
fi
```

**Cara Pakai**:
```bash
# Make executable
chmod +x switch-mode.sh

# Switch to local
./switch-mode.sh local

# Switch to ngrok
./switch-mode.sh ngrok https://abc-def.ngrok-free.app
```

## 📚 Related Documentation

- [`NGROK_SETUP.md`](NGROK_SETUP.md) - Setup ngrok & multiple environment
- [`RECAPTCHA_NGROK_SETUP.md`](RECAPTCHA_NGROK_SETUP.md) - reCAPTCHA dengan ngrok
- [`NGROK_QUICKSTART.md`](NGROK_QUICKSTART.md) - Quick start ngrok

## 🎯 Summary

**Golden Rules**:
1. ✅ Local mode: `NGROK_URL=` (empty)
2. ✅ Ngrok mode: `NGROK_URL=https://...`
3. ✅ Always clear cache after change
4. ✅ Always restart server after change
5. ✅ Hard refresh browser after change

**Remember**: Panel admin tidak akan berfungsi jika `NGROK_URL` diset tetapi ngrok tidak running!
