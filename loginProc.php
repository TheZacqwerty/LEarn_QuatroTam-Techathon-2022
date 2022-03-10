<?php
    session_start();
    extract($_POST);
    include 'dataProc.php';
    //Fetch user based from email and password
    $sql = mysqli_query($conn,"SELECT * FROM user WHERE emailAddress='$email' AND passWord='$pass'");
    $row  = mysqli_fetch_array($sql);

    if(is_array($row) && ($email == $row['emailAddress'] && $pass == $row['passWord']))
    {
        //Save data to session
        $_SESSION["id"] = $row['userId'];
        $_SESSION["email"] = $row['emailAddress'];
        $_SESSION["first_name"] = $row['firstName'];
        $_SESSION["last_name"] = $row['lastName'];
        $_SESSION["address"] = $row['address'];
        $_SESSION["birth_date"] = $row['birthDate'];

        //Redirect to dashboard
        if ($row['type'] == 'w') {
            header("Location: dashboard_worker.php");
        } else {
            header("Location: dashboard_employer.php");
        }   
    }
    else
    {
        //Redirect back to login page
        echo "<script >";
        echo "alert('Invalid Email or Password.');
        window.location = 'login.php';

        ";
        echo "</script>";
    }
?>