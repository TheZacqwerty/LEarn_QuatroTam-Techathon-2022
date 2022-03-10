<?php
    session_start();
    include 'dataProc.php';
    //Get all jobs that has been posted by the employer
    $querJobs = mysqli_query($conn, "SELECT * FROM job_board");
    
?>

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <base target="_parent">
    </head>
    <body style="background-color:whitesmoke">
        <?php
            if (mysqli_num_rows($querJobs) > 1){
                while ($row = mysqli_fetch_assoc($querJobs)){
                    
                    //This code is to post jobs that applicants have not applied yet.

                    //Fetch Jobs applied already
                    $getJ = mysqli_query($conn, "SELECT jobId FROM app_proc WHERE workerId = ".$_SESSION["id"]." ");
                    
                    //Skip if job has been applied by worker
                    $isSkip = false;
                    while ($check = mysqli_fetch_assoc($getJ)){
                    if (is_array($check) && $check['jobId'] == $row['jobId']) $isSkip = true;
                    }
                    
                    if ($isSkip) continue;

                    $getEmp = mysqli_query($conn, "SELECT firstName, lastName FROM user WHERE userId = '".$row['jobPoster']."' ");
                    $resEmp = mysqli_fetch_array($getEmp);

                    echo "<div class=\"d-flex bd-highlight\">
                    <div class=\"p-2  border border-dark flex-grow-1 bd-highlight fs-5\">".$row['jobTitle']."</div>
                    <div class=\"p-2  border border-dark bd-highlight fs-5\">".$resEmp['firstName']." ".$resEmp['lastName']."</div>
                    <div class=\"p-2  border border-dark bd-highlight fs-5\"> ₱".$row['salary']."</div>
                    <div class=\"border border-dark bd-highlight fs-5\">
                    <form action=\"./job_application.php\" method=\"post\">
                    <input class=\"btn btn-warning h-100 w-100\" type=\"submit\" value=\"Apply\" style=\"float: right;\">
                    <input name=\"jobVal\" type=\"hidden\" value=\"".$row['jobId']."\">
                    </form>
                    </div>
                </div>";
                };
            } else {
                echo "No Jobs Posted Yet.";
            } 
        ?>
        
    </body>
</html>