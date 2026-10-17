RIHLAH TRAVEL GUIDE - UTS PEMROGRAMAN WEB

Isi folder:
- index.php: halaman utama
- packages.php: informasi layanan dan tabel contoh paket wisata (harga/fasilitas perlu dikonfirmasi)
- destinations.php: daftar destinasi, pencarian dengan GET, serta list inspirasi destinasi per wilayah
- about.php: informasi singkat
- contact.php: formulir pertanyaan dengan POST
- includes/header.php: navigasi dan penghitung page view
- includes/footer.php: bagian bawah halaman dan jumlah page view
- style.css: tampilan website, tabel paket responsif, dan grid daftar destinasi
- counter.txt: penyimpanan angka page view

Menjalankan di XAMPP:
1. Salin folder RihlahProject ke C:\xampp\htdocs\.
2. Jalankan Apache dari XAMPP Control Panel.
3. Buka http://localhost/RihlahProject/index.php
4. Coba semua tautan navigasi, pencarian destinasi, dan formulir kontak.

Catatan:
- Website ini menggunakan PHP dasar, HTML, CSS, GET, POST, if/else, array/loop sederhana, dan file counter.
- Formulir menampilkan ringkasan pertanyaan; data tidak disimpan ke database dan tidak dikirim otomatis.
- Harga, jadwal, dan rincian paket tidak dibuat-buat. Hubungi Rihlah untuk konfirmasi.
- Gambar menggunakan URL eksternal sehingga membutuhkan internet.
- Logo gambar resmi tidak tersedia di file yang diberikan, jadi header menggunakan wordmark teks “RIHLAH TRAVEL GUIDE” dan tidak memakai lambang R rekaan.
- Saat dipindahkan ke hosting, pastikan counter.txt bisa ditulis oleh PHP.

Sebelum mengumpulkan:
- Tes packages.php dan destinations.php; tabel paket menggunakan elemen HTML table dan daftar fasilitas menggunakan ul/li.
- Harga/fasilitas merupakan contoh informasi yang pernah dipublikasikan dan harus dikonfirmasi kembali kepada Rihlah. Destinasi selain Jawa Timur ditandai sebagai inspirasi umum.
- Jika penghitung tidak bertambah saat online, periksa permission file counter.txt dan folder proyek pada hosting.
