<?php
session_start();
require 'functions.php';
// //cek cookie
// if(isset($_COOKIE['login'])){
//   if ($_COOKIE['login'] == 'true'){
//     $_SESSION["login"] = true;

//   }
// }
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //ambil username bersarakan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    //cek cookie dari username
    if ($key === hash('sha256', $row['username'])){
        $_SESSION['login'] = true;
    }
}
if(isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $res = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    //cek username
    if(mysqli_num_rows($res)===1){
        // cek pass
        $row = mysqli_fetch_assoc($res);
        if(password_verify($password, $row["password"])){
          //set session
            $_SESSION["login"] = true;

            //cek remember
            if(isset($_POST["remember"])){
              
              setcookie('id',$row['id'],time()+60);

              setcookie('key', hash('sha256',$row['username']),time()+60);
            }
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}

?>
<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Halaman Login</title>
    
    <style>
        html, body {height: 100%}
    .auto{
        margin-top:auto;
        margin-bottom: auto;
    }
    </style>
  </head>
  <body class="bg-dark">
    <div class="container h-100 ">
        <div class="row h-100 justify-content-center ">
        <div class="col-sm-4 auto border border-primary  bg-light rounded"><h1 class="text-center">Login</h1>
        <?php if(isset($error)): ?>
        <!-- <div class="alert alert-danger" role="alert">
  Username /  Password Salah
</div> -->
<script>
alert('Username/Password Salah');
    </script>
<?php endif;?>
        <form action="" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password"  name="password" class="form-control" id="password" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" name="remember" id="remember">
    <label class="form-check-label" for="remember">Remember Me</label>
  </div>
  <button type="submit" name="login" class="btn btn-primary">Login</button>
</form><br>
    </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>