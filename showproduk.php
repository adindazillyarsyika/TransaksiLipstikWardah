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
    <title>Lipstik Waradah Cosmetic</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/isi.css">
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
        <li><a href="daftarproduk.php">Daftar Produk</a></li>
        <li><a href="kontakkami.php">Kontak Kami</a></li>
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

                    $idnomor = $_GET['idnomor'];
                    include_once('config.php');
                    
                    $sql = "SELECT * FROM nikon WHERE idnomor=$idnomor";
                    $response = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($response);

                    echo "
                        
                    <table border=\"1px\">
                        <tr>
                            <span id=\"nikon\"><th colspan=\"3\" class=\"nama\">$row[nama]</th></span>
                        </tr>
                        <tr>
                            <th>Effective Pixel</th>
                            <td>$row[effectivePixel]</td>
                            <td rowspan=\"7\"><img src=\"$row[linkgambar]\" width=\"250px\">
                        </tr>
                        <tr>
                            <th>Mount</th>
                            <td>$row[mount]</th>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td>$row[type]</td>
                        </tr>
                        <tr>
                            <th>Sensor type</th>
                            <td>$row[sensorType]</td>
                        </tr>
                        <tr>
                            <th>Total Pixel</th>
                            <td>$row[totalPixel]</th>
                        </tr>
                        <tr>
                            <th>Resolution</th>
                            <td>$row[resolution]</td>
                        </tr>
                        <tr>
                            <th>AF-Assist Lamp</th>
                            <td>$row[afassistlamp]</td>
                        </tr>
                        <tr>
                            <th colspan=\"3\" class=\"harga\">Rp.$row[harga].000,-</th>
                        </tr>
                        <tr>
                            <th colspan=\"3\" class=\"beli\">";

                            if ($ada == 1) {
                                echo " <a class=\"nyala\" href=\"beli.php?idnomor=$idnomor&&merek=nikon\"
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
    &copy; Transaksi Lipstik waradah
    <br>
   2016.
</footer>


</body>