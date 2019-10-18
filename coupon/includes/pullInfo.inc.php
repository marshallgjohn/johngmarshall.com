<?php

require 'dbh.inc.php';

$lat = $_GET['lat'];
$lng =$_GET['lng'];

/*
$sql = "SELECT m_lat, m_lng, e_coupon, e_date, e_desc from episode join marker on episode.M_ID=marker.M_ID where M_lat BETWEEN $lat-.0001 AND $lat+.0001";
$result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo($row['m_lat']."|".$row['m_lng']."|".$row['e_coupon']."|".$row['e_date']."|".$row['e_desc']."~");
        }
    }
*/

    $sql = sanitizeInput(
        $conn,
        "SELECT m_lat, m_lng, e_coupon, e_date, e_desc from episode join marker on episode.M_ID=marker.M_ID where M_lat BETWEEN ?-.0001 AND ?+.0001 order by e_date asc",
        [$lat,$lat]
    );
    
        if(($sql->rowCount()) > 0) {
                //echo($value);
            foreach ($sql->fetchAll() as $value) {
                echo($value['m_lat']."|".$value['m_lng']."|".$value['e_coupon']."|".$value['e_date']."|".$value['e_desc']."~");
    
            }
        }
        
