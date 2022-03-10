<?php
    session_start();
    extract($_POST);
    include 'dataProc.php';
    
    //Fetch if email already exists in database
    $searchReq = mysqli_query($conn, "SELECT emailAddress FROM user WHERE emailAddress='$email'");
    $row = mysqli_fetch_array($searchReq);
    
    //Check if email already exists then deny signup
    if (is_array($row)){
        echo "<script >";
        echo "alert('Email has already been registered!');
        window.location = 'signup.php';";
        echo "</script>";
    } else {
        //Check if password and confirm password are the same
        if ($conPassword != $passWord){
            echo "<script >";
            echo "alert('Passwords does not match!');
            window.location = 'signup.php';";
            echo "</script>";
        } else {
            //Insert new user in database
            $newUser = mysqli_query($conn,"INSERT INTO user VALUES(NULL, '".$email."', '".$passWord."', '".$fName."', '".$lName."', '".$address."', '".$birthDate."', '".$userType."')");

            //Fetch the new user id
            $getNewUser = mysqli_query($conn, "SELECT userId FROM user WHERE emailAddress='$email'");
            $userRow = mysqli_fetch_array($getNewUser);

            //Save data to session
            $_SESSION["id"] = $userRow['userId'];
            $_SESSION["email"] = $email;
            $_SESSION["first_name"] = $fName;
            $_SESSION["last_name"] = $lName;
            $_SESSION["address"] = $address;
            $_SESSION["birth_date"] = $birthDate;

            //Append new user to either worker or employer depending on the type and redirect to their home page
            if ($userType == 'w') {
                $appendWorker = mysqli_query($conn,"INSERT INTO worker VALUES('".$userRow['userId']."', '0.0', NULL, NULL)");
                header("Location: dashboard_worker.php");
            } else if ($userType == 'e') {
                $appendEmp = mysqli_query($conn,"INSERT INTO employer VALUES('".$userRow['userId']."', NULL)");
                header("Location: dashboard_employer.php");
            }
        }
    }
?>