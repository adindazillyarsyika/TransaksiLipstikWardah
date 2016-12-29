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
    <title>Tiga Sekawan Online Shop</title>
    <link type="text/css" rel="stylesheet" href="styles.css">
    <link type="text/css" rel="stylesheet" href="css/terimakasih.css">
    <link type="text/css" rel="stylesheet" href="css/formstyling.css">
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
        if ($ada != 1) {
            echo "
            <li class=\"selected\"><span class=\"disni\">Masuk</a></span></li>
            ";
        } else {
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
							Mendaftar Baru
							</span>
                    </p>
                </div>
                <br><br>

                <?php
                if ($ada != 1) {
                    echo "
                             <div id=\"login\">
                                <form action=\"verifikasi.php\" method=\"post\" enctype='multipart/form-data'>
                                    <label for=\"pengguna\">Username:</label><input type=\"text\" id=\"pengguna\" name=\"pengguna\" maxlength=\"12\">
                                    <label for=\"pasowrd\">Password:</label><input type=\"text\" id=\"katasandi\" name=\"katasandi\" maxlength=\"8\">
                                    <label for='namalengkap'>Nama Lengkap:</label><input type='text' id='namalengkap' name='namalengkap' maxlength='20'>
                                    <label for='alamat'>Alamat:</label><input type='text' id='alamat' name='alamat' maxlength='20'>
                                    <label for='alamat'>Nomor Telepon:</label><input type='text' id='telepon' name='telepon' maxlength='12'>
                                    <label for='provinsi'>Provinsi:</label><input type='text' id='provinsi' name='provinsi' maxlength='16'>
                                    <label for='kabupaten'>Kabupaten:</label><input type='text' id='kabupaten' name='kabupaten' maxlength='16'>
                                    <label for='kodepos'>Kodepos:</label><input type='text' id='kodepos' name='kodepos' maxlength='5'>
                                    <label for='photo'>Photo Profil: </label> <input type='file' name='filename'>
                                    <input type=\"submit\" name=\"masuk\" value=\"Daftar\">
                                </form>
                            </div>
                            <p>Sudah  Punya Akun? Silahkan Klik  <a href=\"login.php\" style=\"font-weight: bolder\">disini</a>
                                untuk masuk</p>
                            </div>                        
                        ";
                } else {
                    echo "<br><br>
                                Hello $username anda telah Masuk, Semoga Anda Senang dengan Situs Kami
                                <br><br><br><br><br><br><br><br><br>";

                }
                ?>

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