<?php
    //Connect to database
    $url='localhost';
    $username='root';
    $password='';
    $conn=mysqli_connect($url,$username,$password,"learndb");
    if(!$conn){
        die('Could not Connect My Sql:');
    }
?>