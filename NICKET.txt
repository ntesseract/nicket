# NICKET - Sistem Pendaftaran Event

Sistem pendaftaran event modern berbasis web yang dibangun dengan Laravel 12, Filament Admin Panel, dan Tailwind CSS dengan desain minimalis hitam-putih.

## Deskripsi Sistem

NICKET adalah platform pendaftaran event yang memungkinkan pengguna untuk melihat daftar event, melihat detail event, dan mendaftar untuk event yang diminati. Platform ini dilengkapi dengan panel admin yang kuat untuk mengelola event dan pendaftaran peserta.

## Fitur Utama

### Frontend (User)
- **Halaman Utama**: Menampilkan daftar event yang tersedia
- **Halaman Detail Event**: Informasi lengkap tentang event
- **Form Pendaftaran**: Pendaftaran peserta untuk event tertentu
- **Tampilan Responsif**: Dapat diakses dari perangkat desktop maupun mobile

### Backend (Admin)
- **Panel Admin**: Panel admin dengan Filament untuk mengelola sistem
- **Pengelolaan Event**: Membuat, mengedit, dan menghapus event
- **Pengelolaan Gambar Terpisah**: Fitur khusus untuk mengelola gambar event
- **Pengelolaan Pendaftaran**: Melihat dan mengelola data pendaftaran

## Teknologi yang Digunakan

- **Laravel 12**: Framework PHP untuk pengembangan aplikasi web
- **Filament 3**: Panel admin untuk Laravel
- **Tailwind CSS**: Framework CSS untuk styling
- **MySQL**: Database relasional
- **HTML/CSS/JavaScript**: Frontend

## Persyaratan Sistem

- PHP >= 8.2
- Composer
- MySQL
- Node.js dan NPM

## Instalasi

1. **Clone repositori**
   ```bash
   git clone https://github.com/username/nicket.git
   cd nicket
   ```

2. **Instal dependensi PHP**
   ```bash
   composer install
   ```

3. **Siapkan file .env**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Konfigurasi database di file .env**
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nicket
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Jalankan migrasi dan seeder**
   ```bash
   php artisan migrate --seed
   ```

6. **Siapkan symlink storage**
   ```bash
   php artisan storage:link
   ```

7. **Instal dependensi JavaScript**
   ```bash
   npm install
   npm run dev
   ```

8. **Jalankan server**
   ```bash
   php artisan serve
   ```

9. **Akses aplikasi**
   - Frontend: http://localhost:8000
   - Admin panel: http://localhost:8000/admin
   - Login admin default:
     - Email: admin@example.com
     - Password: 12345678

## Struktur Database

### Tabel events
- id (primary key)
- name (nama event)
- event_date (tanggal event)
- information (deskripsi event)
- image_path (path gambar event)
- created_at
- updated_at

### Tabel registrations
- id (primary key)
- event_id (foreign key ke tabel events)
- name (nama peserta)
- email (email peserta)
- birth_date (tanggal lahir peserta)
- address (alamat peserta)
- created_at
- updated_at

## Fitur Khusus: Edit Gambar Terpisah

Sistem ini memiliki fitur khusus untuk mengelola gambar event secara terpisah dari form edit data event. Hal ini memungkinkan admin untuk:

1. Fokus pada pengelolaan gambar saja
2. Upload gambar baru dengan interface drag-and-drop
3. Preview gambar sebelum upload
4. Hapus gambar event dengan mudah

## Penggunaan

### Frontend

1. **Lihat Daftar Event**
   - Kunjungi halaman utama untuk melihat semua event yang tersedia

2. **Lihat Detail Event**
   - Klik pada event untuk melihat informasi lengkap
   - Lihat tanggal, waktu, dan detail event lainnya

3. **Daftar untuk Event**
   - Klik tombol "Register Now" pada halaman detail event
   - Isi formulir pendaftaran dengan data yang diperlukan
   - Submit pendaftaran

### Backend (Admin)

1. **Login ke Panel Admin**
   - Akses http://localhost:8000/admin
   - Login dengan kredensial admin

2. **Kelola Event**
   - Lihat, tambah, edit, dan hapus event
   - Kelola detail event dan gambar

3. **Edit Gambar Event**
   - Klik "Edit Gambar" pada tabel event atau halaman detail event
   - Upload gambar baru atau hapus gambar yang ada

4. **Kelola Pendaftaran**
   - Lihat daftar peserta yang mendaftar untuk setiap event