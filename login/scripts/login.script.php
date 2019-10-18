<?php

if (!isset($_SESSION)) {
    require 'dbh.script.php';

    $mailuid = $_POST['uid'];
    $password = $_POST['pwd'];

   $limit = sanitizeInput(
        $conn,
        "SELECT COUNT(idUsers) FROM failed_logins WHERE idUsers =(SELECT idUsers FROM users WHERE uidUsers = ?);",
        [$mailuid]
    );
    $seconds = sanitizeInput(
        $conn,
        "SELECT failed_time FROM failed_logins WHERE idUsers =(SELECT idUsers FROM  users WHERE uidUsers = ?) ORDER BY failed_time DESC LIMIT 1;",
        [$mailuid]
    );
    

    

if((isset($_POST['login-submit']) && (intval($limit->fetchColumn())) < 5) || (isset($_POST['login-submit']) && (time()- intval($seconds->fetchColumn()) >= 900)))
{


    if(empty($mailuid) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {

        if (!$row = sanitizeInput(
            $conn,
            "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;",
            [$mailuid,$mailuid]
        ) -> fetchAll(PDO::FETCH_ASSOC)[0]) {
            header("Location: ../index.php?error=wronginformation");
            exit();
         } else {
        $pwdCheck = password_verify($password, $row['pwdUsers']);
        

        if($pwdCheck == false) {


            $ip = $_SERVER['REMOTE_ADDR'];

            $sql = sanitizeInput(
                $conn,
                "INSERT INTO failed_logins(idUsers,failed_time,failed_ip) values((select idUsers from users where uidUsers=?),?,?);",
                [$mailuid,time(),$ip]
            );

            header("Location: ../index.php?error=wronginformation");
            exit();

        } else if($pwdCheck == true) {
            session_start();
            $_SESSION['userId'] = $row['idUsers'];
            $_SESSION['userUid'] = $row['uidUsers'];

            

            $sql = sanitizeInput(
                $conn,
                "DELETE FROM failed_logins WHERE idUsers=(select idUsers FROM users where uidUsers=?);",
                [$mailuid]
            );

            header("Location: ../../");
            exit();
        }
    } 
}
} else {
    header('Location: ../index.php?error=lockedout');

}
} else {
    header('Location: ../');
    die("You are already logged in!");
}
