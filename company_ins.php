<?php
    //Rename company
    session_start();
    extract($_POST);
    include 'dataProc.php';

    if (!is_null($comp)){
        $insComp = mysqli_query($conn, "UPDATE employer SET company = '".$comp."' WHERE empId = ".$_SESSION["id"]."");
    }

    header("Location: dashboard_company.php");
?>