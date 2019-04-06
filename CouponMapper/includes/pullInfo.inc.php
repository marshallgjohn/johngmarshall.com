<?php

require 'dbh.inc.php';

$lat = $_GET['lat'];
$lng =$_GET['lng'];

$sql = "SELECT m_lat, m_lng, e_coupon, e_date, e_desc from episode join marker on episode.M_ID=marker.M_ID where M_lat BETWEEN $lat-.0001 AND $lat+.0001";
$result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo($row['m_lat']."|".$row['m_lng']."|".$row['e_coupon']."|".$row['e_date']."|".$row['e_desc']."~");
        }
    }
