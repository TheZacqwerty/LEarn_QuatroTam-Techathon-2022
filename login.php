<?php
    session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="./imgs/Logo (normal).png">
    <title>Log in - LEarn</title>
    <style>
        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            
        }
        .navbar-brand{
            color:rgb(6, 168, 6);
            font-size: 2rem;
        }
        .nav-link{
            color: rgb(6, 168, 6);
        }
        .nav-link:hover{
            color: rgb(245, 245, 80);
            transition: 0.3s;
        }
        .nav-item{
            font-weight: 500;
            padding-left: 35px;
            color: rgb(6, 168, 6);
        }
        .content{
            height: 60vh;
        }
        .form-check-input:checked{
            background-color: rgb(25, 197, 25);
            border-color: rgb(25, 197, 25);
        }
        .btn-login{
            border: 0em;
            background-color: rgb(6, 168, 6);
            border-radius: 100px;
            width: 480px;
            height: 45px;   
            
        }
       
        .btn-login:hover{
            background-color: rgb(245, 245, 80);
            transition: all 0.4s;

        }

        .main{
            background: url(./imgs/pexels-ann-poan-5797912.jpg);
            background-size: cover;
            min-height: 95vh;
            width: 100%;
        }
        .btn-signup{
          width: 130px;
          height: 52px;
          border: 2px solid rgb(6, 168, 6);
          outline: none;
          background-color: transparent;
          color: rgb(6, 168, 6);
          border-radius: 100px  ;
        }
        .btn-signup:hover{
          border: none;
          outline: none;
          color: white;
          background-color: rgb(245, 245, 80);
          transition: all 0.4s;
            
        }
       
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="./index.html"><img src="./imgs/Logo (Sage sized).png" style="width: 75px; height: 70px;"></a>
          <button class="navbar-toggler navbar-light bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="#">Find a Job</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Company</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Career Talk</a>
              </li>
            </ul>
            <form action="./signup.php" class="d-flex">
                <button class="btn-signup mx-2">Sign Up</button>
            </form>
           
          </div>
        </div>
    </nav>

    <section class="main py-5">
        <div class="container py-5">
            <div class="row content d-flex justify-content-center align-items-center">
                <div class="col-md-5">
                    <div class="box shadow bg-white p-4">
                        <h3 class="mb-4 text-center fs-1">Login to your account</h3>
                        <form method="post" action="loginProc.php" class="mb-3">
                            <div class="form-floating mb-3">
                                <input name="email" type="email" class="form-control rounded-5" id="floatingInput" placeholder="Email">
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="pass" type="password" class="form-control rounded-5" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="d-flex gap-2 mb-3">
                                <input type="submit"  class="btn-login" style="font-size: 15px; color: white" value="Log In">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    

   

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>