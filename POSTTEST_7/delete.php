<?php 
    require 'koneksi.php';

    $id = $_GET['id'];
    
    $ambil_data = mysqli_query($koneksi, "SELECT * FROM data_pendaftar WHERE id = $id");

    while ($row = mysqli_fetch_assoc($ambil_data)) {
        $data_pendaftar[] = $row;
    }
    
    $data_pendaftar = $data_pendaftar[0];
        $query = "DELETE FROM data_pendaftar WHERE id =$id";
        $result = mysqli_query($koneksi, $query);
        unlink('gambar/'.$data_pendaftar['foto']);

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