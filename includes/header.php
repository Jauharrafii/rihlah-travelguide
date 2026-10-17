<?php
// Page title and active menu are set by each page before this file is included.
$pageTitle = isset($pageTitle) ? $pageTitle : 'Rihlah Travel Guide';
$currentPage = isset($currentPage) ? $currentPage : '';

// Week 7: a simple page-view counter stored in counter.txt.
$counterFile = __DIR__ . '/../counter.txt';
$pageViews = 0;
if (file_exists($counterFile)) {
    $pageViews = (int) file_get_contents($counterFile);
}
$pageViews++;
file_put_contents($counterFile, $pageViews);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Rihlah Travel Guide — paket wisata, tour planning, dan tour organizing di berbagai destinasi Indonesia.">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="site-header">
    <div class="nav-wrap">
        <a class="brand" href="index.php" aria-label="Rihlah Travel Guide - Beranda">
            <span class="brand-name">RIHLAH-ANJAY <small>TRAVEL GUIDE</small></span>
        </a>
        <nav class="nav-links" aria-label="Navigasi utama">
            <a class="<?php echo $currentPage === 'home' ? 'active' : ''; ?>" href="index.php">Beranda</a>
            <a class="<?php echo $currentPage === 'packages' ? 'active' : ''; ?>" href="packages.php">Layanan</a>
            <a class="<?php echo $currentPage === 'destinations' ? 'active' : ''; ?>" href="destinations.php">Destinasi</a>
            <a class="<?php echo $currentPage === 'about' ? 'active' : ''; ?>" href="about.php">Tentang</a>
            <a class="nav-cta <?php echo $currentPage === 'contact' ? 'active' : ''; ?>" href="contact.php">Hubungi Kami <span aria-hidden="true">↗</span></a>
        </nav>
    </div>
</header>
