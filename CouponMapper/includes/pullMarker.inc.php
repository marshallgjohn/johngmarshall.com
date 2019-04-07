<?php

require 'dbh.inc.php';




$sql = "SELECT DISTINCT marker.m_id, m_name, m_lat, m_lng, m_addy FROM episode JOIN marker ON episode.M_ID = marker.M_ID GROUP BY marker.m_id;";
$result = mysqli_query($conn, $sql);


    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo($row['m_lat']."|".$row['m_lng']."|".$row['m_name']."|".$row['m_addy']."~");
        }
    }
