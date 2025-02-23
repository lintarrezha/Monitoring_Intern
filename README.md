# Sistem Informasi Monitoring Kegiatan dan Presensi Magang

Sistem Informasi Monitoring Kegiatan dan Presensi Magang adalah aplikasi berbasis web yang dikembangkan untuk Dinas Sosial Kota Batu. Sistem ini bertujuan untuk mengoptimalkan pengelolaan dan pemantauan kegiatan peserta magang, dengan fokus pada pencatatan kehadiran dan aktivitas harian secara digital.

## Fitur Utama

### Manajemen Peserta Magang
- Pendaftaran peserta magang baru
- Pengelolaan data profil peserta
- Pengaturan periode magang
- Pengelolaan dokumen peserta

### Monitoring Kegiatan
- Pencatatan kegiatan harian dengan timestamp
- Upload dokumentasi kegiatan
- Evaluasi dan feedback kegiatan
- Laporan aktivitas mingguan/bulanan

### Sistem Presensi Digital
- Presensi berbasis QR Code
- Validasi lokasi presensi
- Riwayat kehadiran real-time
- Rekap presensi otomatis

### Dashboard Admin
- Monitoring aktivitas real-time
- Statistik kehadiran dan kinerja
- Manajemen pengumuman
- Pengaturan sistem

## Teknologi

### Backend
- PHP 7.4+
- MySQL 5.7+
- Apache/Nginx

### Frontend
- HTML5
- CSS3
- JavaScript
- Bootstrap 5
- jQuery 3.6

### Keamanan
- Input sanitization
- XSS protection
- CSRF protection
- Session management

## Persyaratan Sistem
- PHP >= 7.4
- MySQL >= 5.7
- Web Server (Apache/Nginx)
- Browser modern (Chrome, Firefox, Safari, Edge)

## Instalasi

### 1. Clone Repository
```
git clone https://github.com/lintarrezha/Monitoring_Intern.git
```
```
cd Monitoring_Intern
```
### 2. Konfigurasi Database

#### Buat database baru:
```
sqlCopyCREATE DATABASE absensimagang;
```
#### Import struktur database:
```
bashCopymysql -u root -p absensimagang < database/database.sql
```
### 3. Konfigurasi Aplikasi

#### Salin file konfigurasi:
```
bashCopycp config/database.example.php config/database.php
```
#### Sesuaikan pengaturan di config/database.php:
```
phpCopy$host = "localhost";
$user = "root";
$pass = "";
$dbname = "absensimagang";
```
### 4. Deployment

#### Pindahkan folder proyek ke direktori web server:
```
XAMPP: C:/xampp/htdocs/
WAMP: C:/wamp/www/
Linux: /var/www/html/
```

#### Akses aplikasi melalui browser:
```
Copy http://localhost/Monitoring_Intern
```
```
Akun Default

Username: admin
Password: 123456

User:
Username: 
Password: 123456
```
### Kontribusi
Kami menerima kontribusi untuk pengembangan sistem ini. Silakan buat pull request atau laporkan issues melalui GitHub.

