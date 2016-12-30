<?php
include_once('config.php');

$merek = $_GET['merek'];
$sql = "SELECT * FROM online";
$response = mysqli_query($conn, $sql);
$pemakai = mysqli_fetch_array($response);
$idnomor = $_GET['idnomor'];

$username = $pemakai['username'];
$password = $pemakai['password'];

//bilang pengguna aktif
if ($pemakai) {
    $ada = 1;
}
$sql = "SELECT username, nama, alamat, saldo FROM pengguna WHERE username='$username'";
$response = mysqli_query($conn, $sql);
$pembeli = mysqli_fetch_array($response);

$nama = $pembeli['nama'];
$alamat = $pembeli['alamat'];
$saldo = $pembeli['saldo'];

$sql = "SELECT nama, harga FROM $merek WHERE idnomor='$idnomor'";
$response = mysqli_query($conn, $sql);
$item = mysqli_fetch_array($response);

$namaitem = $item['nama'];
$harga = $item['harga'];


?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tiga Sekawan Online Shop</title>
    <link type="text/css" rel="stylesheet" href="styles.css">
    <link type="text/css" rel="stylesheet" href="css/terimakasih.css">
    <link type="text/css" rel="stylesheet" href="css/beli.css">

</head>

<body>

<a href="index.php">
    <header class="top">

        <p id="logokita2">
            <img src="images/logokita2.png" width="300px">
        </p>
        <p id="logokita">
            <img src="images/logokita.png" width="300px">
        </p>
        <p id="gratis">
            <img src="images/gratis3.png" width="200px">
        </p>
        <p id="aman">
            <img src="images/transparan3.png" width="200px">
        </p>
        <p id="praktis">
            <img src="images/aman3.png" width="200px">
        </p>

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
        }
        ?>

    </ul>
</nav>

<div id="tableContainer">
    <div id="tableRow">

        <section id="main4">
            <article>
                <div id="kepalaIsi">
                    <p class="terimakasih">
							<span id="parkir">
							Konfirmasi Pembelian
							</span>
                    </p>
                </div>
                <br><br>

                <?php
                if ($ada == 1) {
                    echo "
                               <div id=\"beli\">
                                    <table>
                                        <tr>
                                            <td>Nama : </td>
                                            <td>$nama</td>
                                        </tr>
                                         <tr>
                                            <td>Username : </td>
                                            <td>$username</td>
                                        </tr>
                                         <td>Alamat : </td>
                                            <td>$alamat</td>
                                        </tr>
                                         <tr>
                                            <td>Saldo : </td>
                                            <td>Rp. $saldo.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Item : </td>
                                            <td>$namaitem</td>
                                        </tr>
                                        <tr>
                                            <td>Harga : </td>
                                            <td>Rp. $harga.000,-</td>
                                        </tr>
                                    </table>
                                    <div id='tombolya'>
                                            <a href='terimakasih.php?idnomor=$idnomor&&merek=$merek#parkir'>
                                            <img src='images/tombolya.png'> </a>
                                            
                                            <span class='tomboltidak'>
                                            <a href='index.php'>
                                            <img src='images/tomboltidak.png'
                                            </a>
                                            </span>
                                    </div>
                                    </div>
                                </div>
                                     
                    ";

                }  else {
                    echo "
                              <div id=\"kepalaIsi\">
                                <p class=\"terimakasih\">
							    <span id=\"parkir\">
							        Error
							    </span>
                                </p>
                                </div>
                        ";
                    echo "<br><br>Anda Belum Login, Silahkan login<a href='login.php' style='color:blue'> kembali</a>
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
    &copy; 2016 UAS Pemograman WEB I
    <br>
    Dibuat oleh: Agung Santoso(1503113476), Haris Sucipto(1503123272), Mefprizon Muhamad(1503113413).
</footer>


</body>