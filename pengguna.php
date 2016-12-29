<?php
include_once('config.php');
$username = $_POST['pengguna'];
$password = $_POST['katasandi'];

$sql = "SELECT * FROM online";
$response = mysqli_query($conn, $sql);
$lihat =mysqli_fetch_array($response);


if(!$lihat) {
    echo "true";
    $sql = "INSERT INTO online VALUES ('$username', '$password')";
    $response = mysqli_query($conn, $sql);
    echo $response[username];
}

@$sql = "SELECT * FROM penjual WHERE username = '$username' && password = '$password'";
$response = mysqli_query($conn, $sql); // mastikan kondisi true
$row = mysqli_fetch_array($response);


$ID_Penjual = $row[ID_Penjual];
$ada = 0;

$sql = "SELECT * FROM online";
$response = mysqli_query($conn, $sql);
$pemakai = mysqli_fetch_array($response);

$username = $pemakai['username'];
echo $username;

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
                                            <td>ID Penjual:</td>
                                            <th colspan='3' style='color: black;'>$row[ID_Penjual]</th>
                                        </tr>
                                         <tr>
                                            <td>Nama Toko:</td>
                                            <th colspan='3' style='color: black;'>$row[nama_toko]</th>
                                        </tr>
                                        <tr>
                                            <td>Alamat Toko:</td>
                                            <th colspan='3' style='color: black;'>$row[alamat_toko]</th>
                                        </tr>
                                         <tr>
                                            <td>Username:</td>
                                            <th colspan='3' style='color: black;'>$row[username]</th>
                                        </tr>
                                         <tr>
                                            <th class='pembelian' colspan='3'>Riwayat Transaksi</th>
                                        </tr>
                                         <tr>
                                            <th class='inti'>Kode Produk</th>
                                            <th class='inti'>Expired</th>
                                            <th class='inti'>Harga</th>
                                        </tr>";

                        $sql = "SELECT * FROM transaksi WHERE ID_PENJUAL = '$ID_Penjual'";
                        $response = mysqli_query($conn, $sql);
                        if ($cek = mysqli_fetch_array($response)) {
                            $sql = "SELECT * FROM transaksi WHERE ID_PENJUAL = '$ID_Penjual'";
                            $response = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_array($response)) {
                                    echo "<tr>
                                                <td class='inti'><a href='showproduk.php?id=".$row[Kode_produk]. "'>$row[Kode_produk]</a></td>
                                                <td  class='inti2'>$row[expired]</td>
                                                <td  class='inti'>Rp.$row[harga].000,-</td>
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



</body>
</html>