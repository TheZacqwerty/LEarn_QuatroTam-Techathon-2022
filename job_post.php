<?php
    session_start();
    extract($_POST);
    include 'dataProc.php';

    //Insert a new job to be posted
    $searchReq = mysqli_query($conn, "INSERT INTO job_board VALUES(NULL, '".$jobTitle."', '".$jobDesc."', '".$jobSalary."', '".$_SESSION["id"]."')");
    header("Location: dashboard_employer.php");
?>