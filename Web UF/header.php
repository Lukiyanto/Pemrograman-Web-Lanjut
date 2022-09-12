<?php
    session_start();
    include 'koneksi.php';
    date_default_timezone_set("Asia/Jakarta");

    $identitas  = mysqli_query($koneksi, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
    $d = mysqli_fetch_object($identitas);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="uploads/identitas/<?= $d->favicon ?>">
    <title>Website <?= $d->nama ?></title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- box menu mobile -->
    <div class="box-menu-mobile" id="mobileMenu">
        <span onclick="hideMobileMenu()">Close <i class="fa fa-minus-square-o" aria-hidden="true"></i></span>
        <ul>
            <?php if(isset($_SESSION['ulevel'])){ ?>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="tentang-universitas.php">Tentang Universitas</a></li>
            <li><a href="jurusan.php">Jurusan</a></li>
            <li><a href="galeri.php">Galeri</a></li>
            <li><a href="informasi.php">Informasi</a></li>
            <li><a href="kontak.php">Kontak</a></li>
            <li><a href="admin/index.php"> <?= $_SESSION['uname'] ?> (<?= $_SESSION['ulevel'] ?>)  <i class="fa fa-caret-down"></i></a></li>
            <li><a href="ubah-password.php">Ubah Password</a></li>
            <li><a href="admin/logout.php">Keluar</a></li>
            
            <?php }else{ ?>
                    
            <li><a href="index.php">Beranda</a></li>
            <li><a href="tentang-universitas.php">Tentang Universitas</a></li>
            <li><a href="jurusan.php">Jurusan</a></li>
            <li><a href="galeri.php">Galeri</a></li>
            <li><a href="informasi.php">Informasi</a></li>
            <li><a href="kontak.php">Kontak</a></li>
            <li><a href="login.php">Login</a></li>
            <?php } ?>
        </ul>

    </div>

    <!-- bagian header -->
    <div class="header">

        <div class="container">

            <div class="header-logo">
                <a href="index.php">
                    <img src="uploads/identitas/<?= $d->logo ?>" width="80">
                    <h2><?= $d->nama ?></h2>
                </a>

            </div>

            <ul class="header-menu">
                <?php if(isset($_SESSION['ulevel'])){ ?>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="tentang-universitas.php">Tentang Universitas</a></li>
                <li><a href="jurusan.php">Jurusan</a></li>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="informasi.php">Informasi</a></li>
                <li><a href="kontak.php">Kontak</a></li>
                <li><a href="admin/index.php"> <?= $_SESSION['uname'] ?> (<?= $_SESSION['ulevel'] ?>)  <i class="fa fa-caret-down"></i></a>
                    <!-- sub menu -->
                    <ul class="dropdown">
                        <li><a href="ubah-password.php">Ubah Password</a></li>
                        <li><a href="admin/logout.php">Keluar</a></li>
                    </ul>
                </li>
                <?php }else{ ?>
                    
                <li><a href="index.php">Beranda</a></li>
                <li><a href="tentang-universitas.php">Tentang Universitas</a></li>
                <li><a href="jurusan.php">Jurusan</a></li>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="informasi.php">Informasi</a></li>
                <li><a href="kontak.php">Kontak</a></li>
                <li><a href="login.php">Login</a></li>
                <?php } ?>
            </ul>

            <div class="mobile-menu-button">
                <a href="#" onclick="showMobileMenu()"><i class="fa fa-list" aria-hidden="true"></i>  Menu</a>
            </div>

        </div>

    </div>