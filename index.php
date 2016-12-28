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
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/halamannyala.css">
    <link type="text/css" rel="stylesheet" href="css/pencarian.css">
</head>

<body>

<a href="index.php">
    <header class="top">
        <h1>Waradah Cosmetic</h1>
    </header>
</a>


<nav>
    <ul>
        <li class="selected"><a href="index.php"><span class="disni">Home</span></a></li>
        <li><a href="daftarproduk.php">Daftar Produk</a></li>
        <li><a href="kontakkami.php">Kontak Kami</a></li>
        <?php
        if ($ada == 1) {
            echo "
            <li><a href=\"member.php\">$username</a></li>
            <li><a href=\"keluar.php\">Keluar</a></li>
            ";
        } else {
            echo "
                <li><a href=\"login.php\">Masuk</a></li>
            ";
        }
        ?>
    </ul>
</nav>

<div id="tableContainer">
    <div id="tableRow">

        <section id="menu">
            <a href="index.php"><h1  class="pilihan">NIKON</h1></a>
            <a href="halamancanon.php"><h1 id="atas" class="pilihan">CANON</h1></a>
            <a href="halamansamsung.php"><h1 id="atas" class="pilihan">SAMSUNG</h1></a>
            <a href="halamansony.php"><h1 id="atas" class="pilihan">SONY</h1></a>
        </section>

        <section id="home">
            <article>
                <div id="kepalaIsi">
                    <p class="selamat">
                        Kategori Merek Nikon......

                    <div id="mesinpencari">
                      <form method="post" action="pencariannikon.php">
                        <input type="text" id="pencarian" name="pencarian">
                        <input type="submit" id="Cari" name="cari" value="Cari">
                      </form>
                    </div>
                    </p>
                </div>
                <div id="kotak">

                    <?php

                    $index = 0;
                    $column = -1;

                    require_once('config.php');
                    $sql = "SELECT idnomor, nama, harga, linkgambar FROM nikon";
                    $response = @mysqli_query($conn, $sql);

                    // ekstraks every line
                    while($row = mysqli_fetch_array($response)) {
                        $idnomor[$index] = $row['idnomor'];
                        $names[$index] = $row['nama'];
                        $prices[$index] = $row['harga'];
                        $images[$index] = $row['linkgambar'];
                        $index++;
                    }
                    
                    // menghitung isi table
                    $response = @mysqli_query($conn, $sql);                    
                    $jumlah = 0;
                    while ($hitung = mysqli_fetch_array($response)) {
                            $jumlah++;
                    }
                    //
                    
                    $diprint = $jumlah / 2;

                    // print each item sale
                    for($row = 1; $row <=$diprint; $row++) {
                        $column++;
                        echo "
                                    <div id=\"baris\">
                						<div id=\"item1\">
                							<a class=\"menuju\" href=\"nikon.php?idnomor=$idnomor[$column]#nikon\">
		    		            				<img src=\"$images[$column]\"
			    				            		 alt=\"populer2\" width=\"150px\">
				    				            <p>$names[$column]</p>
					    			            <p class=\"harga\">Rp.$prices[$column].000-</p>
						    	             </a>
						                </div>
						     ";
                        $column++;
                        echo "
                        
            						    <div id=\"item2\">
						            	    <a class=\"menuju\" href=\"nikon.php?idnomor=$idnomor[$column]#nikon\">
								                <img src=\"$images[$column]\"
									                alt=\"populer2\" width=\"150px\">
								                <p>$names[$column]</p>
								                <p class=\"harga\">Rp.$prices[$column].000-</p>
							                </a>
						                </div>
						             </div>
		    				        <br>
                            ";


                    }
                            if ($jumlah % 2 != 0) {
                                $column++;
                                echo "
                                    <div id=\"baris\">
                						<div id=\"item1\">
                							<a class=\"menuju\" href=\"nikon.php?idnomor=$idnomor[$column]#nikon\">
		    		            				<img src=\"$images[$column]\"
			    				            		 alt=\"populer2\" width=\"150px\">
				    				            <p>$names[$column]</p>
					    			            <p class=\"harga\">Rp.$prices[$column].000-</p>
						    	             </a>
						                </div>
                                    </div>
						     ";
                            }
                    mysqli_close($conn);
                    ?>
                </div>
            </article>
        </section>

        <aside>
            <h1 class="promoj">
                Promo Prouduct Pilihan
            </h1>

            <a href="nikon.php?idnomor=1#nikon">
                <div class="populer">
                    <img src="images/top2.png"
                         alt="populer2" width="150px">
                    <p class="promoi">Nikon D5200 with AF-S 18-55mm VR</p>
                </div>
            </a>

            <a href="canon.php?idnomor=1#canon">
                <div class="populer">
                    <img src="images/top.png"
                         alt="populer" width="150px">
                    <p class="promoi">Canon EOS 1200D Kit 18-55mm III</p>
                </div>
            </a>

            <a href="samsung.php?idnomor=1#samsung">
                <div class="populer">
                    <img src="images/top3.jpg"
                         alt="populer" width="150px">
                    <p class="promoi">Samsung NX300 Kit With 18-55mm</p>
                </div>
            </a>

            <a href="sony.php?idnomor=1#sony">
                <div class="populer">
                    <img src="images/top5.png"
                         alt="populer" width="150px">
                    <p class="promoi">Sony Alpha 7R Body Only+16GB</p>
                </div>
            </a>
        </aside>
    </div>
</div>

<footer>
    &copy; 2016 UAS Pemograman WEB I
    <br>
    Dibuat oleh: Agung Santoso(1503113476), Haris Sucipto(1503123272), Mefprizon Muhamad(1503113413).
</footer>


</body>
