<?php
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../../index.php");
        exit();
    ?>

<meta http-equiv="Refresh" content="0; url=https://www.johngmarshall.com/">