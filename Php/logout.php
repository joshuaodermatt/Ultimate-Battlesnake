<?php
    session_start();
    print("fjfjjfjjf");
    session_destroy();
    session_unset();
    header('Location: ../index.php');
?>