## Tools Yang Digunakan
- [Visual Studio Code](https://code.visualstudio.com/)
- [XAMPP](https://www.apachefriends.org/download.html)

## Fitur Yang Tersedia
- Auth
  - Register
  - Login
- Homepage
  - Pengajuan
  - Pengecekan
- User Management
  - User
- Penduduk Management
  - Data Penduduk
  - Pekerjaan
- Layanan Persuratan
  - Surat
  - Document
  - Kategori Document

## ERD 
![alt text](https://raw.githubusercontent.com/FaisalRam02/fly-broken-wings/refs/heads/main/ERD.jpeg)

Tabel Failed_Jobs, Personal_access_tokens, Password_resets, migrations diabaikan saja karena itu bawaan dari Laravel.

## UML
![alt text](https://raw.githubusercontent.com/FaisalRam02/fly-broken-wings/refs/heads/main/UML.png)

## Teknologi Yang Digunakan
- [Laravel 9](https://laravel.com/docs/9.x/releases)
- [Bootstrap 5](https://getbootstrap.com/docs/5.0/getting-started/introduction/)
- [AdminLTE 3.13]()
- [dompdf 3.0](https://github.com/dompdf/dompdf)

## Persyaratan Untuk Melakukan Instalasi
- PHP 8.2.12 & Web Server (Apache)
- Database (MariaDB)
- Web Browser (Chrome)

## Instalasi

Simpan Kop ini di public/storage

![alt text](https://github.com/FaisalRam02/fly-broken-wings/blob/main/kop.png?raw=true)

1. Clone Repository
```
git clone https://github.com/FaisalRam02/fly-broken-wings
```
2. Salin file env.
```
cp .env.example .env
```
3. Install atau Update composer
```
composer install
```
4. Install dan Jalankan NPM
```
npm install ; npm run dev
```
5. Konfigurasi Database pada file .env
```
APP_DEBUG=true
DB_DATABASE=cooker
DB_USERNAME=root
DB_PASSWORD=
```
6. Buat kunci
```
php artisan key:generate
```
7. Lakukan Migrasi (opsional)
```
php artisan migrate
```
8. Sambungkan Storage
```
php artisan storage:link
```
9. Mulai Situs Web
```
php artisan serve
```
**UKK persuratan dibuat oleh [Misr](https://www.instagram.com/fruit.sal.ad/)**
