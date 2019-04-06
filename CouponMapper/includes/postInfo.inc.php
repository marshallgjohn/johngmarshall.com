<?php

require 'dbh.inc.php';

$date = $_REQUEST['dateT'];
$coupon = $_REQUEST['couponT'];
$desc = $_REQUEST['descT'];
$lat = $_REQUEST['lat'];


$sql = "INSERT INTO EPISODE (
    M_ID,
    E_Date,
    E_Coupon,
    E_Desc
    ) values (
        (SELECT M_ID FROM MARKER WHERE M_lat between '$lat'-.0001 and '$lat'+.0001),
        '$date',
        '$coupon',
        '$desc'
    );";


echo mysqli_query($conn,$sql);