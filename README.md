# ✍️ Prediksi Tulisan Tangan

Aplikasi web berbasis **Laravel 12** untuk memprediksi teks dari gambar tulisan tangan menggunakan **Tesseract OCR** dengan package PHP [`thiagoalessio/tesseract-ocr`](https://github.com/thiagoalessio/tesseract-ocr-for-php).

---

## 🚀 Fitur

- Upload gambar tulisan tangan 📸
- Proses OCR untuk prediksi teks 🔍
- Tampilkan hasil teks yang bersih ✨
- Hitung jumlah karakter & kata 🔢
- Preview gambar hasil upload 🖼️
- Mendukung bahasa Inggris dan Indonesia 🇬🇧🇮🇩

---

## 🛠️ Persyaratan Sistem

- PHP 8.x atau lebih baru 🐘
- Laravel 12 ⚙️
- Tesseract OCR (terinstall di komputer/server) 🖥️
- Composer 📦
- Web server (Apache, Nginx, dll) 🌐

---

## 📝 Langkah Instalasi Lengkap

### 1️⃣ Install Laravel (jika belum ada)

```bash
composer create-project laravel/laravel prediksi-tulisan-tangan
cd prediksi-tulisan-tangan
````

---

### 2️⃣ Clone repo (jika pakai repo ini)

```bash
git clone https://github.com/OGDogg-Dev/Prediksi-Tulisan-Tangan.git
cd Prediksi-Tulisan-Tangan
```

---

### 3️⃣ Install dependency PHP

```bash
composer install
```

---

### 4️⃣ Setup file environment

* Copy file `.env.example` ke `.env`

```bash
cp .env.example .env
```

* Sesuaikan konfigurasi database, jika menggunakan.

---

### 5️⃣ Generate key aplikasi Laravel

```bash
php artisan key:generate
```

---

### 6️⃣ Buat symbolic link storage

```bash
php artisan storage:link
```

---

### 7️⃣ Install Tesseract OCR

* **Windows**:
  Unduh dan install dari:
  [https://github.com/tesseract-ocr/tesseract/releases](https://github.com/tesseract-ocr/tesseract/releases)
  Default path biasanya:
  `C:\Program Files\Tesseract-OCR\tesseract.exe`

* **Linux (Ubuntu/Debian)**:

```bash
sudo apt update
sudo apt install tesseract-ocr
```

* **MacOS (Homebrew)**:

```bash
brew install tesseract
```

---

### 8️⃣ Pastikan path executable Tesseract di controller sudah benar

```php
->executable('C:\Program Files\Tesseract-OCR\tesseract.exe')
```

Atau hapus baris `->executable()` jika sudah ada di PATH environment variabel.

---

### 9️⃣ Jalankan server Laravel

```bash
php artisan serve
```

---

### 🔟 Akses aplikasi di browser

```
http://localhost:8000/ocr
```

---

## 🧑‍💻 Cara penggunaan

1. Klik tombol **Choose File** dan pilih gambar tulisan tangan.
2. Klik **Proses OCR** untuk mulai prediksi.
3. Lihat hasil teks di sebelah kanan.
4. Jumlah karakter dan kata ditampilkan di bawah hasil.
5. Preview gambar yang diupload tampil di bawah form.

---

## 👍 Kelebihan

* Implementasi sederhana & mudah dikembangkan
* Mendukung bahasa Indonesia dan Inggris
* Bersih dari spasi dan whitespace berlebihan
* Preview gambar upload
* Validasi upload menggunakan Laravel

---

## 👎 Kekurangan

* Akurasi tergantung kualitas gambar
* Belum ada preprocessing otomatis (rotasi, kontras, dll)
* Perlu instalasi Tesseract manual
* Tidak cocok untuk tulisan tangan rumit
* Belum ada batch processing

---

## 🔮 Rencana pengembangan

* Tambahkan preprocessing gambar otomatis
* Dukungan bahasa & model OCR lebih banyak
* Auto-rotate dan deskew
* Batch upload & simpan hasil
* Model AI handwriting recognition khusus

---

## 📂 Struktur folder penting

* `app/Http/Controllers/OCRController.php` — Logika OCR
* `resources/views/ocr/form.blade.php` — Form dan hasil OCR
* `storage/app/public/uploads` — Tempat simpan gambar upload

---

Terima kasih sudah menggunakan aplikasi ini! 🙏
Jika ada pertanyaan atau saran, jangan ragu untuk menghubungi.

```

---


```
