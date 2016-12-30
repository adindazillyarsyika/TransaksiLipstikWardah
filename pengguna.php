<?php
include_once('config.php');
$username = $_POST['pengguna'];
$password = $_POST['katasandi'];

$sql = "SELECT * FROM online";
$response = mysqli_query($conn, $sql);
$lihat =mysqli_fetch_array($response);


if(!$lihat) {
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
    <link type="text/css" rel="stylesheet" href="css/formstyling.css">
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
            <li class=\"selected\"><span class=\"disni\"><a href='#'>$username</a></span></li>
            <li><a href=\"keluar.php\">Keluar</a></li>
            ";
        } else {
            echo "
            <li class=\"selected\"><span class=\"disni\">Masuk</a></span></li>
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
                        $sql = "DELETE FROM online";
                        $response = mysqli_query($conn, $sql);
                         echo "
                             <div id=\"login\">
                                <form action=\"pengguna.php\" method=\"post\">
                                    <label for=\"pengguna\">Username:</label><input type=\"text\" id=\"pengguna\" name=\"pengguna\" maxlength=\"12\">
                                    <label for=\"pasowrd\">Password:</label><input type=\"text\" id=\"katasandi\" name=\"katasandi\" maxlength=\"20\" value='123456712'>
                                    <input type=\"submit\" name=\"masuk\" value=\"masuk\">
                                </form>
                            </div>
                            <p>Belum Punya Akun? Silahkan Mendaftar <a href=\"daftar.php\" style=\"font-weight: bolder\">disni</a></p>
                            </div>                        
                        ";

                        echo "<script type='text/javascript'>alert('Error, Password atau Nama Pengguna Anda Salah, Silahkan cek kembali!');</script>";
                        
                        
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
    &copy; Lipstic Wardah Cosmetic
    <br>
   2016.
</footer>>



</body>
</html>