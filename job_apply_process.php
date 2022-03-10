<?php
    //Code to send applicatino to db
    session_start();
    extract($_POST);
    include 'dataProc.php';

    $inApply = mysqli_query($conn, "INSERT INTO app_proc VALUES(NULL, '".$reason."', '".$_SESSION["id"]."', '".$jobID."')");
    header("Location: job_search.php");
?>