<?php

require_once "config.php";

session_start();

error_reporting(0);
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['loggedin'] =true;
		header("Location: index.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}
// echo "#"; 
//    if(isset($_POST['submit'])){
//       $email=$_POST['email'];
//       $password=$_POST['password'];

//       echo "5";

//         $con = mysqli_connect("localhost","root","","bvspace");
//         echo "7";
//         $selectquery= "SELECT * FROM users WHERE email=$email";
//         $query= mysqli_query($con, $selectquery);
//         $nums= mysqli_num_rows($query);
//         echo "6";
//         //echo $nums."<br>";
//         while($res=mysqli_fetch_assoc($query))
//         {
//           $pass=$res["password"];
//             if($password == $pass ){
//               echo "<script>alert('User Logged into bvspace')</script>";
//               header("location: index.php");
//             }else{
//               echo "<script>alert('oopsy! password incorrect')</script>";
//               header("location: login.php");
//             }
          
//         }
//         echo "<script>alert('Oopsy! First Register yourself.')</script>";
//         header("location: login.php");
//       echo "4";
//     }
 ?>




 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600;1,800&display=swap" rel="stylesheet">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>PHP login system!</title>
  </head>
  <body>
  <?php include('header.php');?>

<div class="container" style="margin-top:4%">
<h3>Please Login Here:</h3>
<hr>

<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Enter Email:</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Enter Password:</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" required>
  </div>
  <div class="input-group">
				<button name="submit" class="btn btn-primary">Login</button>
			</div>
  
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
