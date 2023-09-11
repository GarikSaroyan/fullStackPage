<?php
$id='';
if (isset($_POST['id'])){
    $id=$_POST['id'];
}
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, 'test1');
$response = array();
if ($conn) {
    $sql = "SELECT * FROM `region` WHERE `countryId` = $id ";
    if ($id ==='')
    {
        $sql="SELECT * FROM `region`";
    }

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $response[$i]['regionId'] = $row['regionId'];
            $response[$i]['countryId'] = $row['countryId'];
            $response[$i]['region'] = $row['region'];
            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);

    }

} else {
    die("Connection failed: " . mysqli_connect_error());
}

//$url_components = parse_url('http://php/PhpstormProjects/createSite/getRegion.php?id=1');
//parse_str($url_components['query'], $params);
//var_dump($params['id']);
