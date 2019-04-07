<?php
    
    require 'dbh.inc.php';
    
    $name = $_POST['nameT'];
    $address = $_REQUEST['addressT'];
    $lat = $_REQUEST['lat'];
    $lng = $_REQUEST['lng'];
    $date = $_REQUEST['dateT'];
    $coupon = $_REQUEST['couponT'];
    $desc = $_REQUEST['descT'];



$sql = "INSERT INTO marker (M_name,M_lat,M_lng, M_addy)values ('$name','$lat','$lng','$address');";
$sql .="INSERT INTO episode (M_ID,E_DATE,E_COUPON,E_DESC)VALUES (LAST_INSERT_ID(),'$date','$coupon','$desc');";

mysqli_multi_query($conn,$sql);







//echo mysqli_query($conn, $sql);


