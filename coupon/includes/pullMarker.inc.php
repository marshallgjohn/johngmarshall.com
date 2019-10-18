<?php

require 'dbh.inc.php';


//$result = mysqli_query($conn, $sql);

$sql = sanitizeInput(
    $conn,
    "SELECT DISTINCT marker.m_id, m_name, m_lat, m_lng, m_addy FROM episode JOIN marker ON episode.M_ID = marker.M_ID GROUP BY marker.m_id;",
    []
);



    if(($sql->rowCount()) > 0) {
        foreach ($sql->fetchAll() as $value) {
            echo($value['m_lat']."|".$value['m_lng']."|".$value['m_name']."|".$value['m_addy']."~");

        }
    }
