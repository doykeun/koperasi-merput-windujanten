# Panduan Hosting di Railway

## 1. Setting APP_URL
Di Railway dashboard, buka Variables/Environment dan tambahkan:
```
APP_URL=https://your-railway-domain.railway.app
```
Ganti dengan domain Railway Anda.

## 2. Storage Link
Kami sudah menambahkan kode di AppServiceProvider untuk otomatis membuat storage link saat aplikasi berjalan, namun jika masih tidak bekerja:
- Jalankan di Railway console (jika memungkinkan):
  ```bash
  php artisan storage:link
  ```

## 3. File Permissions
Pastikan folder `storage` dan `bootstrap/cache` memiliki izin write:
```bash
chmod -R 775 storage bootstrap/cache
```

## 4. Environment Lainnya
Pastikan semua variabel environment sesuai:
- DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD sesuai dengan database di Railway
- APP_ENV=production
- APP_DEBUG=false (untuk keamanan)
- FILESYSTEM_DISK=public
