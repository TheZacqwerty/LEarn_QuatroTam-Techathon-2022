<?php
    //Upload files as is
    session_start();
    extract($_POST);
    include 'dataProc.php';

    $truIdFile = ($idFile != NULL)? $idFile : NULL;
    $truResFile = ($resFile != NULL)? $resFile : NULL;

    //Fetch if no file submitted
    $fetchWorker = mysqli_query($conn, "SELECT validId, resume FROM worker WHERE workerId = ".$_SESSION["id"]."");
    $resWork = mysqli_fetch_array($fetchWorker);

    if ($resWork['validId'] != NULL && $truIdFile == NULL) $truIdFile = $resWork['validId'];
    if ($resWork['resume'] != NULL && $truResFile == NULL) $truResFile = $resWork['resume'];

    $insFile = mysqli_query($conn, "UPDATE worker SET validId = '".$truIdFile."', resume =  '".$truResFile."' WHERE workerId = ".$_SESSION["id"]." ");

    header("Location: dashboard_uploadfiles.php");
?>