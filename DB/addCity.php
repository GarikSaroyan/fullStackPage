<?php

if (isset($_POST['regionId'])){
    $city=$_POST['city'];
    $regionId=$_POST['regionId'];
}
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, 'test1');

if ($conn) {
    $sql = "INSERT INTO `city`( `regionId`, `city`) VALUES ($regionId,'$city')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "New record created successfully"  ;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

} else {
    die("Connection failed: " . mysqli_connect_error());
}

