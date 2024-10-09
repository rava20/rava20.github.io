<?php
$host = "localhost";
$user = "root";
$password = "";
$DB = "beasiswa";

$koneksi = mysqli_connect($host, $user, $password, $DB);
if(!$koneksi){
    die("Koneksi gagal: ".mysqli_connect_error());
}else {
    echo "";
}

?>
