<?php

/*$servername = "localhost";
$dBUser = "root";
$dBPassword = "";
$dBName = "loginsystem";

$conn = mysqli_connect($servername, $dBUser, $dBPassword, $dBName);


*/

$host='localhost';
$db = 'loginsystem';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$db";
$options = [
    PDO::ATTR_EMULATE_PREPARES   => true, // turn off emulation mode for "real" prepared statements
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
  ];

$conn = new PDO($dsn, $username,$password,$options);


if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}


function sanitizeInput ($conn,$query,$varList)
{

    $stmt = $conn->prepare($query);

    for($i = 0; $i < count($varList);$i++) {
        $stmt->bindParam($i+1,$varList[$i]);
    }
    $result = $stmt->execute();
    return $stmt;
    $stmt = null;
}
