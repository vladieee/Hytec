<?php
$host = "localhost";
$dbase = "crm";
$dsn = "mysql:host={$host};dbname={$dbase}";
$uname = "root";
$pw = "";

try {
    $con = new PDO($dsn, $uname, $pw);
    if($con) {
        // echo "connection to database is successful";
    }
}catch (PDOException $err) {
    echo $err->getMessage();
}

?>