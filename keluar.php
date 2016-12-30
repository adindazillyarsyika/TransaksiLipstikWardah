<?php
include_once('config.php');

$sql = "SELECT * FROM online";
$response = mysqli_query($conn, $sql);
$pemakai = mysqli_fetch_array($response);

$username = $pemakai['username'];

//bilang pengguna aktif
if ($pemakai) {
    $ada = 1;
}

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
        <li><a href=login.php>Masuk</a></li>
        <?php
        if ($ada == 1) {
            echo "
            <li class=\"selected\"><span class=\"disni\">Keluar</a></span></li>
            ";
        }
        ?>

    </ul>
</nav>

<div id="tableContainer">
    <div id="tableRow">

        <section id="main4">
            <article>
                <?php
                if ($ada == 1) {
                    echo "<br><br><br><br>
                                $username anda telah keluar, Klik <a href='login.php' style='color:blue'>Masuk</a> 
                                Untuk login Kembali
                                <br><br><br><br><br><br><br><br><br>";

                    $sql = "DELETE FROM online";
                    $response = mysqli_query($conn, $sql);
                } else {
                    echo "<br><br><br><br>
                                Halo Tamu, Anda Belum Masuk, Silahkan Klik <a href='login.php' style='color:blue'>Masuk</a> 
                                Untuk login Kembali
                                <br><br><br><br><br><br><br><br><br>";
                }
                mysqli_close($conn);
                ?>

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