<?php

$servername = "localhost";
$username = "root";
$password = "";


// Create connection
$conn = mysqli_connect($servername, $username, $password, 'test1');
$responseCountry = array();
$responseRegion = array();
$responseCity = array();

if ($conn) {
    $sqlCountry = "SELECT * FROM `country`";
    $sqlRegion = "SELECT * FROM `region`";
    $sqlCiti = "SELECT * FROM `city`";

    $resultCountry = mysqli_query($conn, $sqlCountry);
    $resultRegion = mysqli_query($conn, $sqlRegion);
    $resultCiti = mysqli_query($conn, $sqlCiti);

    if ($resultCountry) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($resultCountry)) {
            $responseCountry[$i]['id'] = $row['id'];
            $responseCountry[$i]['country'] = $row['country'];
            $i++;
        }
//        $countryData = json_encode($responseCountry,JSON_PRETTY_PRINT);
//        echo $responseCountry;
    }

    if ($resultRegion) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($resultRegion)) {
            $responseRegion[$i]['regionId'] = $row['regionId'];
            $responseRegion[$i]['countryId'] = $row['countryId'];
            $responseRegion[$i]['region'] = $row['region'];
            $i++;
        }
//        $regionData = json_encode($responseRegion,JSON_PRETTY_PRINT);
//        echo $responseRegion;
    }
    if ($resultCiti) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($resultCiti)) {
            $responseCity[$i]['id'] = $row['id'];
            $responseCity[$i]['regionId'] = $row['regionId'];
            $responseCity[$i]['city'] = $row['city'];
            $i++;
        }
//        $regionData = json_encode($responseCity,JSON_PRETTY_PRINT);
//        var_dump( $responseCity);
    }
    $response = array($responseCountry, $responseRegion, $responseCity);

    echo json_encode($response,JSON_PRETTY_PRINT);;

} else {
    die("Connection failed: " . mysqli_connect_error());
}


