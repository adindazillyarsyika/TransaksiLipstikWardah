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
    <title>Waradah Cosmetic</title>
    <link type="texT/css" rel="stylesheet" href="css/style.css">
</head>

<body>

<a href="index.php">
    <header class="top">
        <h1>Waradah Cosmetic</h1>
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
        <section id="kontakkami">
            <article>
                <div id="kepalaIsi">
                    <p class="selamat">
                        Mengenai kami...
                    </p>
                </div>
                
                </div>
            </article>
        </section>

    </div>
</div>

<footer>
    &copy; 2016 UAS Pemograman WEB I
    <br>
    Dibuat oleh: Agung Santoso(1503113476), Haris Sucipto(1503123272), Mefprizon Muhamad(1503113413).
</footer>


</body>