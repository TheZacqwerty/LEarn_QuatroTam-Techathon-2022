<?php
  session_start();
?>

<html>
    <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Apply For A Job</title>
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

            <h1 class="my-5">Apply For A Job</h1>
            <div class="card my-3 p-4 d-flex align-items-start border-dark border-3" style="width: 70%; height: 90%;">

                <?php
                  include 'dataProc.php';

                  //Fetch Job title and employer
                  $getJ = mysqli_query($conn, "SELECT * FROM job_board WHERE jobId=".$_POST["jobVal"]."");
                  $resJ = mysqli_fetch_array($getJ);
                  $getEmp = mysqli_query($conn, "SELECT firstName, lastName FROM user WHERE userId = '".$resJ['jobPoster']."' ");
                  $resEmp = mysqli_fetch_array($getEmp);

                  echo "<h3 class=\"my-3\">".$resJ['jobTitle']." - ".$resEmp['firstName']." ".$resEmp['lastName']."</h3>
                  <input type=\"hidden\" name=\"jobID\" value=\"".$_POST["jobVal"]."\" form=\"apply\">";
                ?>
                
                <h6 class="my-2">Reason for applying:</h6>
                <form action="job_apply_process.php" method="post" id="apply"> 
                    <textarea class="my-2 border-dark border-2" name="reason" cols="170" rows="15" style="background-color:whitesmoke; resize:none;" required></textarea>
                    <br>
                    <input class="mt-4  my-2 btn btn-primary border-dark border-2" style="background-color: #ffff9f;" type="submit" value="Apply">
                    
                    <h6 class="my-2">Your Resume and Valid ID will also be sent upon applying.</h6>
                </form>
            </div>
        </div>
    </body>
</html>