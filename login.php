<?php
session_start();
error_reporting(0);
include('config.php');
if(isset($_POST['LOGIN']))
{
$email=$_POST['user'];
$password=$_POST['password'];
$sql ="SELECT * FROM users WHERE useremail=:email and pass=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
      $_SESSION['alogin']=$_POST['user'];
      $_SESSION['name']=$result->name;
      echo "<script type='text/javascript'> document.location = 'questions.php'; </script>";
    }
  

 else{
  
  echo "<script>alert('Invalid Details'); document.location = 'login.php'; </script>";

}};



?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Login Page</title>
        <link rel="stylesheet" href="style_login.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" style="color: #66FCF1;  font-family: 'Courier New', Courier, monospace;" href="#">EXPLORE THE MINARETS</a>
                <button class="navbar-toggler" style="background: #111; box-shadow: 0 0 5px 3px #66FCF1;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                      <a class="nav-link" style="color: #fff;" href="home.html">Home</a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" style="color: #fff;" href="about.html">About</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" style="color: #fff;" href="http://istetkmce.in/contact.php">Contact us</a>
                    </li>
                  </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row content">
                <div class="col-md-6 mb-3">
                    <img src="2.jpg" class="img-fluid" alt="image">
                </div>
                <div class="col-md-6">
                    <h3 class="signin-text mb-3" style="font-family: 'Courier New', Courier, monospace;">Log In</h3>
                    <form method= "post">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="user" class="form-control" style="background-color: rgba(0, 0, 0, 0.85) ; border: 1px solid #66FCF1 !important; color: #fff;"> 
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" style="background-color: rgba(0, 0, 0, 0.85) ; border: 1px solid #66FCF1 !important; color: #fff;">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="checkbox" class="for-check-input" id="checkbox">
                            <label for="checkbox" class="form-check-label">I am not a robot.</label>
                            <button  type="submit"  name="LOGIN" class="btn btn-success" style="background:rgba(0, 0, 0, 0.85); border: 1px solid #66fcf1; border-radius: 0;">Login</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>






        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>
