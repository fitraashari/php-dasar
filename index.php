<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require 'functions.php';
$peserta = query("SELECT * FROM peserta ");

//tombol cari ditekan
if(isset($_POST["cari"])){
    $peserta = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Halaman Admin</title>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
        @media print{
            .logout, .form, .tambah, .aksi {
                display:none;
            }
        }
        </style>
</head>
<body>
    <div class="wrapper">

    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Phpdasar</h3>
        </div>
        <ul class="list-unstyled components">
            <p>Menu</p>
            <li class="active">
            <a href="index.php"><i class="fas fa-home"></i> Home</a>
        </li>
        <li >
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-database"></i> Dropdown 1</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li><a href="#">Item 1</a></li>
                <li><a href="#">Item 2</a></li>
            </ul>
        </li>

        <li >
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-database"></i> Dropdown 2</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li><a href="#">Item 1</a></li>
                <li><a href="#">Item 2</a></li>
            </ul>
        </li>
        </ul>
        <ul class="list-unstyled CTAs">
            <li><a href="logout.php" class="logout" ><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </nav>

    <div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Sidebar</span>
            </button>
            <div class="collapse navbar-collapse" id="nambarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="index.php?page=tambah" class="nav-link"><i class="fas fa fa-plus-square"></i> Tambah Data</a>
                    </li>
                    <li class="nav-item">
                        <a href="cetakpdf.php" target="_blank" class="nav-link"><i class="fas fa-file-pdf"></i> Cetak PDF</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col">
    <?php
        $page = (isset($_GET['page']))?$_GET['page']:'';
        switch ($page) {
            case 'tambah':
                include 'tambah.php';
                break;
            case 'ubah':
            include 'ubah.php';
            break;

            default:
                include 'home.php';
                break;
        }
    ?>
    
    </div>
    </div>
    </div>
    </div>
    </div>


</body>
</html>