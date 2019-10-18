<?php
    require 'header.login.php';
?>
<div id="login-box">
    <p>Hello, please signup!</p>
    <form action="scripts/signup.script.php" method="post">
    <input type="text" name="uid" placeholder="Username"><br/>
    <input type="text" name="mail" placeholder="E-mail"><br/>
    <input type="password" name="pwd" placeholder="Password"><br/>
    <input type="password" name="pwd-repeat" placeholder="Repeat Password"><br/>
    <input type="password" name="login-phrase" placeholder="Login Phrase"><br/>
    <input type="submit" id="submit-button" name="signup-submit">
    </form>

    <p id="signup-text">Need to <a href="index.php">sign in?</a></p>
</div>
</body>



