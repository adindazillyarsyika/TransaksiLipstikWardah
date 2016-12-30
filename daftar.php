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
    <title>Lipstik Wardah Cosmetic</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/terimakasih.css">
    <link type="text/css" rel="stylesheet" href="css/formstyling.css">
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
                                    <label for=\"nama_toko\">Nama Toko:</label><input type=\"text\" id=\"nama_toko\" name=\"nama_toko\" maxlength=\"50\">
                                    <label for=\"alamat_toko\">Alamat Toko:</label><input type=\"text\" id=\"alamat_toko\" name=\"alamat_toko\" maxlength=\"50\">
                                    <label for='username'>Username</label><input type='text' id='username' name='username' maxlength='20'>
                                    <label for='password'>Password:</label><input type='text' id='password' name='password' maxlength='20'>
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
    &copy; Lipstic Wardah Cosmetic
    <br>
   2016.
</footer>>



</body>