


## About Task Dadiyu


## Features Implemented

* Pengguna umum dapat mendaftar/login
* Baik admin dan pengguna umum dapat membuat, melihat, mengedit, menghapus tugas
* Baik admin dan pengguna umum dapat menandai tugas sebagai selesai
* Pengguna admin dapat melihat semua pengguna
* Pengguna admin dapat mengubah/menetapkan peran kepada pengguna
* Pengguna admin dapat menghapus pengguna
* Pengguna umum dan admin dapat memperbarui informasi akun mereka
* Pengguna umum dan admin dapat mengubah kata sandi mereka

## Tubes Framework Instruction Cara Install

* git clone https://github.com/Wahyuadhiprabowo1/to-do-list.git nama-folder
* cd nama folder
* composer install atau composer update
* buat database todolist
* php artisan migrate:fresh --seed
* php artisan key:generate
* php artisan serve