# Update Pembaruan Aplikasi

### Fitur yang Ditambahkan:
- **Form Pendaftaran Pengguna:**
  - Menambahkan kolom **Username** pada form pendaftaran.
  - Menambahkan pengaturan peran **default** untuk pengguna baru (`User Normal`).

- **Ikon Pembayaran:**
  - Menambahkan ikon **GoPay** wordmark.
  - Menambahkan ikon **DANA**.
  - Menambahkan ikon **Mandiri**.
  - Menambahkan ikon **QRIS**.

- **Tabel dan Relasi Database:**
  - Menambahkan **Tabel Carts** untuk mencatat carts belanja pengguna.
  - Menambahkan **Tabel Event** untuk data acara yang tersedia.
  - Menambahkan **Tabel Artist** untuk data artis yang terlibat.
  - Menambahkan **Tabel Event Artist** untuk menghubungkan acara dengan artis.
  - Menambahkan **Tabel Ticket** untuk data tiket yang dijual.
  - Menambahkan **Tabel User Ticket** untuk mencatat pembelian tiket oleh pengguna.
  - Menambahkan **Tabel User Ticket History** untuk menyimpan riwayat pembelian tiket pengguna.
  - Menambahkan kolom **Gender** pada data pengguna untuk lebih detail.

- **Dashboard dan UI Pengguna:**
  - Menambahkan tampilan **Dashboard Pengguna**
  - Menambahkan **UI Tiket Pengguna**

- **Integrasi Pembayaran:**
  - Konfig **Midtrans** untuk transaksi pembayaran tiket.

---

### **Error yang Ditemui:**
- **Bug Pembayaran Otomatis:**
  - Pembayaran tercatat berhasil meskipun proses pembelian gagal.

---

### **Permintaan Fitur (Feature Request) yang belum dibuat:**
- **Pembelian Tiket Lebih dari 1:**
  - Menambahkan fitur untuk mendetailkan **Gender** 1 pengguna pada pembelian tiket lebih dari satu.

- **Form Alasan Kedatangan:**
  - Menambahkan **form alasan datang** untuk mencatat tujuan atau alasan pengguna membeli tiket.

- **Sesi pada Event:**
  - Menambahkan fitur **Sesi pada Event** untuk mengelompokkan acara berdasarkan sesi waktu atau tanggal.

- **Form Pembelian Guest**
  - Menambahkan form **Pembelian Guest** untuk guest beli tiket
  - Kirim QR ke guest (WA, E-mail)

- **Pembelian**
  - Kembali ke dashboard jika berhasil membeli


**Belum dicoba**
- Carts pengguna
- Admin CRUD
