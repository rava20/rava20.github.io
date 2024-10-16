<?php
require 'koneksi.php';

if(isset($_POST["submit"])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $agama = $_POST['agama'];
    $pekerjaan = $_POST['pekerjaan'];
    $foto = $_FILES['gambar']['name'];
    $foto_tmp = $_FILES['gambar']['tmp_name'];
    $extensi = explode('.', $foto);
    $extensi = strtolower(end($extensi));
    $name_baru = date('Y-m-d H.m.s').'.'.$extensi;
    $support = ['jpg', 'jpeg', 'png'];
    $size = $_FILES['gambar']['size'];
    $max_size = 2 * 1024 * 1024;

    if(in_array($extensi, $support)){
        if($size <= $max_size){
            if(move_uploaded_file($foto_tmp, 'gambar/'.$name_baru)){
                $query = "INSERT INTO data_pendaftar (nim , nama , agama , pekerjaan,foto)  VALUES ('$nim', '$nama', '$agama', '$pekerjaan' , '$name_baru')";   
                $result = mysqli_query($koneksi, $query );

                if ($result ) {
                    unlink('gambar/'.$data_pendaftar['foto']); 
                    echo "
                        <script>
                            alert('Berhasil menambahkan data mahasiswa!');
                            location.href = 'tambah.php';
                        </script>
                    ";
                } else {
                    echo "
                        <script>
                            alert('Gagal menambahkan data mahasiswa!');
                        </script>
                    ";
                }
            }
        } else {
            echo "
                <script>
                    alert('Ukuran file terlalu besar. Maksimal 2MB.');
                </script>
            ";
        }
    } else {
        echo "
            <script>
                alert('Ekstensi file tidak diperbolehkan. Hanya JPG, JPEG, PNG yang diperbolehkan.');
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
            <form action="tambah.php" method="POST" enctype="multipart/form-data">
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
                        <option value="katolik">Katolik</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan:</label>
                    <input type="text" id="pekerjaan" name="pekerjaan" required>
                </div>
                <label for="foto">Masukkan foto peserta:</label>
                <input type="file" id="foto" name="gambar" required>
            <br> <br>
                <input type="submit" value="Tambah Penerima" name="submit" class="button" >
            </form>
            <br>
            <a href="login.html" class="back-btn">Kembali</a>
        </div>
    </body>

<div class="table-container">
            <h3>Tabel Daftar Buku</h3>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nim</th>
                        <th>nama pendaftar</th>
                        <th>agama</th>
                        <th>pekerjaan</th>
                        <th>Foto</th>
                        <th>tindakan</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; foreach($daftar as $data) : ?>
                    <?php $folder = "gambar/" . $data["foto"];?>
                    <tr>
                        <td><?php echo $i; ?> </td>
                        <td><?php echo $data ['nim'];?></td>
                        <td><?php echo $data ['nama'];?></td>
                        <td><?php echo $data ['agama'];?></td>
                        <td><?php echo $data ['pekerjaan'];?></td>
                        <td><?php echo "<img src='$folder' width='100px' height='100px'>"; ?>   </td>

                        
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
