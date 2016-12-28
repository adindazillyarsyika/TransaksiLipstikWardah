<?php
    define('DB_ROOTFILE', 'TransaksiLipstikWardah');
    define('DB_NAME', 'lipstikwaradah');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '12345678');
    define('DB_HOST', 'localhost');

    $conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (!$conn) {
        die('Could not connect: ' .mysqli_connect_error());
    }
?>