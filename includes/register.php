<?php
session_start();
include 'connect.php';

$sql = "SELECT email FROM admin WHERE email = '$_POST[email]'";
$sqlExe = $con->query($sql);
if ($sqlExe->rowCount() > 0) {
    $response = 1;
} else {
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO admin(email, password_hash, fname, lname) VALUES(?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->execute([$_POST['email'], $hashedPassword, $_POST['fname'], $_POST['lname']]);
    $rowCount = $stmt->rowCount();

    if ($rowCount === 1) {
        $sql = "SELECT * FROM admin WHERE email = '$_POST[email]'";
        $exe = $con->query($sql);
        $row = $exe->fetchAll();
        $_SESSION['admin_id'] = $row[0]['admin_id'];
        $response = 0;
    } else if ($rowCount === 0) {
        $response = 1;
    } else {
        $response = 2;
    }

}
echo $response;
