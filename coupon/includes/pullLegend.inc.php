<?php
include 'dbh.inc.php';

/*$sql = "select M_name, M_Addy from marker;";
$result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo($row['M_name']."|".$row['M_Addy']."~");
        }
    }
*/


    $sql = sanitizeInput(
        $conn,
        "select M_name, M_Addy from marker;",
        []
    );
    
        if(($sql->rowCount()) > 0) {
            foreach ($sql->fetchAll() as $value) {
                echo($value['M_name']."|".$value['M_Addy']."~");
    
            }
        }
        