<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'test123';
    $db2 = 'test123';
    $conn = mysqli_connect($host, $user, $pass, $db);
    $conn2 = mysqli_connect($host, $user, $pass, $db2);


    mysqli_select_db($conn, $db);