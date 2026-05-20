# Baca Saya

Ini adalah semacam boilerplate untuk mulai belajar bagaimana kerja dari Laravel dan Midtrans.
Bagi teman-teman yang akan menggunakan repo ini, bisa diperhatikan beberapa hal ini:

## Spesifikasi
Program yang digunakan di Project ini adalah:
- Laravel Versi 12
- PHP Versi 8.3
- MySQL
- Composer

## Bagaimana Menggunakan 
Untuk menggunakan dari repo ini silakan lakukan beberapa langkah berikut ini.
1. Clone project ini di direktori yang disuka
```
git clone https://github.com/FulIqballO/laravel-midtrans-boilerplate.git
```
2. Masuk ke bagian dalam dari project 
```
cd laravel-midtrans-boilerplate
```
3. Copy file `.env.example` ke file `.env`
```
cp .env.example .env 
```
4. Instal Library
```
composer install
```
5. Generate key 
```
php artisan key:generate
```
6. Sesuaikan koneksi di file `.env`
7. Masukkan skema
```
php artisan migrate 
```
8. Masukkan beberapa data dasar 
```
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=ProductSeeder
php artisan db:seed --class=OrderSeeder
```
9. Jalankan Laravel 

