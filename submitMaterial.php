<?php session_start();
if(isset($_SESSION['id']))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600;1,800&display=swap" rel="stylesheet">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>

<style>

/* Search Bar */
   

/* Entire body */
    html {
    height: 100%;
    }
    body {
    margin:0;
    padding:0;
    font-family: sans-serif;
    background: linear-gradient(#141e30, #243b55);
    }

    .login-box {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 400px;
    padding: 40px;
    transform: translate(-50%, -50%);
    background: rgba(0,0,0,.5);
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0,0,0,.6);
    border-radius: 10px;
    }

    .login-box h2 {
    margin: 0 0 30px;
    padding: 0;
    color: #fff;
    text-align: center;
    }

    .login-box .user-box {
    position: relative;
    }

    .login-box .user-box input {
    width: 100%;
    padding: 10px 0;
    font-size: 16px;
    color: #fff;
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid #fff;
    outline: none;
    background: transparent;
    }
    .login-box .user-box label {
    position: absolute;
    top:0;
    left: 0;
    padding: 10px 0;
    font-size: 16px;
    color: #fff;
    pointer-events: none;
    transition: .5s;
    }

    .login-box .user-box input:focus ~ label,
    .login-box .user-box input:valid ~ label {
    top: -20px;
    left: 0;
    color: #03e9f4;
    font-size: 12px;
    }

    .login-box form a {
    position: relative;
    display: inline-block;
    padding: 10px 20px;
    color: #03e9f4;
    font-size: 16px;
    text-decoration: none;
    text-transform: uppercase;
    overflow: hidden;
    transition: .5s;
    margin-top: 40px;
    letter-spacing: 4px
    }

    .login-box a:hover {
    background: #03e9f4;
    color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 5px #03e9f4,
                0 0 25px #03e9f4,
                0 0 50px #03e9f4,
                0 0 100px #03e9f4;
    }

    .login-box a span {
    position: absolute;
    display: block;
    }

    .login-box a span:nth-child(1) {
    top: 0;
    left: -100%;
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg, transparent, #03e9f4);
    animation: btn-anim1 1s linear infinite;
    }

    @keyframes btn-anim1 {
    0% {
        left: -100%;
    }
    50%,100% {
        left: 100%;
    }
    }

    .login-box a span:nth-child(2) {
    top: -100%;
    right: 0;
    width: 2px;
    height: 100%;
    background: linear-gradient(180deg, transparent, #03e9f4);
    animation: btn-anim2 1s linear infinite;
    animation-delay: .25s
    }

    @keyframes btn-anim2 {
    0% {
        top: -100%;
    }
    50%,100% {
        top: 100%;
    }
    }

    .login-box a span:nth-child(3) {
    bottom: 0;
    right: -100%;
    width: 100%;
    height: 2px;
    background: linear-gradient(270deg, transparent, #03e9f4);
    animation: btn-anim3 1s linear infinite;
    animation-delay: .5s
    }

    @keyframes btn-anim3 {
    0% {
        right: -100%;
    }
    50%,100% {
        right: 100%;
    }
    }

    .login-box a span:nth-child(4) {
    bottom: -100%;
    left: 0;
    width: 2px;
    height: 100%;
    background: linear-gradient(360deg, transparent, #03e9f4);
    animation: btn-anim4 1s linear infinite;
    animation-delay: .75s
    }

    @keyframes btn-anim4 {
    0% {
        bottom: -100%;
    }
    50%,100% {
        bottom: 100%;
    }
    }
    .custom-file-input::-webkit-file-upload-button {
    animation: btn-anim1 1s linear infinite;
    visibility: hidden;
    }
    .custom-file-input::before {
    content: 'SELECT FILE';
    display: inline-block;
    color: #03e9f4;
    border-radius: 3px;
    padding: 5px 8px;
    outline: none;
    white-space: nowrap;
    cursor: pointer;
    }

</style>
</head>
<body>
<?php include('header.php');?>
    <div class="container">
        <div class="login-box">
            <h2>Your File Here</h2>
            <form action = "upload.php" method = "POST" enctype="multipart/form-data">
              <div class="user-box">
                <input type="text" name="username" placeholder=""   type="text" placeholder=" " required ></input>
                <label>Your Name</label>
              </div>
              <!-- <div class="user-box">
                <input type="date" name="date" placeholder=""   type="text" placeholder=" " ></input>
                <label>Date</label>
              </div> -->
              <div class="user-box">
                <input type="text" name="subject" placeholder=""   type="text" required ></input>
                <label>Subject</label>
              </div>
              <div class="user-box">
                <input type="text" name="title" placeholder=""  class="input" type="text" required ></input>
                <label>Title</label>
              </div>
              <input type="file" name="file" class="custom-file-input" type="text" placeholder="" required >
              
              <a href="#"  style = "margin-left:100px; margin-right: 100px; padding-left:30px; padding-right:30px">
                <input type ="submit" name = "submit" style = "color: #03e9f4;padding: 0;border: none;background: none;text-decoration: none;text-transform: uppercase;overflow: hidden;transition: .5s;letter-spacing: 4px"></input>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
              </a>
            </form>
          </div>
</div>
<div style="text-align: center;max-height: 100px;margin-top: 620px;">
    <a href ="previewMaterial.php" class="displayDocs" style = "color: #03e9f4;border: none;text-decoration: none;overflow: hidden;transition: .5s;letter-spacing: 8px;">
        View Uploaded Documents
    </a>
</div>
<?php include('footer.php');?>
</body>
</html>
<?php 
}
else{
    echo '<script>alert("Session Expired! login to continue!"); window.location.href="index.php"</script>';
}
?>