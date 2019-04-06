<?php

require 'dbh.inc.php';


$id = $_REQUEST['mID'];
$date = $_REQUEST['dateT'];

$sql ="DELETE FROM episode WHERE m_id IN ( SELECT M_ID FROM marker WHERE '$id' BETWEEN m_lat + m_lng -.0001 AND m_lat + m_lng +.0001 ) AND e_date = '$date'";
$result = mysqli_query($conn, $sql);

