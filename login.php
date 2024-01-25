<?php
  $username = "";
  $password ="";
  $err = "";

  include("connect.php");
  if (isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username=='' or $password==''){
      $err .= "<li>Masukkan username & password</li>";
    }
    if(empty($err)){
      $sql1 = "SELECT * FROM user WHERE username='$username'";
      $q1 = mysqli_query($conn, $sql1);
      $r1 = mysqli_fetch_array($q1);
      if($r1['password'] !=md5($password)){
        $err .= "<li>Akun Tidak ditemukan</li>";
      }
    }
  if (empty($err)){
      $_SESSION['user_username'] = $username;
      header("Location: dasboard.php");
      exit();
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="logout">
 <a href="index.php"><button class="out" type="button">Back</button></a>
 </div>
 <br>

<div class="form">
  <div class="img">
    <img src="img/s2.png" alt="">
  </div>
 <div id="app-login">
  <h1 class="hl">Halaman Login</h1>
      <?php
        if ($err){
          echo "<h3>$err</h3>";
        }
      ?>
    <form action="" method="post">
      <input type="text" " name="username" class="input" placeholder="isikan username">
      <br><br>
      <input type="password" name="password" class="input" placeholder="isikan password">
      <br><br>
      <input type="submit" name="login" value="Login">

    </form>
  </div>
</div>

</body>
</html>