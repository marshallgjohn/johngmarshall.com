<?php
if(isset($_POST['signup-submit']) && $_POST['login-phrase'] == "towtruck") {
    require 'dbh.script.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) 
    {
        header("Location: ../signup.php?error=invalidmailuid");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invaliduid&uid=".$email);
        exit();
    }
    else if($password !== $passwordRepeat) 
    {
        header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }
    else
    {

        $row = sanitizeInput(
            $conn,
            "SELECT uidUsers FROM users WHERE uidUsers=?;",
            [$username]
        ) -> rowCount();

            

            if($row > 0) {
                header("Location: ../signup.php?error=usertaken&uid=".$email);
            exit();
            } else {

                $hashPwd = password_hash($password, PASSWORD_DEFAULT);

                $sql = sanitizeInput(
                    $conn,
                    "INSERT INTO users(
                        uidUsers,
                        emailUsers,
                        pwdUsers)
                    values (
                        ?,
                        ?,
                        ?
                    );",
                    [$username,$email,$hashPwd]
                ); 
                

                    header("Location: ../index.php?signup=success");
                    exit();
                
            }
        

    }
    //add end db here

} else {
    header("Location: ../signup.php");
    exit();
}
