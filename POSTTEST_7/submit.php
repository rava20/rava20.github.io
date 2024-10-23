<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nim'])) {
        $nim = htmlspecialchars(trim($_POST['nim']));
    } else {
       
        echo "NIM tidak ditemukan.";
    }

    $nim = htmlspecialchars(trim($_POST['nim']));
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
                <p><strong>NIM:</strong> <?php echo $nim; ?></p> 
                <p><strong>Nama Lengkap:</strong> <?php echo $nama; ?></p>
                <p><strong>Tempat Lahir:</strong> <?php echo $tempat_lahir; ?></p>
                <p><strong>Tanggal Lahir:</strong> <?php echo $tanggal_lahir; ?></p>
                <p><strong>Pekerjaan:</strong> <?php echo $pekerjaan; ?></p>
                <p><strong>Agama:</strong> <?php echo ucfirst($agama); ?></p>
            </div>
            <div class="button-group">
                <a href="koneksi.php" class="back-btn">Kembali ke Form</a>
            </div>
             <a href="updateAkun.php?nim=<?php echo $nim; ?>" class="update-btn">Update Akun</a>
            <form action="hapusAkun.php" method="POST" style="display:inline;">
                <input type="hidden" name="nim" value="<?php echo $nim; ?>">
                <button type="submit" class="delete-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">Hapus Akun</button>
            </form>
        </div>
        </div>
    </body>
    </html>
    <?php
} else {
   
    header("Location: tambah.php");
    exit();
}
?>
