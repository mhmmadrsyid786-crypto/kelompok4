<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?> - SMART MBG</title>
    <!-- Google Fonts: Oufit & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
    <style>
        .login-container {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 400px;
            padding: 40px;
            text-align: center;
        }

        .login-box h2 {
            font-family: 'Outfit', sans-serif;
            font-size: 2rem;
            margin-bottom: 30px;
            color: var(--text-primary);
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 0.9rem;
            color: var(--text-secondary);
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 16px;
            background: #ffffff; /* White background */
            border: 1px solid #7dd3fc; /* Light blue border */
            border-radius: 8px;
            color: var(--text-primary);
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #38bdf8;
            background: #ffffff;
            box-shadow: 0 0 8px rgba(56, 189, 248, 0.3);
        }

        .btn-login-submit {
            width: 100%;
            margin-top: 10px;
            background: #38bdf8; /* Sky blue */
            color: #ffffff;
            padding: 14px 20px;
            border: 1px solid #7dd3fc;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(56, 189, 248, 0.3);
        }

        .btn-login-submit:hover {
            background: #0284c7; /* Darker blue */
            color: #ffffff;
            border-color: #0284c7;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(2, 132, 199, 0.4);
        }

        .flash-msg {
            background: rgba(239, 68, 68, 0.2);
            border: 1px solid rgba(239, 68, 68, 0.5);
            color: #fca5a5;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <div class="blob-shape blob-1"></div>
    <div class="blob-shape blob-2"></div>

    <main class="glass-container" style="max-width: 500px; height: auto;">
        <div class="login-container">
            <div class="login-box">
                <div class="logo">
                    <h1>SMART <span>MBG</span></h1>
                </div>
                <h2>Login Sistem</h2>
                
                <?php if(isset($_SESSION['flash'])) : ?>
                    <div class="flash-msg">
                        <?= $_SESSION['flash']; ?>
                        <?php unset($_SESSION['flash']); ?>
                    </div>
                <?php endif; ?>

                <form action="<?= BASEURL; ?>/auth/login" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" required autocomplete="off" placeholder="Masukkan username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required placeholder="Masukkan password">
                    </div>
                    <button type="submit" class="btn-login-submit">Masuk</button>
                </form>
                
                <p style="margin-top:20px; color:var(--text-secondary); font-size:0.85rem;">
                    <a href="<?= BASEURL; ?>" style="color:var(--text-secondary); text-decoration:none;">&larr; Kembali ke Beranda</a>
                </p>
            </div>
        </div>
    </main>

</body>
</html>
