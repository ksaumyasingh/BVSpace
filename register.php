<?php
require_once "config.php";

if(isset($_POST['username'])){
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $cpassword=$_POST['cpassword'];
    //$cpassword="";
    $email=$_POST['email'];
    $startYear = date('Y-m-d', strtotime($_POST['startYear']));
    $endYear = date('Y-m-d', strtotime($_POST['endYear']));
    $linkedin = filter_input(INPUT_POST, 'linkedin', FILTER_SANITIZE_SPECIAL_CHARS);  //$_POST['linkedin'];
    $summerIntern = $_POST['summerIntern'];
    $UIL= $_POST['UIL'];
    $placement  = $_POST['placement'];

    // $sql = "INSERT INTO users (username, password, email,startYear, endYear, linkedin, summerIntern, UIL, placement) VALUES ('$username' , '$password' ,'$email' , 
    //        '$startYear', '$endYear','$linkedin' , '$summerIntern' , '$UIL' , '$placement'  )";

    // if($conn->query($sql) == true){
    //                     //flag for successfully inserted
    //                     echo "successfully inserted";
    // } 
    // else{
    //          echo "ERROR : $sql <br> $conn->error";
    // }  


    if ($_POST['password'] ==  $_POST['cpassword']) {
      $sql = "SELECT * FROM users WHERE username='$username'";
      $result = mysqli_query($conn, $sql);
      if ($result->num_rows === 0) {
              $sql = "INSERT INTO users (username, password, email,startYear, endYear, linkedin, summerIntern, UIL, placement) VALUES ('$username' , '$password' ,'$email' , 
                      '$startYear', '$endYear','$linkedin' , '$summerIntern' , '$UIL' , '$placement'  )";
              $result = mysqli_query($conn, $sql);
        if ($result) {
          echo "<script>alert('Wow! User Registration Completed.')</script>";
          header("location: login.php");
         
        } else {
          echo "<script>alert('Woops! Something Went Wrong.')</script>";
        }
      } else {	
        echo "<script>alert('Woops! Username Already Exists.')</script>";
      }
      
    } else {
      echo "<script>alert('Password Not Matched.')</script>";
    }

//close the database connection
mysqli_close($conn);
    }


?>







<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link
      href="https://fonts.googleapis.com/css2?family=Bitter&family=Merriweather:wght@300&family=Pathway+Gothic+One&display=swap"
      rel="stylesheet"
    />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600;1,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>PHP login system!</title>
  </head>
  <body>
  <?php include('header.php');?>

<div class="container" style="margin-top:4%">
<h3>Please Register Here:</h3>
<hr>
<form action="" method="post">
  <!-- <div class="form-row"> -->
    <div class="form-group col-md-6">
      <label for="inputUsername">Username</label>
      <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Username">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name ="password" id="inputPassword4" placeholder="Password">
    </div>
  <!-- </div> -->
  <div class="form-group col-md-6">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" class="form-control" name ="cpassword" id="inputPassword" placeholder="Confirm Password">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="text" class="form-control" name="email" id="inputEmail4" placeholder="Email">
    </div>
  <div class="form-group col-md-6">
    <label for="inputstartyear">Start Year of BTech</label>
    <input type="date" class="form-control" name="startYear" id="inputstartyear" placeholder="Start Year of BTech">
  </div>
  <div class="form-group col-md-6">
    <label for="inputendyear">End Year of BTech</label>
    <input type="date" class="form-control" name="endYear" id="inputendyear" placeholder="Start Year of BTech">
  </div>
  <div class="form-group col-md-6">
      <label for="inputlinkedin">Enter Linkedin ID</label>
      <input type="text" class="form-control" name ="linkedin" id="linkedin" placeholder="Linkedin">
    </div>
    <div class="form-group col-md-6">
      <label for="inputSummerIntern">Summer Internship</label>
      <input type="text" class="form-control" name ="summerIntern" id="summerIntern" placeholder="Summer Internship">
    </div>
    <div class="form-group col-md-6">
      <label for="inputUIL">UIL</label>
      <input type="text" class="form-control" name ="UIL" id="UIL" placeholder="UIL">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPlacement">Placement Company</label>
      <input type="text" class="form-control" name ="placement" id="placement" placeholder="Placement Company">
    </div>
  
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <?php include('footer.php');?>
  </body>
</html>
