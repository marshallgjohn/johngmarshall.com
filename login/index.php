<?php
require 'header.login.php';

if(isset($_SESSION['userUid'])) {
    header('Location: ../');
    die("You are already logged in!");
}
?>

<body>
<div id="login-box">
        <?php
            if(isset($_GET['error'])) {
                echo "<div id='error-text'>";
                switch($_GET['error']){
                case 'lockedout':
                    echo '<p>You have exceeded the max attempts to log into this account. Please contact me@johngmarshall if you need assistance.</p>';
                break;
                case 'wronginformation':
                    echo '<p>Incorrect username or password.</p>';
                break;
                case 'emptyfields':
                    echo '<p>Please fill out all fields to login!</p>';
                break;
                }
                echo '</div>';
            }
        ?>
    <p>Login</p>
    <form action="scripts/login.script.php" method="post">
    <input type="text" name="uid" placeholder="Username"><br/>
    <input type="password" name="pwd" placeholder="Password"><br/>
    <input id="submit-button" type="submit" name="login-submit" value="Login">
    </form>
    <p id="signup-text">Need to <a href="signup.php">signup?</a></p>
</div>
    
</body>