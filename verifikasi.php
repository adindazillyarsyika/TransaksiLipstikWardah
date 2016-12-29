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
    <title>Tiga Sekawan Online Shop</title>
    <link type="text/css" rel="stylesheet" href="styles.css">
    <link type="text/css" rel="stylesheet" href="css/terimakasih.css">
    <link type="text/css" rel="stylesheet" href="css/formstyling.css">
    <link type="text/css" rel="stylesheet" href="css/pengguna.css">
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

                    $pusername = $_POST['pengguna'];
                    if (!$pusername) {
                        $valid[] = 'username';
                    }
                    $ppassword = $_POST['katasandi'];
                    if (!$ppassword) {
                        $valid[] = 'passoword';
                    }
                    $pnama = $_POST['namalengkap'];
                    if (!$pnama) {
                        $valid[] = 'Nama Lengkap';
                    }
                    $ptelepon = $_POST['telepon'];
                    if (!$pusername) {
                        $valid[] = 'telepon';
                    }
                    date_default_timezone_set('UTC');
                    $pmebersejak = date('Y-m-d');
                    $palamat = $_POST['alamat'];
                    if (!$palamat) {
                        $valid[] = 'alamat';
                    }
                    $pprovinsi = $_POST['provinsi'];
                    if (!$pprovinsi) {
                        $valid[] = 'provinsi';
                    }
                    $pkabupaten = $_POST['kabupaten'];
                    if (!$pkabupaten) {
                        $valid[] = 'kabupaten';
                    }
                    $pkodepos = $_POST['kodepos'];
                    if (!$pusername) {
                        $valid[] = 'kodepos';
                    }
                    $psaldo = 0;

                    $photo;

                    if ($_FILES)
                    {
                        $photo = $_FILES['filename']['name'];
                        move_uploaded_file($_FILES['filename']['tmp_name'], $photo);
                    }
                    if (!$photo) {
                        $valid[] = 'photo';
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
                        $sql = "INSERT INTO pengguna VALUES 
                            ('$pusername', '$ppassword', '$pnama' , '$ptelepon', '$pmebersejak',
                              '$palamat', '$pprovinsi', '$pkabupaten', '$pkodepos', '$psaldo', '$photo')";
                        $response = mysqli_query($conn, $sql);

                    }
                }
                mysqli_close($conn);

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

//
