<?php
    $host  = 'localhost';
    $user  = 'root';
    $pass  = '';
    $db    = 'db_tiket';

    $conn = mysqli_connect($host, $user, $pass, $db);
    if($conn){
    //   echo "konek";
    }

    mysqli_select_db($conn, $db);
?>

