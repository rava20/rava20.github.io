<?php
require 'koneksi.php';

$id = $_GET['id'];

if(isset($_POST['submit'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $agama = $_POST['agama'];
    $pekerjaan = $_POST['pekerjaan'];

    $query = "UPDATE data_pendaftar set nim = '$nim', nama = '$nama', agama = '$agama', pekerjaan = '$pekerjaan' WHERE id = $id";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "
                <script>
                    alert('Berhasil menambah data mahasiswa!');
                    document.location.href = 'tambah.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Gagal menambah data mahasiswa!');
                    document.location.href = 'tambah.php';
                </script>
            ";
        }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi CRUD Perpustakaan</title>
    <link rel="stylesheet" href="style/buat.css">
</head>

<body>
    <style>
        
body {
    font-family: Arial, sans-serif;
    background-color: #e9f1f7;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
}

h2 {
    text-align: center;
}

.form-container, .table-container {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}


.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"], input[type="number"], select {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    border-radius: 4px;
    border: 1px solid #ccc;
}

.button {
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.button:hover {
    background-color: #2980b9;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: center;
}

th {
    background-color: #3498db;
    color: white;
}

.action-buttons .edit-btn {
    background-color: #2ecc71;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-radius: 4px;
}

.action-buttons .delete-btn {
    background-color: #e74c3c;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-radius: 4px;
}

.action-buttons button:hover {
    opacity: 0.9;
}
    </style>

<div class="container">
        <h2>DAFTAR NAMA PENERIMA BEASISWA</h2>

        <div class="form-container">
            <h3>Form Ubah Penerima Beasiswa</h3>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="nim">NIM:</label>
                    <input type="text" id="nim" name="nim" required>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Lengkap:</label>
                    <input type="text" id="nama" name="nama" required>
                </div>

                <div class="form-group">
                    <label for="agama">Agama:</label>
                    <select id="agama" name="agama" required>
                        <option value="islam">Islam</option>
                        <option value="Protestan">Kristen</option>
                        <option value="hindu">Hindu</option>
                        <option value="budha">Budha</option>
                        <option value="konghucu">Konghucu</option>
                        <option value="katolik">Konghucu</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan:</label>
                    <input type="text" id="pekerjaan" name="pekerjaan" required>
                </div>
           
                <input type="submit" value="update" name="submit" class="button" >
            </form>
            <br>
            <a href="index.php" class="back-btn">Kembali</a>
        </div>
    

    </div>
</body>
</html>
