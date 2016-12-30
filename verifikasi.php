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

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Selamat Datang di Lipstic Wardah Cosmetic, semoga anda senang dengan layanan dan produk kami</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/terimakasih.css">
    <link type="text/css" rel="stylesheet" href="css/pengguna.css">
</head>

<body>
<marquee>Selamat Datang</marquee>
    <header class="top">
        <img src="images/wardah-logo.png" width="50%">
    </header>

<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="daftarproduk.php">Daftar Produk</a></li>
        <li><a href="kontak.php">Kontak Kami</a></li>
        <?php
        if ($ada == 1) {
            echo "
            <li class=\"selected\"><span class=\"disni\"><a href=\"member.php\">$username</a></span></li>
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
                <?php
                if ($ada == 1) {
                    echo "<br><br>Anda Sudah Mendaftar, Silahkan Klik <a href='member.php' style='color:blue'>Status</a>
                                untuk Memastikan
                                <br><br><br><br><br><br><br><br><br>";
                }  else {

                    $nama_toko= $_POST['nama_toko'];
                    if (!$nama_toko) {
                        $valid[] = 'nama_toko';
                    }
                    $alamat_toko = $_POST['alamat_toko'];
                    if (!$alamat_toko) {
                        $valid[] = 'alamat_toko';
                    }
                    $username = $_POST['username'];
                    if (!$username) {
                        $valid[] = 'username';
                    }
                    $password = $_POST['password'];
                    if (!$password) {
                        $valid[] = 'password';
                    }
                    date_default_timezone_set('UTC');
                    $ID_Penjual = date('Ydm') . date('his');
                    if (!$ID_Penjual) {
                        $valid[] = 'ID_Penjual';
                    }
                    
                    if (isset($valid)) {
                        echo "
                              <div id=\"kepalaIsi\">
                                <p class=\"terimakasih\">
							    <span id=\"parkir\">
							        Pendaftaran Gagal!!!
							    </span>
                                </p>
                                </div>
                        ";
                        echo "<br><br>Karena Beberapa Kolom beberapa kolom dibawah ini tidak di isi<br><br>
                               <span style='color: red'>";
                        foreach($valid as $kurang) {
                            echo "$kurang <br>";
                        }
                        echo "</span><br> Silahkan <a href='daftar.php' style='color:blue'>Daftar </a>kembali
                                <br><br><br><br><br><br><br><br><br>";

                    } else {
                        $sql = "INSERT INTO penjual VALUES 
                            ('$ID_Penjual', '$nama_toko', '$alamat_toko' , '$username', '$password')";
                        $response = mysqli_query($conn, $sql);
                        if ($response) {
                            echo "
                              <div id=\"kepalaIsi\">
                                <p class=\"terimakasih\">
							    <span id=\"parkir\">
							        Pendaftaran Berhasil!
							    </span>
                                </p>
                                </div>
                        ";
                        echo "<br><br>Anda Berhasil Mendaftar, Silahkan Klik login<a href='login.php' style='color:blue'>login</a>
                                untuk Masuk
                                <br><br><br><br><br><br><br><br><br>";

                        } else {
                            echo "
                              <div id=\"kepalaIsi\">
                                <p class=\"terimakasih\">
							    <span id=\"parkir\">
							        Pendaftaran Gagal
							    </span>
                                </p>
                                </div>
                            ";
                             echo "</span><br> Silahkan <a href='daftar.php' style='color:blue'>Daftar </a>kembali
                                <br><br><br><br><br><br><br><br><br>";
                        }

                    }
                }
                mysqli_close($conn);

                ?>


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


