<?php
session_start();
require 'dbh.inc.php';

$date = $_REQUEST['dateT'];
$coupon = $_REQUEST['couponT'];
$desc = $_REQUEST['descT'];
$lat = $_REQUEST['lat'];

$user = $_SESSION['userUid'];


$sql = sanitizeInput(
    $conn,
    "INSERT INTO EPISODE (
        M_ID,
        E_Date,
        E_Coupon,
        E_Desc,
        e_user
        ) values (
            (SELECT M_ID FROM MARKER WHERE M_lat between ?-.0001 and ?+.0001),
            ?,
            ?,
            ?,
            ?
        );",
    [$lat,$lat,$date,$coupon,$desc,$user]
);

session_abort();