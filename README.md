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
- Management User
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

## Persyaratan Untuk Melakukan Instalasi
- PHP 8.2.12 & Web Server (Apache)
- Database (MariaDB)
- Web Browser (Chrome)

## Instalasi 
1 . Clone Repository, install/update composer dan install node js
```
git clone https://github.com/FaisalRam02/fly-broken-wings
npm install ; npm run dev
composer install
cp .env.example .env
```
2. Konfigurasi Database pada file .env
```
APP_DEBUG=true
DB_DATABASE=cooker
DB_USERNAME=root
DB_PASSWORD=
```
3. Melakukan Migrasi (opsional) dan menyambungkan storage
```
php artisan key:generate
php artisan storage:link
php artisan migrate
```
4. Mulai Situs Web
```
php artisan serve
```
**UKK persuratan dibuat oleh [Misr](https://www.instagram.com/fruit.sal.ad/) aka [Sal](https://web.facebook.com/faram8)**
