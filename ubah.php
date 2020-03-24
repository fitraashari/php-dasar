<?php
// session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
// require 'functions.php';
//ambil data ulr
$id = $_GET["id"];
//var_dump($id);
//query data mahasiswa berdasarkan id
$prt = query("SELECT * FROM peserta WHERE id = $id")[0];
//var_dump($prt);

// cek tombol submit
if (isset($_POST['submit'])){

    if(ubah($_POST)>0){
        echo "
        <script>
        alert('data berhasil diubah');
        document.location.href = 'index.php';
        </script>
        ";
    }else{
        echo "        <script>
        alert('data gagal diubah');
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
    <title>Ubah Data</title>
</head>
<body>
<h3>Ubah Data peserta</h3>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $prt["id"];?>" >
    <input type="hidden" name="photolm" value="<?= $prt["photo"]; ?>">
    
    <div class="form-group">
        <label for="name">Name :</label>
        <input type="text" name="name" class="form-control" id="name" required value="<?= $prt["name"]; ?>">
    </div>
    <div class="form-group">
        <label for="category">Category :</label>
        <input type="text" name="category" class="form-control" id="category" required value="<?= $prt["category"]; ?>">
    </div>
    <div class="form-group">
        <label for="gender">Gender :</label>
        <input type="text" name="gender"  class="form-control"id="gender" required value="<?= $prt["gender"]; ?>">
    </div>
    <div class="form-group">
        <label for="status">Status :</label>
        <input type="text" name="status" class="form-control" id="status" required value="<?= $prt["status"]; ?>">
    </div>
    <div class="form-group">
        
        <label for="photo">Photo :</label>
        <img src="img/<?= $prt["photo"]; ?>" class="img-thumbnail" width="100">
        <input type="file" name="photo" class="form-control-file" id="photo" >
    </div>
    <div class="form-group"><button type="submit" class="btn btn-primary" name="submit">Ubah</button></div>
    

</form>
</body>
</html>
