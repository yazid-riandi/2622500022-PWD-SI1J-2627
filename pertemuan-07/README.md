# pertemuan-07

## Pengembangan

Pada Pertemuan 7, proyek dari Pertemuan 6 dikembangkan dengan menambahkan pemrosesan formulir menggunakan PHP. Pengembangan dilakukan secara bertahap, mulai dari penggunaan metode GET dan POST hingga validasi data di sisi peladen.

- Perubahan dan fitur yang dikembangkan:

1. Persiapan Proyek

Menyalin artefak dari folder pertemuan-06 ke pertemuan-07.

Mempertahankan file index.php, style.css, script.js, dan folder img.

Menjalankan proyek menggunakan Laragon dan localhost.

2. Pemrosesan Formulir GET

Mempelajari pengiriman data menggunakan metode GET.

Menggunakan variabel superglobal $_GET untuk menerima data.

Mengamati parameter formulir yang ditampilkan pada URL.

Membuat file indexGet.php sebagai demonstrasi metode GET.

3. Pemrosesan Formulir POST

Mengubah metode formulir utama dari GET menjadi POST.

Menggunakan variabel superglobal $_POST untuk menerima data.

Memproses berbagai jenis input seperti nama, email, semester, tanggal, jenis pesan, topik minat, program studi, dan pesan.

Mengubah atribut checkbox menjadi name="minat[]" agar dapat menerima beberapa pilihan.

4. Validasi Sisi Peladen

Memeriksa kelengkapan data formulir menggunakan PHP.

Memvalidasi format email menggunakan filter_var() dan FILTER_VALIDATE_EMAIL.

Memvalidasi semester menggunakan FILTER_VALIDATE_INT dengan rentang 1 sampai 14.

Memvalidasi nilai pilihan formulir menggunakan in_array().

Melakukan normalisasi input menggunakan trim().

5. Pengamanan Keluaran HTML

Menggunakan htmlspecialchars() untuk mengamankan data yang ditampilkan kembali.

Menggunakan ENT_QUOTES dan encoding UTF-8.

Menggunakan nl2br() untuk mempertahankan pergantian baris pada pesan.

6. Session dan Post-Redirect-Get (PRG)

Menggunakan session_start() untuk memulai session.

Menyimpan data formulir dan pesan kesalahan ke dalam $_SESSION.

Menggunakan header('Location: index.php') untuk melakukan redirect.

Menggunakan exit untuk menghentikan eksekusi setelah redirect.

Menampilkan kembali data formulir setelah proses redirect.

7. Git dan GitHub

Melakukan pencatatan perubahan pada setiap tahap pengembangan.

Melakukan git add, git commit, dan git push setelah perubahan selesai diuji.

## Struktur Direktori

pertemuan-07/
├── index.php
├── indexGet.php
├── style.css
├── script.js
├── README.md
└── img/
    └── foto-profil.jpg

## Cara Menjalankan Aplikasi

Pastikan Laragon sudah terinstal.

Simpan folder proyek pertemuan-07 di dalam direktori C:\laragon\www\.

Buka aplikasi Laragon.

Klik Start All untuk menjalankan layanan yang diperlukan.

Buka browser dan akses alamat berikut:

http://localhost/pwd/2627/si1j/2622500022-PWD-SI1J-2627/pertemuan-07/)

Pastikan halaman profil mahasiswa dan formulir kontak dapat ditampilkan.

## Pengujian

1. Pengujian Metode GET

URL pengujian: indexGet.php

Pemeriksaan: Data formulir dikirim melalui parameter URL dan dapat diterima menggunakan $_GET.

2. Pengujian Metode POST

Hasil pengujian: [Tuliskan hasil pengujian POST yang diperoleh].

Pemeriksaan: Data formulir diterima menggunakan $_POST dan tidak ditampilkan sebagai parameter pada URL.

3. Pengujian Validasi Sisi Peladen

Hasil pengujian: [Tuliskan hasil pengujian validasi yang diperoleh].

Pemeriksaan: PHP dapat mendeteksi input kosong, format email tidak valid, semester di luar rentang 1–14, dan pilihan formulir yang tidak sesuai.

4. Pengujian Pengamanan Keluaran HTML

Hasil pengujian: [Tuliskan hasil pengujian yang diperoleh].

Pemeriksaan: Input HTML seperti <b>Mahasiswa</b> ditampilkan sebagai teks biasa, bukan diproses sebagai markup HTML.

5. Pengujian Session dan PRG

Hasil pengujian: [Tuliskan hasil pengujian session dan PRG yang diperoleh].

Pemeriksaan: Setelah formulir dikirim, halaman melakukan redirect dan data formulir tetap dapat ditampilkan melalui session.

6. Galat dan Perbaikan

Galat yang ditemukan: [Tuliskan jika ada].

Solusi atau perbaikan: [Tuliskan langkah perbaikan yang dilakukan].

## Dokumentasi Git

Perintah yang digunakan untuk mengelola perubahan proyek:

git add .
git commit -m "Menerapkan pemrosesan formulir PHP P7"
git push

## Repositori

URL GitHub: [https://github.com/yazid-riandi/2622500022-PWD-SI1J-2627]