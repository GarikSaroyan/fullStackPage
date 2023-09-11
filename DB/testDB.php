<?php

$servername = "localhost";
$username = "root";
$password = "";


// Create connection
$conn = mysqli_connect($servername, $username, $password,'test1');
$response = array();

if ($conn) {
    $sql = "SELECT * FROM `country`";
    $result = mysqli_query($conn, $sql);
    if ($result){
        $i=0;
        while ($row = mysqli_fetch_assoc($result)){
            $response[$i]['id']=$row['id'];
            $response[$i]['country']=$row['country'];
            $i++;
        }
        echo json_encode($response,JSON_PRETTY_PRINT);
    }

}else{
    die("Connection failed: " . mysqli_connect_error());
}





