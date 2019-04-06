<?php

require 'dbh.inc.php';


$lat = $_GET['lat'];

$sql = "DELETE FROM episode where m_id in (select M_ID from marker where m_lat between '$lat'-.0001 and '$lat'+.0001);";
$sql .= "DELETE FROM marker where m_lat between '$lat'-.0001 and '$lat'+.0001;";
$result = mysqli_multi_query($conn, $sql);
