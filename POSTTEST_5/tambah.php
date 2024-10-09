<?php
require 'koneksi.php';

if(isset($_POST["submit"])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $agama = $_POST['agama'];
    $pekerjaan = $_POST['pekerjaan'];

    $query = "INSERT INTO data_pendaftar (nim , nama , agama , pekerjaan)  VALUES ('$nim', '$nama', '$agama', '$pekerjaan')";
    $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "
                <script>
                    alert('Berhasil menambah data mahasiswa!');
                   
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Gagal menambah data mahasiswa!');
                
                </script>
            ";
        }
}
$query = "SELECT * FROM data_pendaftar";

$apa = mysqli_query($koneksi, $query);

$daftar = [];
while($row = mysqli_fetch_assoc($apa)) {
  $daftar[] = $row;
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
            <h3>Form Tambah Penerima Beasiswa</h3>
            <form action="tambah.php" method="POST">
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
           
                <input type="submit" value="Tambah Penerima" name="submit" class="button" >
            </form>
            <br>
            <a href="index.php" class="back-btn">Kembali</a>
        </div>
    </body>

<div class="table-container">
            <h3>Tabel Daftar Buku</h3>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>nim</th>
                        <th>nama pendaftar</th>
                        <th>agama</th>
                        <th>pekerjaan</th>
                        <th>tindakan</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; foreach($daftar as $data) : ?>
                    <tr>
                        <td><?php echo $i; ?> </td>
                        <td><?php echo $data ['nim'];?></td>
                        <td><?php echo $data ['nama'];?></td>
                        <td><?php echo $data ['agama'];?></td>
                        <td><?php echo $data ['pekerjaan'];?></td>
                        
                        <td class="action-buttons">
                        <button class="edit-btn"><a href="update.php?id=<?php echo $data['id'] ?>">edit</a></button>
                            <button class="delete-btn"><a href="delete.php?id=<?php echo $data['id'] ?>" onclick="return confirm('Yakin untuk menghapus data ini?')">delete</a></button>
                        </td>
                    </tr>
                    <?php $i++; endforeach ?>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
