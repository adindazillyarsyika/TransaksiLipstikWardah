<?php
include_once('config.php');

$sql = "SELECT * FROM online";
$response = mysqli_query($conn, $sql);
$pemakai = mysqli_fetch_array($response);

$username = $pemakai['username'];
$password = $pemakai['password'];


@$sql = "SELECT * FROM penjual WHERE username = '$username' && password = '$password'";
$response = mysqli_query($conn, $sql); // mastikan kondisi true
$row = mysqli_fetch_array($response);


$ID_Penjual = $row[ID_Penjual];

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
    <link type="text/css" rel="stylesheet" href="css/isi.css">
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
        if ($ada == 1 && $row) {
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
                    if ($row) {
                        @$sql = "SELECT * FROM penjual WHERE username = '$username' && password = '$password'";
                        $response = mysqli_query($conn, $sql); // mastikan kondisi true
                        $row = mysqli_fetch_array($response);

                        echo "
                              <div id=\"kepalaIsi\">
                                <p class=\"terimakasih\">
							    <span id=\"parkir\">
							        Informasi $row[username];
							    </span>
                                </p>
                               </div>
                               <div>
                                    <table id='user'>
                                         <tr>
                                            <td class='btable'>ID Penjual:</td>
                                            <th colspan='3'>$row[ID_Penjual]</th>
                                        </tr>
                                         <tr>
                                            <td class='btable'>Nama Toko:</td>
                                            <th colspan='3'>$row[nama_toko]</th>
                                        </tr>
                                        <tr>
                                            <td class='btable'>Alamat Toko:</td>
                                            <th colspan='3'>$row[alamat_toko]</th>
                                        </tr>
                                         <tr>
                                            <td class='btable'>Username:</td>
                                            <th colspan='3'>$row[username]</th>
                                        </tr>
                                         <tr class='btable'>
                                            <th class='btable'  colspan='3'>Riwayat Transaksi</th>
                                        </tr>
                                         <tr>
                                            <th class='btable'  class='inti'>Kode Produk</th>
                                            <th class='btable'  class='inti'>Expired</th>
                                            <th class='btable' class='inti'>Harga</th>
                                        </tr>";

                        $sql = "SELECT * FROM transaksi WHERE ID_PENJUAL = '$ID_Penjual'";
                        $response = mysqli_query($conn, $sql);
                        if ($cek = mysqli_fetch_array($response)) {
                            $sql = "SELECT * FROM transaksi WHERE ID_PENJUAL = '$ID_Penjual'";
                            $response = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_array($response)) {
                                    echo "<tr>
                                                <td class='inti'><a href='showproduk.php?id=".$row[Kode_produk]. "'>$row[Kode_produk]</a></td>
                                                <td  class='inti2'>". $row['expired'] . "</td>
                                                <td  class='inti'>Rp.$row[harga],-</td>
                                           </tr>";
                                    };
                        } else {
                            echo "
                                    <tr>                                        
                                        <td colspan='4' class='inti'><br><br><span style='color:red'>
                                        Belum Melakukan Transaksi</span>
                                        <br><br><br></td>
                                        
                                      </tr>
                            ";

                        }
                        echo "</table>
                               </div>";
                    } else {
                        echo "
                              <div id=\"kepalaIsi\">
                                <p class=\"terimakasih\">
							    <span id=\"parkir\">
							        Error
							    </span>
                                </p>
                                </div>
                        ";
                        echo "<br><br>Password atau Nama Pengguna Anda Salah, <a href='login.php' style='color:blue'> kembali</a>
                                <br><br><br><br><br><br><br><br><br>";
                        $sql = "DELETE FROM online";
                        $response = mysqli_query($conn, $sql);
                    }
                    if ($ada == 1)
                mysqli_close($conn);

                ?>

    </div>
    </article>
    </section>

</div>
</div>
<footer>
    &copy; Transaksi Lipstik waradah
    <br>
   2016.
</footer>



</body>
</html>