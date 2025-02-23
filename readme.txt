# **Sistem Informasi Monitoring Kegiatan dan Presensi Magang**

## **Deskripsi Proyek**
Proyek ini merupakan sistem berbasis web yang dirancang untuk **memantau kegiatan dan presensi peserta magang** di **Dinas Sosial Kota Batu**. Sistem ini memungkinkan admin untuk mengelola data peserta magang, mencatat kegiatan harian mereka, serta memantau kehadiran dengan lebih efektif dan efisien.

## **Fitur Utama**
✅ **Manajemen Peserta Magang**: Tambah, edit, dan hapus data peserta magang.  
✅ **Monitoring Kegiatan**: Pencatatan kegiatan harian mahasiswa magang dengan detail waktu dan deskripsi.  
✅ **Presensi Magang**: Sistem pencatatan kehadiran berbasis QR Code untuk validasi kehadiran peserta magang.  
✅ **Dashboard Admin**: Tampilan ringkasan kegiatan dan presensi dalam satu tempat.  
✅ **Notifikasi & Validasi Data**: Peringatan jika ada data yang tidak valid atau belum diisi.  

## **Teknologi yang Digunakan**
- **Backend**: PHP (Native) dengan MySQL sebagai database  
- **Frontend**: HTML, CSS, JavaScript  
- **Framework & Library**: Bootstrap untuk UI, jQuery untuk interaksi dinamis  
- **Keamanan**: Validasi input untuk mencegah data yang tidak valid  


## **Cara Instalasi**
1. **Clone Repository**  
   ```bash
   git clone https://github.com/lintarrezha/Monitoring_Intern.git

2. **Import Database**

- Buat database baru di MySQL dengan nama absensimagang
- Import file database.sql yang ada di folder /database/

3. **Konfigurasi Koneksi Database**

Buka file /config/database.php
Sesuaikan pengaturan database:
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "absensimagang";

4. **Jalankan di Localhost**

- Letakkan folder proyek di htdocs jika menggunakan XAMPP
- Jalankan localhost/absensimagang di browser



