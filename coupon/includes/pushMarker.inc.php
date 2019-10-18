<?php
    /*
    Creates and pushes marker to DB with text from input forms on screen.
    
    Also validates and makes sure nothing is blank...
    */

    require 'dbh.inc.php';
    
    session_start();

    $name = $_POST['nameT'];
    $address = $_REQUEST['addressT'];
    $lat = $_REQUEST['lat'];
    $lng = $_REQUEST['lng'];
    $date = $_REQUEST['dateT'];
    $coupon = $_REQUEST['couponT'];
    $desc = $_REQUEST['descT'];

    $user = $_SESSION['userUid'];




    $stmt = "INSERT INTO marker (M_name,M_lat,M_lng, M_addy,M_user)values (?,?,?,?,?);";
    $stmt .="INSERT INTO episode (M_ID,E_DATE,E_COUPON,E_DESC)VALUES (LAST_INSERT_ID(),?,?,?);";


    $sql = sanitizeInput(
    $conn,
    $stmt,
    [$name,$lat,$lng,$address,$user,$date,$coupon,$desc]
);


session_abort();





//echo mysqli_query($conn, $sql);


