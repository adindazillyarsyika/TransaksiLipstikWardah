<?php
include_once('config.php');

$merek = $_GET['merek'];
$sql = "SELECT * FROM online";
$response = mysqli_query($conn, $sql);
$pemakai = mysqli_fetch_array($response);
$ID_Produk = $_GET['id'];


$username = $pemakai['username'];
$password = $pemakai['password'];

//bilang pengguna aktif
if ($pemakai) {
    $ada = 1;
}
$sql = "SELECT * FROM penjual WHERE username='$username'";
$response = mysqli_query($conn, $sql);
$pembeli = mysqli_fetch_array($response);

$ID_Penjual = $pembeli['ID_Penjual'];
$nama_toko = $pembeli['nama_toko'];
$alamat_toko = $pembeli['alamat_toko'];
$username = $pembeli['username'];


$sql = "SELECT * FROM produk WHERE Kode_produk='$ID_Produk'";
$response = mysqli_query($conn, $sql);
$item = mysqli_fetch_array($response);

$kode_produk= $item['Kode_produk'];
$jenis = $item['jenis'];
$warna = $item['kode_warna'];


?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
     <title>Lipstic Wardah Cosmetic</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/terimakasih.css">
    <link type="text/css" rel="stylesheet" href="css/beli.css">

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
                                            <td>ID Penjual : </td>
                                            <td>$ID_Penjual</td>
                                        </tr>
                                         <tr>
                                            <td>Username : </td>
                                            <td>$username</td>
                                        </tr>
                                         <td>Alamat Toko: </td>
                                            <td>$alamat_toko</td>
                                        </tr>
                                        <tr>
                                            <td>Kode Produk: </td>
                                            <td>$kode_produk</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis : </td>
                                            <td>$jenis</td>
                                        </tr>
                                    </table>
                                    <div>
                                            <br><br>
                                            <a class='lbeli' href='terimakasih.php?kode_produk=$kode_produk&&id_penjual=$ID_Penjual'>
                                            Beli </a>
                                            
                                            <span class='tomboltidak'>
                                            <a style='color: #42a1af' class='lbeli' href='index.php'>
                                            Tidak
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
    &copy; Lipstic Wardah Cosmetic
    <br>
   2016.
</footer>

</body>