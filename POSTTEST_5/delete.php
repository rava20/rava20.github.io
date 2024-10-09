<?php 
    require 'koneksi.php';

    $id = $_GET['id'];
    

        $query = "DELETE FROM data_pendaftar WHERE id =$id";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "
                <script>
                    alert('Berhasil menghapus data mahasiswa!');
                    document.location.href = 'tambah.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Gagal menghapus data mahasiswa!');
                   document.location.href = 'tambah.php';
                </script>
            ";
        }
?>