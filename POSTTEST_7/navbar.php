<?php
    if (session_status() == PHP_SESSION_NONE) {    
        session_start();   
    }
?>

<nav class="navbar">
    <div class="navbar-logo">
        MyBlog <br> <span>SiPalingBelajar</span>
    </div>
    <div class="navbar-links" id="navbar-links">
        <a href="index.php">BERANDA</a>
        <a href="dalam_negeri.php">BEASISWA DALAM NEGERI</a>
        <a href="luar_negeri.php">BEASISWA LUAR NEGERI</a>
        <a href="tanpa_ipk.php">BEASISWA TANPA IPK</a>
        <a href="ttg_saya.php">TENTANG SAYA</a>
        <a href="tambah.php">LIHAT DATA</a>
    </div>

    <div class="navbar-auth">
        <?php if (isset($_SESSION['login'])): ?>
            <a href="keluar.php" class="button">Logout</a>
        <?php else: ?>
            <a href="login.php" class="button">Login</a>
        <?php endif; ?>
    </div>

    <button id="toggleButton" class="mode-button">Ubah Mode</button>
    <div class="hamburger" id="hamburger">
        &#9776;
    </div>
</nav>
