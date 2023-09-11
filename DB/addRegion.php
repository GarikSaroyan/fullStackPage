<?php

if (isset($_POST['region'])){
    $countryId=$_POST['countryId'];
    $region=$_POST['region'];
}
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, 'test1');

if ($conn) {
    $sql = "INSERT INTO `region`( `countryId`, `region`) VALUES ($countryId,'$region')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "New record created successfully"  ;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

} else {
    die("Connection failed: " . mysqli_connect_error());
}

