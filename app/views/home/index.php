<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SMART MBG</title>
    <!-- Google Fonts: Oufit & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
</head>
<body>

    <div class="blob-shape blob-1"></div>
    <div class="blob-shape blob-2"></div>

    <main class="glass-container">
        <header>
            <div class="logo">
                <h1>SMART <span>MBG</span></h1>
            </div>
            <nav>
                <a href="<?= BASEURL; ?>" class="active">Beranda</a>
                <a href="<?= BASEURL; ?>/siswa">Data Siswa</a>
                <a href="<?= BASEURL; ?>/stok">Stok Bahan</a>
                <a href="<?= BASEURL; ?>/auth" class="btn-login">Login</a>
            </nav>
        </header>

        <section class="hero-section">
            <div class="hero-content">
                <h2>Program Makan Bergizi Gratis</h2>
                <p>Kelola kebutuhan gizi, stok bahan makanan, distribusi, hingga catatan khusus alergi siswa dengan efisien, akurat, dan transparan.</p>
                <div class="cta-group">
                    <button onclick="window.location.href='<?= BASEURL; ?>/dashboard'" class="btn-primary">Dashboard Admin</button>
                    <button onclick="window.location.href='<?= BASEURL; ?>/distribusi'" class="btn-secondary">Lihat Data Hari Ini</button>
                </div>
            </div>
            <div class="hero-visual">
                <!-- Placeholder for future graphic, styled via CSS -->
                <div class="stats-card glass-panel">
                    <h3>20,500+</h3>
                    <p>Kalori Didistribusikan</p>
                </div>
                <div class="stats-card glass-panel offset">
                    <h3>99%</h3>
                    <p>Siswa Aman Alergi</p>
                </div>
            </div>
        </section>

    </main>

</body>
</html>
