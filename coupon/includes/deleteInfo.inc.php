<?php

require 'dbh.inc.php';


$id = $_REQUEST['mID'];
$date = $_REQUEST['dateT'];
$desc = $_REQUEST['descT'];
$coupon = $_REQUEST['couponT'];


$sql = sanitizeInput(
    $conn,
    "DELETE FROM episode WHERE m_id IN ( SELECT M_ID FROM marker WHERE ? BETWEEN m_lat + m_lng -.0001 AND m_lat + m_lng +.0001 ) AND e_DATE = ? AND E_coupon = ? AND E_desc = ?",
    [$id,$date,$desc,$coupon]
);

