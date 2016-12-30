<?php
include_once('config.php');
$merek = "nikon";
$sql = "SELECT * FROM online";
$response = mysqli_query($conn, $sql);
$pemakai = mysqli_fetch_array($response);

$username = $pemakai['username'];
$password = $pemakai['password'];

//bilang pengguna aktif
if ($pemakai) {
    $ada = 1;
}

?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Selamat Datang di Lipstic Wardah Cosmetic, semoga anda senang dengan layanan dan produk kami</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/tablekontent.css">
    <link type="text/css" rel="stylesheet" href="css/isi.css">
</head>

<body>
<marquee>Selamat Datang</marquee>
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

        <section id="home">
            <article>
                <div id="kepalaIsi">
                    <p class="selamat">
                        Review Produk...
                    </p>
                </div>
                <div id="kontenisi">
                    <?php

                    $idnomor = $_GET['id'];
                   
                    include_once('config.php');
                    
                    $sql = "SELECT * FROM produk WHERE Kode_produk='$idnomor'";
                    $response = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($response);

                    


                    echo "
                        
                    <table class=showProduK border=\"1px\">
                        <tr>
                            <th class='btable' >Kode Produk: </th>
                            <td>" . $row[Kode_produk] . "</td>
                            <td rowspan=\"5\"><img src=" . $row[gambar_produk] . "\" width=\"250px\">
                        </tr>
                        <tr>
                            <th class='btable'>Kode Warna: </th>
                            <td>" . $row[kode_warna] . "</th>
                        </tr>
                        <tr>
                            <th class='btable'>Merk: </th>
                            <td>" . $row[merk] . "</td>
                        </tr>
                        <tr>
                            <th class='btable'>Jenis: </th>
                            <td>" . $row[jenis] . "</td>
                        </tr>
                        <tr>
                            <th class='btable'>Netto: </th>
                            <td>" . $row[netto] . "</th>
                        </tr>
                        <tr>
                            <th colspan=\"5\" class='btable'>";

                            if ($ada == 1) {
                                echo " <a class=\"nyala\" href=\"beli.php?id=" . $row[Kode_produk] . "
                                        alt = \"beli sekarang\" title = \"beli sekarang\" > BELI</a >
                    ";
                            }else{
                                echo " <a class=\"nyala\" href=\"tidakbisamembeli.php\"
                                       alt=\"beli sekarang\" title=\"beli sekarang\">BELI</a>";
                            }

                    echo "
                            </th>
                        </tr>
                    </table>
                        
                    ";

                    mysqli_close($conn);
                    ?>
                </div>
            </article>
        </section>

                        <aside>
            <h1 class="promoj">
                Promo Prouduct Pilihan
            </h1>

            <a href="nikon.php?idnomor=1#nikon">
                <div class="populer">
                    <img src=""
                         alt="populer2" width="150px">
                    <p class="promoi">Produk 1</p>
                </div>
            </a>

            <a href="canon.php?idnomor=1#canon">
                <div class="populer">
                    <img src=""
                         alt="populer" width="150px">
                    <p class="promoi">Produk 2</p>
                </div>
            </a>

            <a href="samsung.php?idnomor=1#samsung">
                <div class="populer">
                    <img src=""
                         alt="populer" width="150px">
                    <p class="promoi">Produk 3</p>
                </div>
            </a>

            <a href="sony.php?idnomor=1#sony">
                <div class="populer">
                    <img src=""
                         alt="populer" width="150px">
                    <p class="promoi">Produk 4</p>
                </div>
            </a>
        </aside>
    </div>
</div>

<footer>
    &copy; Lipstic Wardah Cosmetic
    <br>
   2016.
</footer>


</body>