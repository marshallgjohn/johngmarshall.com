<?php

require 'dbh.inc.php';


$lat = $_GET['lat'];

$stmt = "DELETE FROM episode where m_id in (select M_ID from marker where m_lat between ?-.0001 and ?+.0001);";
$stmt .= "DELETE FROM marker where m_lat between ?-.0001 and ?+.0001;";


$sql = sanitizeInput(
    $conn,
    $stmt,
    [$lat,$lat,$lat,$lat]

);
