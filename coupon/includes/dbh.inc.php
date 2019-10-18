<?php

/*$servername = "localhost";
$dBUser = "root";
$dBPassword = "";
$dBName = "loginsystem";

$conn = mysqli_connect($servername, $dBUser, $dBPassword, $dBName);


*/

$host='localhost';
$db = 'coupon_marker';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$db";
$options = [
    PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
  ];

$conn = new PDO($dsn, $username,$password,$options);




function sanitizeInput ($conn,$query,$varList)
{
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);
    $stmt = $conn->prepare($query);

    for($i = 0; $i < count($varList);$i++) {
        $stmt->bindParam($i+1,$varList[$i]);
    }
    $result = $stmt->execute();
    return $stmt;
    $stmt = null;
}

