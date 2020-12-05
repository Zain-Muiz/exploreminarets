<?php
session_start();
error_reporting(0);
include('config.php');
if(isset($_POST['CHANGE']))
{
$email=$_SESSION['alogin'];
$pass1=$_POST['pass'];
$pass2=$_POST['newpass'];
$temp = strlen($pass1);
//echo "<script type='text/javascript'> alert('$temp')  ; </script>";
if(!($pass1==$pass2) || $temp == 0){
    echo "<script type='text/javascript'> alert('Not match');  document.location = 'changepass.php'; </script>";
}else{
    $pass=$pass1;
    $flag=1;
    $sql ="UPDATE `users` SET `pass`=:pass WHERE `useremail`=:id";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':pass', $pass, PDO::PARAM_STR);
    $query-> bindParam(':id', $email, PDO::PARAM_STR);
    $query->execute();
    $sql ="UPDATE `users` SET `flag`=:flag WHERE `useremail`=:id";
    if ( ! $sql ) {
      print_r( $dbh->errorInfo() );
  }
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':flag', $flag, PDO::PARAM_INT);
    $query-> bindParam(':id', $email, PDO::PARAM_STR);
    $check= $query->execute();
    if($check)
    {
        
      echo "<script type='text/javascript'> alert('Success');  document.location = 'questions.php'; </script>";
    }
    else
    {
        //print_r( $query->errorInfo() );
    echo "Something went wrong. Please fill and try again";
    }
    // $sql ="UPDATE `userlogin` SET `password`=:pass WHERE `useremail`=:id";
    // $query= $dbh -> prepare($sql);
    // $query-> bindParam(':pass', $pass1, PDO::PARAM_INT);
    // $query-> bindParam(':id', $email, PDO::PARAM_STR);
    // $query->execute();
    //echo "<script type='text/javascript'> alert('Success');  document.location = 'questions.php'; </script>";
    }

}
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> ISTE- Explore the minarets</title>
  <!-- <link rel="stylesheet" href="stylelogin.css"> -->
  <link rel="stylesheet" a href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Archivo+Black&display=swap" rel="stylesheet">
  <style>
      body{
          /* background:black; */
      }
   
    @media only screen and (min-width: 650px) {
      body{
      background-image:url('02.jpg');

    }
}
  </style>
</head>

<body>
  <div class="container" >



    <div class="row">


      <div class=" text-center contain ">



        <div class="row mx-auto" style="margin-top:-7vmin;">
          <div class="col-12 mx-auto">
            <img src="GEARFINAL.png" class="img-responsive img-thumbnail  mb-2 mx-auto d-block"
              style="border-radius: 20%; width:30vmin;height:30vmin; margin-top:-8">
    
          </div>
        </div>
    
        <div class="row mx-auto">
    
    
          <div class="col-12 mx-auto">
            <form style="background-color:white"  method="POST">
              <div class="row mx-auto">
                <div class="col-12 mx-auto">
                <label> <br>New Password </label>
                  <div class="form-input rounded">
                    
                    <input type="password" id="input-1" class="rounded mx-auto" style="width:80vmin" id="email" name="pass"
                      placeholder="New Password" />
                  </div>
                </div>
              </div>
    
              <div class="row mx-auto">
                <div class="col-12 mx-auto">
                <label> Re Enter Password </label>
                  <div class="form-input">
                  
                    <input type="password" id="input-2" class="rounded mx-auto" style="width:80vmin;" name="newpass"
                      placeholder="Re-Password" id="Password" />
    
                  </div>
                </div>
              </div>
    
              <input id="subbt" type="submit" name="CHANGE" class="btn-login btn btn-success" style = "background-color:#141E30;"/>
            </form>
          </div>
        </div>
      </div>


    </div>
  </div>
 

  <!-- <script>


    function checkid() {
      var at = document.getElementById("email").value.indexOf("@tkmce.ac.in");
      console.log(at)
      submitOK = "true";

      if (at == -1) {
        alert("Not a valid e-mail!");
        document.getElementById("subbt").name = "";
        location.reload()
        submitOK = "false";
      }

      if (submitOK == "false") {
        return false;
      }
    }
  </script> -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
    integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
    crossorigin="anonymous"></script>
</body>

</html>
