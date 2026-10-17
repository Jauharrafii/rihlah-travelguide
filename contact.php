<?php
$pageTitle = 'Hubungi Kami | Rihlah Travel Guide';
$currentPage = 'contact';
$errors = [];
$submitted = false;
$name = '';
$email = '';
$destination = '';
$service = '';
$date = '';
$message = '';
$whatsappUrl = '';

$destinationOptions = ['Jawa Timur', 'Jawa Tengah', 'Bali', 'Lombok', 'Labuan Bajo dan Komodo', 'Aceh', 'Destinasi lainnya'];
$serviceOptions = ['Paket Wisata', 'Tour Planning', 'Tour Organizing', 'Belum yakin / konsultasi dulu'];

// Week 6: POST handles the inquiry on the server and displays a summary.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim(is_string($_POST['nama'] ?? null) ? $_POST['nama'] : '');
    $email = trim(is_string($_POST['email'] ?? null) ? $_POST['email'] : '');
    $destination = trim(is_string($_POST['destinasi'] ?? null) ? $_POST['destinasi'] : '');
    $service = trim(is_string($_POST['layanan'] ?? null) ? $_POST['layanan'] : '');
    $date = trim(is_string($_POST['tanggal'] ?? null) ? $_POST['tanggal'] : '');
    $message = trim(is_string($_POST['pesan'] ?? null) ? $_POST['pesan'] : '');

    if ($name === '' || strlen($name) > 80) $errors[] = 'Nama wajib diisi dan maksimal 80 karakter.';
    if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Format email belum valid.';
    if (!in_array($destination, $destinationOptions, true)) $errors[] = 'Silakan pilih destinasi dari daftar.';
    if (!in_array($service, $serviceOptions, true)) $errors[] = 'Silakan pilih jenis layanan dari daftar.';
    if (strlen($date) > 100) $errors[] = 'Perkiraan tanggal maksimal 100 karakter.';
    if (strlen($message) > 1000) $errors[] = 'Pesan maksimal 1.000 karakter.';

    if (count($errors) === 0) {
        $submitted = true;
        $whatsappMessage = "Halo Rihlah Travel Guide, saya ingin bertanya tentang perjalanan.%0A"
            . "Nama: " . rawurlencode($name) . "%0A"
            . "Email: " . rawurlencode($email !== '' ? $email : 'Tidak dicantumkan') . "%0A"
            . "Destinasi: " . rawurlencode($destination) . "%0A"
            . "Layanan: " . rawurlencode($service) . "%0A"
            . "Perkiraan tanggal: " . rawurlencode($date !== '' ? $date : 'Belum ditentukan') . "%0A"
            . "Pesan: " . rawurlencode($message !== '' ? $message : 'Mohon informasi lebih lanjut.');
        $whatsappUrl = 'https://wa.me/6282216682134?text=' . $whatsappMessage;
    }
}
include __DIR__ . '/includes/header.php';
?>
<main>
<section class="inner-hero"><span class="eyebrow">LET'S TALK TRAVEL</span><h1>Punya rencana perjalanan? <em>Ngobrol dulu, yuk.</em></h1><p>Isi detail berikut. PHP akan memeriksa input dan menampilkan ringkasan pertanyaanmu sebelum kamu melanjutkan ke WhatsApp Rihlah.</p></section>

<section class="contact-layout">
  <div class="contact-form-wrap">
    <?php if ($submitted): ?>
      <section class="form-result" aria-live="polite">
        <span class="eyebrow">INQUIRY SUMMARY</span>
        <h2>Ringkasan Pertanyaan</h2>
        <p>Data berhasil diproses oleh PHP. Belum ada pesan yang dikirim sampai kamu melanjutkan di WhatsApp.</p>
        <table class="summary-table">
          <tbody>
            <tr><th>Nama</th><td><?= htmlspecialchars($name) ?></td></tr>
            <tr><th>Email</th><td><?= htmlspecialchars($email !== '' ? $email : 'Tidak dicantumkan') ?></td></tr>
            <tr><th>Destinasi</th><td><?= htmlspecialchars($destination) ?></td></tr>
            <tr><th>Layanan</th><td><?= htmlspecialchars($service) ?></td></tr>
            <tr><th>Perkiraan tanggal</th><td><?= htmlspecialchars($date !== '' ? $date : 'Belum ditentukan') ?></td></tr>
            <tr><th>Pesan</th><td><?= nl2br(htmlspecialchars($message !== '' ? $message : 'Mohon informasi lebih lanjut.')) ?></td></tr>
          </tbody>
        </table>
        <a class="button button-primary" href="<?= htmlspecialchars($whatsappUrl) ?>" target="_blank" rel="noopener noreferrer">Lanjutkan ke WhatsApp ↗</a>
        <p><a class="text-link" href="contact.php">Buat pertanyaan baru</a></p>
      </section>
    <?php else: ?>
      <?php if (count($errors) > 0): ?>
        <div class="form-errors" role="alert"><strong>Periksa kembali isianmu:</strong><ul><?php foreach ($errors as $error): ?><li><?= htmlspecialchars($error) ?></li><?php endforeach; ?></ul></div>
      <?php endif; ?>
      <form id="inquiry-form" class="inquiry-form" method="POST" action="contact.php">
        <label for="nama">Nama <span aria-hidden="true">*</span></label>
        <input id="nama" name="nama" type="text" value="<?= htmlspecialchars($name) ?>" placeholder="Nama kamu" required maxlength="80">

        <label for="email">Email (opsional)</label>
        <input id="email" name="email" type="email" value="<?= htmlspecialchars($email) ?>" placeholder="nama@email.com" maxlength="150">

        <label for="destinasi">Destinasi yang diminati <span aria-hidden="true">*</span></label>
        <select id="destinasi" name="destinasi" required>
          <option value="">Pilih destinasi</option>
          <?php foreach ($destinationOptions as $option): ?>
            <option value="<?= htmlspecialchars($option) ?>" <?= $destination === $option ? 'selected' : '' ?>><?= htmlspecialchars($option) ?></option>
          <?php endforeach; ?>
        </select>

        <label for="layanan">Layanan yang ingin ditanyakan <span aria-hidden="true">*</span></label>
        <select id="layanan" name="layanan" required>
          <option value="">Pilih layanan</option>
          <?php foreach ($serviceOptions as $option): ?>
            <option value="<?= htmlspecialchars($option) ?>" <?= $service === $option ? 'selected' : '' ?>><?= htmlspecialchars($option) ?></option>
          <?php endforeach; ?>
        </select>

        <label for="tanggal">Perkiraan tanggal (opsional)</label>
        <input id="tanggal" name="tanggal" type="text" value="<?= htmlspecialchars($date) ?>" placeholder="Contoh: akhir Desember" maxlength="100">

        <label for="pesan">Ceritakan kebutuhanmu (opsional)</label>
        <textarea id="pesan" name="pesan" rows="4" placeholder="Jumlah peserta, durasi, atau pertanyaan lainnya…" maxlength="1000"><?= htmlspecialchars($message) ?></textarea>

        <button class="button button-primary form-submit" type="submit">Proses Pertanyaan <span aria-hidden="true">↗</span></button>
        <p class="form-note">Form ini tidak menyimpan data ke database. PHP memproses dan menampilkan ringkasan di halaman ini.</p>
      </form>
    <?php endif; ?>
  </div>

  <aside class="contact-aside"><span class="eyebrow">CONNECT WITH US</span><h2>Temukan kanal Rihlah.</h2><p>Untuk informasi ketersediaan paket, harga, itinerary, dan ketentuan, tanyakan langsung kepada tim.</p>
    <a class="contact-link whatsapp" href="https://wa.me/6282216682134" target="_blank" rel="noopener noreferrer"><span class="contact-icon">✆</span><span><small>WHATSAPP</small><strong>Chat admin Rihlah</strong></span><span class="arrow">↗</span></a>
    <a class="contact-link" href="https://www.instagram.com/rihlah_travelguide/" target="_blank" rel="noopener noreferrer"><span class="contact-icon">◎</span><span><small>INSTAGRAM</small><strong>@rihlah_travelguide</strong></span><span class="arrow">↗</span></a>
    <a class="contact-link" href="https://www.tiktok.com/@rihlahtravelguide" target="_blank" rel="noopener noreferrer"><span class="contact-icon">♪</span><span><small>TIKTOK</small><strong>@rihlahtravelguide</strong></span><span class="arrow">↗</span></a>
    <a class="contact-link" href="https://lynk.id/rihlah_travelguide" target="_blank" rel="noopener noreferrer"><span class="contact-icon">↗</span><span><small>LINK & INFO</small><strong>Lynk Rihlah Travel Guide</strong></span><span class="arrow">↗</span></a>
  </aside>
</section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>
