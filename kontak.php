<?php
include_once('config.php');

$sql = "SELECT * FROM online";
$response = mysqli_query($conn, $sql);
$pemakai = mysqli_fetch_array($response);

$username = $pemakai['username'];
$password = $pemakai['password'];

//bilang pengguna aktif
if ($pemakai) {
    $ada = 1;
}

mysqli_close($conn);

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
        <li class="selected"><span class="disni"><a href="kontakkami.php">Kontak Kami</a></span></li>
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
                    <h2>Dibuat oleh:</h2>
                    <p>Nama nim</p>
                    <p>Nama nim</p>
                    <p>Nama nim</p>
                    <p>Nama nim</p>
                    <p>Nama nim</p>
                </div>
            </article>
        </section>

    </div>

<footer>
    &copy; Lipstic Wardah Cosmetic
    <br>
   2016.
</footer>>


</body>