<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($data['judul']) ? $data['judul'] : 'Dashboard'; ?> - SMART MBG</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* RBAC: Petugas Stok Read-Only Access CSS Hack */
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'petugas_stok') : ?>
            .btn-sm-edit, .btn-sm-delete { display: none !important; }
            .akses-stok .btn-sm-edit, .akses-stok .btn-sm-delete { display: inline-block !important; }
        <?php endif; ?>
        /* Override body styles for full dashboard layout */
        body {
            display: flex;
            justify-content: flex-start;
            align-items: stretch;
            height: 100vh;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }
        
        .blob-1 { top: -200px; left: -200px; width: 600px; height: 600px; }
        .blob-2 { bottom: -200px; right: -200px; width: 600px; height: 600px; }

        /* Sidebar Customization */
        .sidebar {
            width: 280px;
            background: rgba(12, 35, 64, 0.95); /* Deep dark blue (#0c2340) */
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-right: 1px solid var(--glass-border);
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            z-index: 10;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            white-space: nowrap; /* mencegah text melipat ketika lebar mengecil */
        }

        .sidebar.collapsed {
            width: 0px;
            padding: 30px 0px;
            opacity: 0;
            border-right: none;
            overflow: hidden;
        }

        .sidebar .logo { display: flex; align-items: center; justify-content: center; gap: 12px; margin-bottom: 40px; }
        .sidebar .logo h1 { font-size: 1.6rem; margin-bottom: 0; text-align: left; color: #ffffff; line-height: 1.1; }
        .sidebar .logo img { width: 45px; height: 45px; object-fit: contain; }
        
        .nav-menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
            flex-grow: 1;
            overflow-y: auto;
        }

        /* Hide scrollbar for nav-menu */
        .nav-menu::-webkit-scrollbar { width: 4px; }
        .nav-menu::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.2); border-radius: 4px; }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            color: rgba(255, 255, 255, 0.75);
            text-decoration: none;
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            transform: translateX(0);
        }

        .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 3px;
            background: var(--accent-color);
            transform: scaleY(0);
            transition: transform 0.4s ease;
            transform-origin: center;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
            transform: translateX(8px);
        }

        .nav-link:hover::before {
            transform: scaleY(0.7);
        }

        .nav-link.active {
            background: rgba(56, 189, 248, 0.2);
            color: #ffffff;
            font-weight: 500;
        }

        .nav-link.active::before {
            transform: scaleY(1);
        }

        .nav-link.active:hover {
            transform: translateX(0px); /* Disable shift if already active */
        }

        .nav-label { 
            margin-bottom: 5px; 
            margin-top: 15px; 
            font-size: 0.75rem; 
            text-transform: uppercase; 
            letter-spacing: 1px; 
            color: rgba(255,255,255,0.5); 
            padding-left: 16px; 
        }

        .sidebar-footer {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid var(--glass-border);
        }

        .btn-logout {
            display: block;
            text-align: center;
            padding: 12px;
            background: #38bdf8; /* Sky blue */
            color: #ffffff; /* White */
            border: 1px solid #7dd3fc;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(56, 189, 248, 0.2);
        }

        .btn-logout:hover {
            background: #0284c7; /* Darker blue */
            color: #ffffff;
            box-shadow: 0 6px 8px rgba(2, 132, 199, 0.3);
            border-color: #0284c7;
        }

        /* Main Content */
        .main-content {
            flex-grow: 1;
            padding: 40px;
            overflow-y: auto;
            position: relative;
            z-index: 5;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            background: var(--glass-bg);
            padding: 15px 30px;
            border-radius: 16px;
            border: 1px solid var(--glass-border);
            backdrop-filter: blur(10px);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .avatar {
            width: 40px; height: 40px;
            background: var(--accent-color);
            border-radius: 50%;
            display: flex; justify-content: center; align-items: center;
            color: #0f1522; font-weight: bold; font-size: 1.2rem;
            box-shadow: 0 0 15px var(--accent-glow);
        }
        
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        /* Update styling for widgets */
        .glass-panel-widget {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 30px;
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease, border-color 0.3s ease;
        }
        .glass-panel-widget:hover {
            transform: translateY(-5px);
            border-color: rgba(255,255,255,0.15);
        }

        /* Table styles */
        .table-responsive { width: 100%; overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid rgba(0,0,0,0.05); }
        th { background: rgba(0,0,0,0.05); color: var(--text-secondary); font-weight: 500; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; }
        tr:hover { background: rgba(0,0,0,0.02); }
        .btn-sm { padding: 5px 10px; font-size: 0.8rem; border-radius: 6px; text-decoration: none; display: inline-block; margin-right: 5px; cursor: pointer; border: none; }
        .btn-sm-edit { background: rgba(56, 189, 248, 0.2); border: 1px solid rgba(56, 189, 248, 0.5); color: #000000; font-weight: 500; }
        .btn-sm-delete { background: rgba(239, 68, 68, 0.2); border: 1px solid rgba(239, 68, 68, 0.5); color: #000000; font-weight: 500; }

    </style>
</head>
<body>

    <div class="blob-shape blob-1"></div>
    <div class="blob-shape blob-2"></div>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
            <img src="<?= BASEURL; ?>/img/logo-mbg.png" alt="Logo MBG">
            <h1>SMART<br><span>MBG</span></h1>
        </div>
        <div class="nav-menu">
            <?php $activePage = isset($data['judul']) ? $data['judul'] : ''; ?>
            <a href="<?= BASEURL; ?>/dashboard" class="nav-link <?= strpos($activePage, 'Dashboard') !== false ? 'active' : ''; ?>">Dashboard</a>
            
            <div class="nav-label">Master Data</div>
            <a href="<?= BASEURL; ?>/users" class="nav-link <?= strpos($activePage, 'Users') !== false ? 'active' : ''; ?>">Data Users</a>
            <a href="<?= BASEURL; ?>/siswa_menu" class="nav-link <?= strpos($activePage, 'Menu Siswa') !== false ? 'active' : ''; ?>">Relasi Siswa & Menu</a>
            <a href="<?= BASEURL; ?>/siswa" class="nav-link <?= strpos($activePage, 'Siswa') !== false && strpos($activePage, 'Alergi') === false ? 'active' : ''; ?>">Data Siswa</a>
            <a href="<?= BASEURL; ?>/menu" class="nav-link <?= strpos($activePage, 'Menu') !== false && strpos($activePage, 'Alergen') === false ? 'active' : ''; ?>">Menu Makanan</a>
            <a href="<?= BASEURL; ?>/stok" class="nav-link <?= strpos($activePage, 'Stok') !== false ? 'active' : ''; ?>">Stok Bahan</a>
            
            <div class="nav-label">Manajemen Alergi</div>
            <a href="<?= BASEURL; ?>/alergi" class="nav-link <?= strpos($activePage, 'Master Alergi') !== false ? 'active' : ''; ?>">Master Alergi</a>
            <a href="<?= BASEURL; ?>/alergi_siswa" class="nav-link <?= strpos($activePage, 'Alergi Siswa') !== false ? 'active' : ''; ?>">Alergi Siswa</a>
            <a href="<?= BASEURL; ?>/menu_alergen" class="nav-link <?= strpos($activePage, 'Menu Alergen') !== false ? 'active' : ''; ?>">Menu Alergen</a>
            
            <div class="nav-label">Operasional</div>
            <a href="<?= BASEURL; ?>/distribusi" class="nav-link <?= strpos($activePage, 'Distribusi') !== false ? 'active' : ''; ?>">Distribusi</a>
            <a href="<?= BASEURL; ?>/validasi_alergi" class="nav-link <?= strpos($activePage, 'Validasi Alergi') !== false ? 'active' : ''; ?>">Validasi Alergi</a>
            <a href="<?= BASEURL; ?>/log" class="nav-link <?= strpos($activePage, 'Log') !== false ? 'active' : ''; ?>">Log Aktivitas</a>
        </div>
        <div class="sidebar-footer">
            <a href="<?= BASEURL; ?>/auth/logout" class="btn-logout">Logout</a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <header class="topbar">
            <div style="display:flex; align-items:center; gap: 20px;">
                <button id="sidebarToggle" style="background:none; border:none; color:var(--text-primary); font-size:1.8rem; cursor:pointer; transition:transform 0.4s;">☰</button>
                <div>
                    <h2 style="font-family: 'Outfit'; font-size: 1.5rem;"><?= isset($data['judul']) ? $data['judul'] : 'Dashboard'; ?></h2>
                    <span style="color: var(--text-secondary); font-size: 0.9rem;">Sistem Manajemen Program Makan Bergizi Gratis</span>
                </div>
            </div>
            <div class="user-profile">
                <div style="text-align: right;">
                    <strong style="display: block; color: var(--text-primary);"><?= isset($_SESSION['nama']) ? $_SESSION['nama'] : 'User'; ?></strong>
                    <span style="color: var(--text-secondary); font-size: 0.8rem; text-transform: capitalize;"><?= isset($_SESSION['role']) ? str_replace('_', ' ', $_SESSION['role']) : 'Admin'; ?></span>
                </div>
                <div class="avatar">
                    <?= isset($_SESSION['nama']) ? strtoupper(substr($_SESSION['nama'], 0, 1)) : 'U'; ?>
                </div>
            </div>
        </header>

        <!-- FLASH MESSAGE PLACEHOLDER IF NEEDED -->
