<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Beasiswa</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <?php include("navbar.php"); ?>
    <main class="main-content">
        <section class="section">
            <h2>Form Pendaftaran Beasiswa</h2>
            <form action="submit.php" method="POST">
                <label for="name">Nama Lengkap:</label>
                <input type="text" id="name" name="name" required><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="scholarship">Jenis Beasiswa:</label>
                <select id="scholarship" name="scholarship" required>
                    <option value="Akademik">Akademik</option>
                    <option value="Olahraga">Olahraga</option>
                    <option value="Kesenian">Kesenian</option>
                </select><br><br>

                <label for="message">Alasan Mengajukan Beasiswa:</label><br>
                <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>

                <input type="submit" value="Kirim">
            </form>
        </section>
    </main>
    <footer class="footer">
        <p>&copy;2024 Rava Mahdi</p>
    </footer>
    <script src="scripts/script.js"></script>
</body>
</html>
