<?php

include 'connection.php';
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$checkuser = "SELECT * FROM user Where email ='$email'";
$checkquery = mysqli_query($conn,$checkuser);

if(mysqli_num_rows($checkquery)>0) {
//  echo "User alredy exist";
 $response['error']="002";
 $response['massages']="User alredy exist";
}
else {

    $insertquery = "INSERT INTO user (username, email, password) VALUES('$username','$email','$password')";

$result = mysqli_query($conn,$insertquery);

if ($result) {
  
    $response['error']="000";
    $response['massages']="register successfully";
}
else
{
    $response['error']="001";
    $response['massages']="Registration Failed";
}
}

echo json_encode($response);



?>
