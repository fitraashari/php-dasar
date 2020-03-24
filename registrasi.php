<?php
require 'functions.php';
if( isset($_POST["daftar"])){
    if( daftar($_POST)>0){
        echo "<script>alert('user baru berhasil terdaftar')</script>";
    }else{
        echo mysqli_error($conn);
    }
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

    <title>Halaman Registrasi</title>
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
        <div class="col-sm-6 auto border  bg-light rounded"><h1 class="text-center">Daftar</h1>
        <form action="" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password"  name="password" class="form-control" id="password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="password2">Konfirmasi Password</label>
    <input type="password"  name="password2" class="form-control" id="password2" placeholder="Konfirmasi Password">
  </div>
  <button type="submit" name="daftar" class="btn btn-success">Daftar</button>
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