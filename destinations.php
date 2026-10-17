<?php
$pageTitle = 'Destinasi | Rihlah Travel Guide';
$currentPage = 'destinations';
include __DIR__ . '/includes/header.php';

// Week 6: GET reads the optional search keyword from the URL.
$keyword = '';
if (isset($_GET['q']) && is_string($_GET['q'])) {
    $keyword = trim($_GET['q']);
}

$destinations = [
    ['id'=>'jawa-timur','name'=>'Jawa Timur','region'=>'JAWA / 01','description'=>'Inspirasi lanskap alam dan perjalanan di Jawa Timur.','image'=>'https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=1000&q=85','alt'=>'Pemandangan pegunungan'],
    ['id'=>'jawa-tengah','name'=>'Jawa Tengah','region'=>'JAWA / 02','description'=>'Inspirasi budaya, alam, dan tempat bersejarah.','image'=>'https://images.unsplash.com/photo-1596402184320-417e7178b2cd?auto=format&fit=crop&w=1000&q=85','alt'=>'Candi dan peninggalan budaya'],
    ['id'=>'bali','name'=>'Bali','region'=>'PULAU / 03','description'=>'Kenali pesona tropis dan pengalaman budaya Bali.','image'=>'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1000&q=85','alt'=>'Lanskap tropis Bali'],
    ['id'=>'lombok','name'=>'Lombok','region'=>'PULAU / 04','description'=>'Inspirasi perjalanan alam dan pantai Lombok.','image'=>'https://images.unsplash.com/photo-1518548419970-05e1c5c2d6a5?auto=format&fit=crop&w=1000&q=85','alt'=>'Pantai tropis dan laut biru'],
    ['id'=>'labuan-bajo','name'=>'Labuan Bajo & Komodo','region'=>'NUSA TENGGARA / 05','description'=>'Inspirasi petualangan bahari di Labuan Bajo dan Komodo.','image'=>'https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?auto=format&fit=crop&w=1000&q=85','alt'=>'Kapal di laut tropis'],
    ['id'=>'aceh','name'=>'Aceh','region'=>'SUMATRA / 06','description'=>'Jelajahi inspirasi destinasi di Aceh.','image'=>'https://images.unsplash.com/photo-1500375592092-40eb2168fd21?auto=format&fit=crop&w=1000&q=85','alt'=>'Ombak laut dan pantai'],
];

$filteredDestinations = [];
foreach ($destinations as $destination) {
    if ($keyword === '' || stripos($destination['name'], $keyword) !== false || stripos($destination['description'], $keyword) !== false) {
        $filteredDestinations[] = $destination;
    }
}
?>
<main>
<section class="inner-hero inner-hero-split">
  <div><span class="eyebrow">DESTINATION INSPIRATION</span><h1>Ke mana pun arahmu, <em>mulai dari sini.</em></h1></div>
  <p>Halaman Lynk Rihlah menampilkan tautan perjalanan ke beberapa wilayah Indonesia. Kartu di bawah adalah inspirasi destinasi, bukan jaminan bahwa paket tertentu selalu tersedia.</p>
</section>

<section class="destination-search section-block">
  <form method="GET" action="destinations.php" class="search-form">
    <label for="q">Cari wilayah destinasi</label>
    <div class="search-row">
      <input id="q" name="q" type="search" value="<?= htmlspecialchars($keyword) ?>" placeholder="Contoh: Bali, Aceh, Jawa Timur">
      <button class="button button-primary" type="submit">Cari Destinasi</button>
      <?php if ($keyword !== ''): ?><a class="button button-outline" href="destinations.php">Reset</a><?php endif; ?>
    </div>
  </form>
  <?php if ($keyword !== ''): ?>
    <p class="search-summary">Hasil pencarian untuk <strong><?= htmlspecialchars($keyword) ?></strong>: <?= count($filteredDestinations) ?> destinasi.</p>
  <?php endif; ?>
</section>

<section class="destination-grid full-destination-grid">
<?php if (count($filteredDestinations) > 0): ?>
  <?php foreach ($filteredDestinations as $destination): ?>
  <article class="destination-card" id="<?= htmlspecialchars($destination['id']) ?>">
    <img src="<?= htmlspecialchars($destination['image']) ?>" alt="<?= htmlspecialchars($destination['alt']) ?>" loading="lazy">
    <span class="card-shade"></span>
    <span class="destination-text">
      <small><?= htmlspecialchars($destination['region']) ?></small>
      <strong><?= htmlspecialchars($destination['name']) ?></strong>
      <span><?= htmlspecialchars($destination['description']) ?></span>
      <a class="card-link" href="contact.php?destinasi=<?= rawurlencode($destination['name']) ?>">Tanyakan perjalanan ↗</a>
    </span>
  </article>
  <?php endforeach; ?>
<?php else: ?>
  <div class="notice-panel"><div><strong>Destinasi belum ditemukan.</strong><p>Coba kata kunci lain, atau hubungi tim Rihlah untuk menanyakan wilayah yang kamu inginkan.</p><a class="text-link" href="contact.php">Hubungi Rihlah →</a></div></div>
<?php endif; ?>
</section>
<section class="region-list-section section-block">
  <span class="eyebrow">DESTINATION GUIDE</span>
  <h2>Inspirasi Destinasi per Wilayah</h2>
  <p class="section-description">Daftar berikut membantu memilih arah perjalanan. Destinasi di luar Jawa Timur merupakan inspirasi umum, bukan konfirmasi itinerary atau ketersediaan paket Rihlah.</p>
  <div class="region-list-grid">
    <article class="region-list-card">
      <h3>Jawa Timur</h3>
      <ul><li>Kawah Ijen</li><li>Taman Nasional Baluran</li><li>Tumpak Sewu</li><li>Pulau Merah</li><li>Pulau Tabuhan</li><li>Gunung Bromo</li></ul>
      <a href="https://sites.google.com/view/trip-jawa-timur/halaman-muka" target="_blank" rel="noopener noreferrer">Lihat informasi trip ↗</a>
    </article>
    <article class="region-list-card">
      <h3>Jawa Tengah</h3>
      <ul><li>Dataran Tinggi Dieng</li><li>Candi Borobudur</li><li>Candi Prambanan</li><li>Kota Lama Semarang</li></ul>
      <a href="https://sites.google.com/view/trip-jawa-tengah/halaman-muka" target="_blank" rel="noopener noreferrer">Lihat informasi trip ↗</a>
    </article>
    <article class="region-list-card">
      <h3>Bali</h3>
      <ul><li>Ubud</li><li>Tanah Lot</li><li>Bedugul</li><li>Uluwatu</li></ul>
      <a href="https://sites.google.com/view/tripbali/halaman-muka" target="_blank" rel="noopener noreferrer">Lihat informasi trip ↗</a>
    </article>
    <article class="region-list-card">
      <h3>Lombok</h3>
      <ul><li>Pantai Senggigi</li><li>Kepulauan Gili</li><li>Gunung Rinjani</li><li>Kawasan Mandalika</li></ul>
      <a href="https://sites.google.com/view/trip-lombok/halaman-muka" target="_blank" rel="noopener noreferrer">Lihat informasi trip ↗</a>
    </article>
    <article class="region-list-card">
      <h3>Labuan Bajo &amp; Komodo</h3>
      <ul><li>Pulau Padar</li><li>Pulau Komodo</li><li>Pink Beach</li><li>Pulau Kelor</li><li>Pulau Kanawa</li></ul>
      <a href="https://sites.google.com/view/trip-labuan-bajoo/halaman-muka" target="_blank" rel="noopener noreferrer">Lihat informasi trip ↗</a>
    </article>
    <article class="region-list-card">
      <h3>Aceh</h3>
      <ul><li>Banda Aceh</li><li>Sabang</li><li>Pulau Weh</li><li>Masjid Raya Baiturrahman</li></ul>
      <a href="https://sites.google.com/view/trip-aceh/halaman-muka" target="_blank" rel="noopener noreferrer">Lihat informasi trip ↗</a>
    </article>
  </div>
  <p class="table-note">Untuk wilayah selain Jawa Timur, daftar ini adalah inspirasi destinasi umum. Hubungi Rihlah untuk memastikan tujuan, paket, harga, jadwal, dan fasilitas yang benar-benar tersedia.</p>
</section>
<div class="destination-note"><strong>Ingin tahu destinasi lain atau paket yang tersedia?</strong><p>Daftar di atas mengikuti wilayah yang disebutkan pada kanal Lynk Rihlah. Tanyakan kepada tim untuk mendapatkan informasi terbaru mengenai destinasi, jadwal, dan layanan.</p><a class="text-link" href="contact.php">Tanya langsung ke Rihlah →</a></div>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>
