<?php
include_once('config.php');

$merek = $_GET['merek'];
$idnomor = $_GET['idnomor'];
$sql = "SELECT * FROM online";
$response = mysqli_query($conn, $sql);
$pemakai = mysqli_fetch_array($response);

$username = $pemakai['username'];
$password = $pemakai['password'];

//bilang pengguna aktif
if ($pemakai) {
    $ada = 1;
}




date_default_timezone_set('UTC');
$ID_Transaksi = date('Ydm') . date('his');
$ID_Penjual = $_GET['id_penjual'];
$Kode_produk = $_GET['kode_produk'];
$tmpexpired = date('md');
$expired = (date('Y') + 2) . $tmpexpired;
$harga = 98000;

$sql = "INSERT INTO transaksi VALUES ('$ID_Transaksi', '$ID_Penjual', '$Kode_produk', '$expired', $harga)";
mysqli_query($conn, $sql);


?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lipstic Wardah Cosmetic</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/terimakasih.css">
</head>

<body>
<marquee>Selamat Datang di Lipstic Wardah Cosmetic, semoga anda senang dengan layanan dan produk kami</marquee>
<a href="index.php">
    <header class="top">
        <img src="images/wardah-logo.png" width="50%">
    </header>
</a>

<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="kontak.php">Kontak Kami</a></li>
        <?php
        if ($ada == 1) {
            echo "
            <li><a href=\"member.php\">$username</a></li>
            <li><a href=\"keluar.php\">Keluar</a></li>
            ";
        } else {
            echo "
                <li><a href=\"login.php\">Masuk</a></li>
            ";
        }
        ?>
    </ul>
</nav>

<div id="tableContainer">
    <div id="tableRow">
        <section id="main4">
            <article>
                <div id="about">
                    <h2>Terimakasih Telah Membeli Di Toko Kami</h2>
                </div>
            </article>
        </section>
    </div>
</div>

<footer>
    &copy; Lipstic Wardah Cosmetic
    <br>
   2016.
</footer>


</body>