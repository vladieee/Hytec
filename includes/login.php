<?php
session_start();
include 'connect.php';

$email = $_POST['email'];
$password = $_POST['password'];


$sql = "SELECT * FROM admin WHERE email='$_POST[email]'";
$data = $con->query($sql);
$rowCount = $data->rowCount();
if($rowCount > 0){
    $row = $data->fetchAll();

    if(password_verify($password, $row[0]['password_hash'])){
        $_SESSION['admin_id'] = $row[0]['admin_id'];
        $rowCount = 1;
    }else{
        $rowCount = 0;
    }
}
if ($rowCount === 1)
{
    $response = 0;
}
else if($rowCount === 0) 
{
    $response = 1;
}
else
{
    $response = 2;
}

echo $response;
?>