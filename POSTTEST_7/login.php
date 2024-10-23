<?php
session_start();
require "koneksi.php";
if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  
  $query = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($koneksi, $query);
  
  if (mysqli_num_rows($result) === 1) {
    
    $user = mysqli_fetch_assoc($result);
    
    if (password_verify($password, $user['password'])) {
      
      $_SESSION['login'] = true; 
      if ($user['role'] === 'Admin') {
        $_SESSION['role'] = 'admin'; 
        echo "
        <script>
        alert('Login berhasil! Selamat datang Admin.');
        document.location.href = 'tambah.php';
        </script>
        ";
      } else {
        $_SESSION['role'] = 'user'; 
        echo "
        <script>
        alert('Login berhasil! Selamat datang User.');
        document.location.href = 'index.php';
        </script>
        ";
      }
    } else {
      echo "
      <script>
      alert('Password salah!');
      </script>
      ";
    }
  } else {
    echo "
    <script>
    alert('Username tidak ditemukan!');
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
    <title>Login</title>
    <link rel="stylesheet" href="style/akun.css?v=<?php echo time(); ?>">
</head>
<body>
      
    <div class="login-container">
        <h2>Login</h2>
        <form action="" class="login-form-container" method="post">
      <div class="login-form-group">
        <label for="username" class="login-form-title">Username</label>
        <input type="text" placeholder="Username" name="username" id="username" class="login-form-input" required>
      </div>

      <div class="login-form-group">
        <label for="password" class="login-form-title">Password</label>
        <input type="password" placeholder="Password" name="password" id="password" class="login-form-input" required>
      </div>

      <p>Belum Punya Akun? <a href="registrasi.php" styles="color: blue">klik disini!</a></p>
      <button type="submit" name="submit" class="login-button">
        LOGIN
      </button>
    </form>
    <br>
            <a href="index.php" class="back-btn">Kembali</a>
    </div>
    <script src="scripts/script.js"></script>
</body>
</html>

