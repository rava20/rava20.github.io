<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nama = htmlspecialchars(trim($_POST['nama']));
    $tempat_lahir = htmlspecialchars(trim($_POST['tempat-lahir']));
    $tanggal_lahir = htmlspecialchars(trim($_POST['tanggal-lahir']));
    $pekerjaan = htmlspecialchars(trim($_POST['pekerjaan']));
    $agama = htmlspecialchars(trim($_POST['agama']));
    
    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hasil Input Data Pribadi</title>
        <link rel="stylesheet" href="style/buat.css">
    </head>
    <body>
        <div class="result-container">
            <h2>Hasil Input Data Pribadi</h2>
            <div class="result-section">
                <p><strong>Nama Lengkap:</strong> <?php echo $nama; ?></p>
                <p><strong>Tempat Lahir:</strong> <?php echo $tempat_lahir; ?></p>
                <p><strong>Tanggal Lahir:</strong> <?php echo $tanggal_lahir; ?></p>
                <p><strong>Pekerjaan:</strong> <?php echo $pekerjaan; ?></p>
                <p><strong>Agama:</strong> <?php echo ucfirst($agama); ?></p>
            </div>
            <div class="button-group">
                <a href="buatAkun.html" class="back-btn">Kembali ke Form</a>
            </div>
        </div>
    </body>
    </html>
    <?php
} else {
   
    header("Location: buat_akun.php");
    exit();
}
?>
