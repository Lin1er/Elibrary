# eLibrary

eLibrary adalah aplikasi perpustakaan digital yang dirancang untuk mempermudah manajemen buku, peminjaman, dan pengembalian dalam lingkungan perpustakaan. Proyek ini bertujuan untuk meningkatkan efisiensi dan aksesibilitas layanan perpustakaan secara daring.

## Fitur

- **Manajemen Buku**: Tambah, ubah, dan hapus data buku.
- **Pencarian Buku**: Fitur pencarian cepat berdasarkan judul, penulis, atau kategori.
- **Peminjaman & Pengembalian**: Kelola proses peminjaman dan pengembalian buku secara efisien.
- **Notifikasi**: Ingatkan pengguna terkait batas waktu pengembalian.
- **Multi-User Support**: Role-based akses untuk admin, staf, dan pengguna umum.

## Instalasi

1. Clone repository ini ke lokal:
   ```bash
   git clone git@github.com:Lin1er/eLibrary.git
   cd eLibrary
   ```

2. Install dependensi:
   ```bash
   composer install
   npm install
   ```

3. Konfigurasi file `.env`:
   - Salin file `.env.example` ke `.env`:
     ```bash
     cp .env.example .env
     ```
   - Atur database dan pengaturan lainnya.

4. Migrasi database:
   ```bash
   php artisan migrate
   ```

5. Jalankan server lokal:
   ```bash
   php artisan serve
   ```

## Teknologi yang Digunakan

- **Laravel 11**: Framework backend utama.
- **MySQL**: Basis data untuk menyimpan data aplikasi.
- **Tailwind CSS**: Framework CSS untuk desain responsif.
- **JavaScript**: Untuk interaktivitas pada frontend.

## Contributing

Kami menerima kontribusi dalam bentuk fitur baru, perbaikan bug, atau dokumentasi tambahan. Ikuti langkah berikut untuk berkontribusi:

1. Fork repository ini.
2. Buat branch untuk fitur atau perbaikan Anda:
   ```bash
   git checkout -b fitur-baru-anda
   ```
3. Commit perubahan Anda:
   ```bash
   git commit -m "Deskripsi perubahan"
   ```
4. Push ke branch Anda:
   ```bash
   git push origin fitur-baru-anda
   ```
5. Buat pull request ke branch `main`.

---

Dikembangkan dengan ❤️ oleh [M. Ulinuha As Shiddiqy](https://github.com/Lin1er).
