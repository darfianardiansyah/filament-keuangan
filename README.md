# 📊 Laravel + Filament Admin Panel

Ini adalah project Laravel yang menggunakan [Filament](https://filamentphp.com/) sebagai admin panel modern dan responsif.

## 🚀 Fitur Utama

- Laravel 12+ & Filament v3
- Autentikasi bawaan Laravel
- Manajemen CRUD menggunakan Filament Resource
- Chart, Table, dan Widget dari Filament
- Desain modern dan responsif

## 🛠️ Instalasi

### 1. Clone Project

```bash
git clone https://github.com/darfianardiansyah/filament-keuangan.git
cd filament-keuangan
```

### 2. Install Dependency

```bash
composer install
npm install && npm run build
```

### 3. Copy & Konfigurasi `.env`

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` dan sesuaikan dengan konfigurasi database kamu.

### 4. Jalankan Migrasi

```bash
php artisan migrate
```

### 5. Jalankan Aplikasi

```bash
php artisan serve
```

Akses aplikasi di `http://localhost:8000`

---

## 🔐 Login Filament Admin

Jalankan perintah ini di terminal untuk membuat user:

```
php artisan make:filament-user
```
Setelah registrasi, login ke panel admin di:

```
http://localhost:8000/admin
```


---

## 📁 Struktur Folder Filament

```plaintext
app/
└── Filament/
    ├── Resources/         # Resource CRUD (tables, forms)
    ├── Pages/             # Halaman kustom
    └── Widgets/           # Dashboard widget & chart
```

---
