
<?php


    session_unset();
    session_destroy();

    $conn = null;

    header('Location: login.php"');
?>