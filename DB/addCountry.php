<?php

if (isset($_POST['country'])){
    $country=$_POST['country'];
}
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, 'test1');



//(strlen($regionId)>0 && strlen($countryId)>0 && strlen($region)>0
if ($conn) {

    $sql = "INSERT INTO `country`( `country`) VALUES ('$country')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "New record created successfully"  ;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

} else {
    die("Connection failed: " . mysqli_connect_error());
}

