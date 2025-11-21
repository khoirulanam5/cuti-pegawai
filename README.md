# Sistem Pengajuan Perizinan Cuti Pegawai

Sistem pengajuan cuti pegawai berbasis web dengan alur persetujuan berjenjang. Dibangun menggunakan **PHP Native**, **MySQL**, serta frontend **HTML**, **CSS**, **JavaScript**, dan **Bootstrap**.

---

## 📝 Fitur Utama

### 🧑‍💼 Pengajuan Cuti

* Pengajuan cuti oleh karyawan
* Upload berkas pendukung (opsional)
* Riwayat pengajuan cuti

### ✔️ Alur Persetujuan Cuti

* Pengecekan dan verifikasi oleh admin
* Persetujuan akhir oleh pimpinan
* Status otomatis: *Menunggu*, *Disetujui*, *Ditolak*

### 👥 Role Pengguna

* **Admin** – Mengelola data master, melihat semua pengajuan, memvalidasi
* **Karyawan** – Mengajukan cuti, melihat status, cetak bukti cuti
* **Pimpinan** – Menyetujui/menolak pengajuan, melihat laporan

### 📊 Laporan

* Laporan data cuti pegawai
* Rekap jumlah cuti
* Filter berdasarkan tanggal, pegawai, status

---

## 🛠️ Teknologi yang Digunakan

* **Backend:** PHP Native
* **Database:** MySQL
* **Frontend:** HTML5, CSS3, JavaScript, Bootstrap

---

## 📂 Struktur Folder (Contoh)

```
project-root/
│── index.php
│── config/
│── pages/
│── process/
│── assets/
│   ├── css/
│   ├── js/
│   ├── img/
database/
│── schema.sql
README.md
```

---

## 🔧 Cara Instalasi

1. Clone repository:

   ```bash
   git clone <repo-url>
   ```

2. Masuk ke folder project:

   ```bash
   cd cuti-pegawai
   ```

3. Import database:

   * Buat database baru
   * Import file `schema.sql`

4. Sesuaikan konfigurasi koneksi database pada file `config/koneksi.php`.

5. Jalankan di browser:

   ```
   http://localhost/cuti-pegawai
   ```

---

## 📸 Screenshot (Opsional)

Tambahkan screenshot tampilan sistem:

```
![Dashboard](assets/img/dashboard.png)
![Pengajuan Cuti](assets/img/pengajuan.png)
![Persetujuan](assets/img/persetujuan.png)
```

---

## 📞 Contact

Hubungi admin atau pengembang melalui informasi yang tertera pada sistem.

---

## 📄 License

Open Source / Private, sesuaikan kebutuhan Anda.

---
