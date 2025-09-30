# 🚀 Quick Start: Ngrok dengan Filament

## Setup Sekali Saja

```bash
# 1. Link storage
php artisan storage:link

# 2. Clear cache
php artisan optimize:clear
```

## Setiap Kali Pakai Ngrok

### 1️⃣ Jalankan Server Laravel
```bash
php artisan serve
```

### 2️⃣ Jalankan Ngrok (Terminal Baru)
```bash
ngrok http 8000
```

### 3️⃣ Copy URL Ngrok
Contoh: `https://toad-current-humbly.ngrok-free.app`

### 4️⃣ Update .env
```env
NGROK_URL=https://toad-current-humbly.ngrok-free.app
```
⚠️ **PENTING**: Harus `https://` bukan `http://`

### 5️⃣ Restart Server
```bash
# Tekan Ctrl+C di terminal server
php artisan serve
```

### 6️⃣ Akses via Ngrok
Buka browser: `https://toad-current-humbly.ngrok-free.app`

## ✅ Mode Local (Tanpa Ngrok)

```env
NGROK_URL=
```
Akses: `http://127.0.0.1:8000`

## 🔧 Troubleshooting Cepat

### CSS/JS Tidak Load?
```bash
php artisan config:clear
php artisan view:clear
# Ctrl+C lalu restart: php artisan serve
```

### Masih Error?
1. Pastikan `NGROK_URL` di `.env` pakai `https://`
2. Restart server Laravel
3. Hard refresh browser (Ctrl+Shift+R)

## 📝 Catatan

- ❌ **JANGAN** pakai `http://localhost` → pakai `http://127.0.0.1`
- ✅ Ngrok URL **HARUS** pakai `https://`
- 🔄 Ngrok free tier: URL berubah setiap restart
- 💾 Update `.env` setiap kali URL ngrok berubah

## 📚 Dokumentasi Lengkap

Lihat [`NGROK_SETUP.md`](NGROK_SETUP.md) untuk penjelasan detail dan troubleshooting advanced.
