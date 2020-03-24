<?php
// session_start();
 if(!isset($_SESSION["login"])){
     header("Location: login.php");
    exit;
}
// require 'functions.php';
// cek tombol submit
if (isset($_POST['submit'])){
    if(tambah($_POST)>0){
        echo "
        <script>
        alert('data berhasil ditambahkan');
        document.location.href = 'index.php';
        </script>
        ";
    }else{
        echo "        <script>
        alert('data gagal ditambahkan');
        document.location.href = 'index.php';
        </script>";
    }




}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data</title>
</head>
<body>
<h3>Tambah Data peserta</h3>
<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="name">Name :</label>
        <input type="text" name="name" class="form-control" id="name" required>
    </div>
    <div class="form-group">
        <label for="category">Category :</label>
        <input type="text" name="category" class="form-control" id="category" required>
    </div>
    <div class="form-group">
        <label for="gender">Gender :</label>
        <input type="text" name="gender" class="form-control" id="gender" required>
    </div>
    <div class="form-group">
        <label for="status">Status :</label>
        <input type="text" name="status" class="form-control" id="status" required>
    </div>
    <div class="form-group">
        <label for="photo">Photo :</label>
        <input type="file" name="photo" class="form-control-file" id="photo">
    </div>
    <div class="form-group"><button type="submit" class="btn btn-primary" name="submit">Simpan</button></div>

</form>
</body>
</html>
