# 🚀 Starterkit Laravel Livewire

Starterkit Laravel Livewire adalah fondasi aplikasi web berbasis Laravel yang telah terintegrasi dengan Livewire untuk pembuatan komponen interaktif tanpa perlu JavaScript secara manual, serta sistem manajemen role & permission menggunakan package Spatie Laravel Permission. Starterkit ini dirancang untuk mempercepat pengembangan aplikasi web modern, aman, dan mudah dikustomisasi.

## ✨ Fitur Utama

-   ⚡ **Laravel 10+**: Framework PHP modern, aman, dan powerful.
-   🔌 **Livewire**: Komponen interaktif tanpa perlu menulis JavaScript.
-   🛡️ **Spatie Laravel Permission**: Manajemen role dan permission berbasis database.
-   🔐 **Autentikasi & Otorisasi**: Sistem login, register, dan pengelolaan hak akses.
-   🗂️ **Struktur Kode Rapi**: Mengikuti best practice Laravel.
-   🏁 **Siap Pakai**: Sudah termasuk halaman dashboard, manajemen user, dan layout responsif.

## 🛠️ Prasyarat

Sebelum instalasi, pastikan Anda sudah menginstal:

-   🐘 PHP >= 8.1
-   🎼 Composer
-   🟢 Node.js & NPM
-   🗄️ Database (MySQL/MariaDB/PostgreSQL)
-   🌀 [Opsional] Git

## 📦 Instalasi

Ikuti langkah-langkah berikut untuk menginstal aplikasi ini di komputer Anda:

1. 🔽 **Clone Repository**

    ```bash
    git clone https://github.com/username/starterkit-laravel.git
    cd starterkit-laravel
    ```

2. 📥 **Install Dependency PHP**

    ```bash
    composer install
    ```

3. 📥 **Install Dependency Frontend**

    ```bash
    npm install
    ```

4. 📝 **Copy File Environment**

    ```bash
    cp .env.example .env
    ```

5. 🔑 **Generate Application Key**

    ```bash
    php artisan key:generate
    ```

6. ⚙️ **Konfigurasi Database**

    Edit file `.env` dan sesuaikan konfigurasi database:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database
    DB_USERNAME=username
    DB_PASSWORD=password
    ```

7. 🗃️ **Migrasi & Seeder Database**

    ```bash
    php artisan migrate --seed
    ```

8. 🛠️ **Compile Asset Frontend**

    ```bash
    npm run dev
    ```

    atau untuk production:

    ```bash
    npm run build
    ```

9. ▶️ **Jalankan Server**
    ```bash
    php artisan serve
    ```

Akses aplikasi di [http://localhost:8000](http://localhost:8000)


## 🛡️ Manajemen Role & Permission

Starterkit ini menggunakan [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission/v5/introduction) untuk mengelola role dan permission. Anda dapat menambah/mengubah role & permission melalui seeder, Tinker, atau CRUD yang disediakan.


## 🤝 Kontribusi

Kontribusi sangat terbuka! Silakan fork repository ini dan ajukan pull request.

## 📄 Lisensi

Aplikasi ini menggunakan lisensi MIT. Silakan gunakan dan modifikasi sesuai kebutuhan.
