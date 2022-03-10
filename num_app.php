<?php
    session_start();
    include 'dataProc.php';
    //Get all jobs that has been posted by the employer
    $querJobs = mysqli_query($conn, "SELECT * FROM job_board WHERE jobPoster='".$_SESSION["id"]."'");
    
?>

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body style="background-color:whitesmoke">
        <?php
            if (mysqli_num_rows($querJobs) > 0){
                while ($rows = mysqli_fetch_assoc($querJobs)){

                    $getC = mysqli_query($conn, "SELECT COUNT(*) as \"counter\" FROM app_proc WHERE jobId='".$rows["jobId"]."'");
                    $resC = mysqli_fetch_array($getC);
                    echo "<div class=\"d-flex bd-highlight\">
                    <div class=\"p-2  border border-dark flex-grow-1 bd-highlight fs-5\">".$rows['jobTitle']."</div>
                    <div class=\"p-2  border border-dark bd-highlight fs-5\">Count: ".$resC['counter']."</div>
                </div>";
                };
            } else {
                echo "No Jobs Posted Yet.";
            } 
        ?>
        
    </body>
</html>