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
    <title>Lipstik Waradah Cosmetic</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/terimakasih.css">
    <link type="text/css" rel="stylesheet" href="css/formstyling.css">
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
							Login Pengguna
							</span>
                    </p>
                </div>
                <br><br>

                <?php
                    if ($ada != 1) {
                        echo "
                             <div id=\"login\">
                                <form action=\"pengguna.php\" method=\"post\">
                                    <label for=\"pengguna\">Username:</label><input type=\"text\" id=\"pengguna\" name=\"pengguna\" maxlength=\"12\">
                                    <label for=\"pasowrd\">Password:</label><input type=\"text\" id=\"katasandi\" name=\"katasandi\" maxlength=\"20\">
                                    <input type=\"submit\" name=\"masuk\" value=\"masuk\">
                                </form>
                            </div>
                            <p>Belum Punya Akun? Silahkan Mendaftar <a href=\"daftar.php\" style=\"font-weight: bolder\">disni</a></p>
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
    &copy; Transaksi Lipstik waradah
    <br>
   2016.
</footer>


</body>