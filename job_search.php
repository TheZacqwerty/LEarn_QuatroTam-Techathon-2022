<?php
session_start();
?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Job Search</title>
  <link rel="icon" href="./imgs/Logo (normal).png">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <style>
    .body {
      background-color: whitesmoke;
    }

    .rating {
      height: 20%;
    }

    .jobList {
      height: 67%;
    }

    .jobEndorse {
      height: 90%;
    }

    .maxW {
      width: 100%;
      background-color: whitesmoke;
    }

    .h90 {
      height: 90%;
    }

    .card {
      background-color: #99edc3;
    }

    .navbar {
      background-image: linear-gradient(to right, #6db9ef, #7ce08a);
    }

    .btn {
      background-color: #fff017;
      color: black;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    .navbar-brand {
      color: rgb(6, 168, 6);
      font-size: 2rem;
    }

    .nav-link {
      color: whitesmoke;
    }

    .nav-link:hover {
      color: rgb(245, 245, 80);
      transition: 0.3s;
    }

    .nav-item {
      font-weight: 400;
      padding-left: 35px;
      color: rgb(6, 168, 6);
    }

    .content {
      height: 60vh;
    }

    .form-check-input:checked {
      background-color: rgb(25, 197, 25);
      border-color: rgb(25, 197, 25);
    }

    .btn-login {
      border: 0em;
      background-color: rgb(6, 168, 6);
      border-radius: 100px;
      width: 480px;
      height: 45px;

    }

    .btn-login:hover {
      background-color: rgb(245, 245, 80);
      transition: all 0.4s;

    }

    .main {
      background-size: cover;
      min-height: 95vh;
      width: 100%;
    }

    .btn-signup {
      width: 130px;
      height: 52px;
      font-weight: 700;
      border: 2px solid whitesmoke;
      outline: none;
      background-color: transparent;
      color: whitesmoke;
      border-radius: 100px;
    }

    .btn-signup:hover {
      border: none;
      outline: none;
      color: rgb(6, 168, 6);
      background-color: rgb(245, 245, 80);
      transition: all 0.4s;

    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="./dashboard_worker.php"><img src="./imgs/Logo (Sage sized).png" style="width: 75px; height: 70px;"></a>
      <button class="navbar-toggler navbar-light bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto mb-2 mb-lg-0">
          <li class="nav-item">
              <a class="nav-link" href="./dashboard_worker.php" style="font-size:x-large">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./job_search.php" style="font-size:x-large">Find a Job</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="./dashboard_uploadfiles.php" style="font-size:x-large">Edit Profile</a>
          </li>
        </ul>
        <form action="./logout.php" class="d-flex">
          <button class="btn-signup mx-2">Log Out</button>
        </form>

      </div>
    </div>
  </nav>

  <div class="container-fluid main d-flex flex-column align-items-center" style="width: 100%;">

    <h1 class="my-5">Jobs Available Just For You</h1>

    <div class="my-3 w-50 h-auto">
      <?php
        include 'dataProc.php';
        //Query out all jobs that the worker hasn't applied yet
        $jobReq = mysqli_query($conn, "SELECT * FROM job_board");

        if (mysqli_num_rows($jobReq) > 1){
          while ($row = mysqli_fetch_assoc($jobReq)){

            //Fetch Jobs applied already
            $getJ = mysqli_query($conn, "SELECT jobId FROM app_proc WHERE workerId = ".$_SESSION["id"]." ");
            
            //Skip if job has been applied by worker
            $isSkip = false;
            while ($check = mysqli_fetch_assoc($getJ)){
              if (is_array($check) && $check['jobId'] == $row['jobId']) $isSkip = true;
            }
            
            if ($isSkip) continue;

            //Fetch Employer
            $getEmp = mysqli_query($conn, "SELECT firstName, lastName FROM user WHERE userId = '".$row['jobPoster']."' ");
            $resEmp = mysqli_fetch_array($getEmp);

            echo "<div class=\"card my-2 border-dark d-flex flex-row border-3 h-auto\" >
            <div class=\"p-3\" style=\"width: 90%; height: 100%;\">
            <h3 class=\"my-2\">".$row['jobTitle']." - ".$resEmp['firstName']." ".$resEmp['lastName']."</h3>
            <h6 class=\"mx-2\">₱".$row['salary']."</h6>
            <h6 class=\"mx-2\">".$row['jobDesc']."</h6>
            </div>
            <div class=\"h-auto w-25 float-right\">
            <form action=\"./job_application.php\" method=\"post\">
            <input class=\"btn btn-warning h-100 w-100\" type=\"submit\" value=\"Apply\" style=\"float: right;\">
            <input name=\"jobVal\" type=\"hidden\" value=\"".$row['jobId']."\">
            </form>
            </div>
            </div>";
          };
        } else {
          echo "<h3>No Jobs Today :'></h3>";
        }

        
      ?>
    </div>
  </div>
</body>

</html>