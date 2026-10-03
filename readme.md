# 🚗 Sistem Manajemen Kendaraan & Servis

Aplikasi web sederhana untuk mengelola data kendaraan dan data servis kendaraan menggunakan **PHP OOP** dan **MySQL**.

Project ini dibuat sebagai latihan penerapan konsep **Object-Oriented Programming (OOP)**, koneksi database menggunakan **PDO**, serta operasi **CRUD (Create, Read, Update, Delete)** pada PHP.

---

## 📌 Tentang Project

Project ini menyediakan sistem sederhana untuk mencatat dan mengelola kendaraan beserta riwayat servisnya.

Pengguna dapat melakukan beberapa aktivitas seperti:

- Menampilkan daftar kendaraan
- Menambahkan kendaraan baru
- Mengubah data kendaraan
- Menghapus data kendaraan
- Melihat data servis kendaraan
- Menambahkan data servis
- Mengubah data servis
- Menghapus data servis

Project menggunakan struktur kode berbasis **OOP** agar kode lebih terorganisir dan mudah dikembangkan.

---

## ⚙️ Fitur

### 🚘 Manajemen Kendaraan

| Fitur | Keterangan |
|---|---|
| Tambah Kendaraan | Menambahkan data kendaraan ke database |
| Lihat Kendaraan | Menampilkan seluruh data kendaraan |
| Edit Kendaraan | Mengubah data kendaraan |
| Hapus Kendaraan | Menghapus data kendaraan |

### 🔧 Manajemen Servis

| Fitur | Keterangan |
|---|---|
| Tambah Servis | Menambahkan data servis kendaraan |
| Lihat Servis | Menampilkan data servis |
| Edit Servis | Mengubah data servis |
| Hapus Servis | Menghapus data servis |

---

## 🛠️ Teknologi yang Digunakan

- **PHP** - Bahasa pemrograman utama
- **MySQL** - Database
- **PDO** - Koneksi dan interaksi dengan database
- **HTML** - Struktur halaman
- **CSS** - Tampilan halaman
- **OOP** - Struktur pemrograman
- **Laragon** - Local development environment
- **Visual Studio Code** - Code editor

---

## 📂 Struktur Project

```text
OOP/
│
├── classes/
│   ├── kendaraan.php
│   └── servis.php
│
├── config/
│   └── database.php
│
├── database.sql
│
├── index.php
├── servis.php
│
├── tambah.php
├── edit.php
├── hapus.php
│
├── tambah_servis.php
├── edit_servis.php
└── hapus_servis.php