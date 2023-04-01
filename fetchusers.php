<?php

include 'connection.php';

$user="SELECT id, username, email From user ";
$result=mysqli_query($conn,$user);

if (mysqli_num_rows($result)>0) {
while ($row=$result->fetch_assoc()) {
    $response['users'][]=$row;
      $response['error']="200";
}
}
else{
    $response['error']="400";
    $response['users'][]="";

}
echo json_encode($response);

?>
