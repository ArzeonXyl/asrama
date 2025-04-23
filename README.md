# 🏠 Aplikasi Manajemen Asrama

Repositori ini adalah hasil dari project mata kuliah **Pengembangan Aplikasi Web** dengan tema **Manajemen Asrama**.

## 📌 Deskripsi

Aplikasi ini dibuat untuk memudahkan pengelolaan data penghuni, kamar, dan fasilitas di sebuah asrama. Fitur-fitur utama mencakup:

- Manajemen data penghuni
- Manajemen data kamar
- Alokasi kamar ke penghuni
- Pencatatan fasilitas
- Dashboard untuk melihat ringkasan data

## 🛠️ Teknologi yang Digunakan

- **Java** dengan **Play Framework**
- **MySQL** untuk penyimpanan data
- **HTML, CSS, JavaScript** untuk tampilan antarmuka
- **Bootstrap** untuk styling antarmuka

## 🚀 Cara Menjalankan Project

1. **Clone repositori**
   ```bash
   git clone https://github.com/ArzeonXyl/asrama.git
   cd asrama
   ```

2. **Konfigurasi database**
   - Buat database MySQL misalnya `asrama_db`
   - Sesuaikan file `application.conf` dengan konfigurasi database kamu

3. **Jalankan project**
   ```bash
   sbt run
   ```

4. **Akses aplikasi**
   - Buka browser dan akses `http://localhost:9000`

## 📂 Struktur Folder Penting

```
app/
 ├── controllers/      # Controller untuk menangani request
 ├── models/           # Model data (tanpa ORM kompleks)
 ├── views/            # Template HTML
conf/
 └── application.conf  # Konfigurasi database dan lainnya
public/
 └── stylesheets/      # CSS dan asset publik lainnya
```

## 👨‍💻 Kontributor

- [ArzeonXyl](https://github.com/ArzeonXyl)

## 📄 Lisensi

Project ini dibuat untuk keperluan akademik dan tidak menggunakan lisensi terbuka.
