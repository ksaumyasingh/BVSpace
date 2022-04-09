<?php
session_start();
if(isset($_SESSION['id']))
{
    $question=filter_input(INPUT_POST, 'question', FILTER_SANITIZE_SPECIAL_CHARS);
    if(isset($question)){
        $server = "localhost";
        $username = "root";
        $password = "";

        $con = mysqli_connect($server, $username, $password);

        if(!$con){
            die("connection to this database failed due to".mysqli_connect_error());
        }

            //$view_times_no = filter_input(INPUT_POST, 'view_times_no', FILTER_VALIDATE_INT);
            $id = $_SESSION['id'];//filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $sql="INSERT INTO `bvspace`.`question` (`ques`, `view_times_no` ,`date_posted`,`id`) VALUES ('$question' , 0 , current_timestamp(),'$id');";


        /*$question=filter_input(INPUT_POST, 'question', FILTER_SANITIZE_SPECIAL_CHARS);
        //$clean = filter_input(INPUT_POST, 'clean', FILTER_SANITIZE_SPECIAL_CHARS);
        $sql="INSERT INTO `quora`.`question` (`ques`, `clean`, `dd`) VALUES ('$question', 'null' , current_timestamp());";*/
        //echo $sql;

        if($con->query($sql) == true){
            //echo "Successfully inserted";
            echo '<script>alert("Question posted Successfully"); window.location.href="display.php"</script>';
        }
        else{
            echo "ERROR:$sql <br> $conn->error";
        }

        $con->close();
    }

?>
<html>
    <head>
<!--        <title>Q & A</title>-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600;1,800&display=swap" rel="stylesheet">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<!--        <title>Q & A</title>-->
    </head>
    <body>
    <div style="background: -moz-linear-gradient(top,  #1e5799 0%, #2989d8 50%, #207cca 51%, #7db9e8 100%); 
background: -webkit-linear-gradient(top,  #1e5799 0%,#2989d8 50%,#207cca 51%,#7db9e8 100%); 
background: linear-gradient(to bottom,  #1e5799 0%,#2989d8 50%,#207cca 51%,#7db9e8 100%); 
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e5799', endColorstr='#7db9e8',GradientType=0 );">
        <?php include('header.php');?>
        <div class="container" style="margin-top:4%">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-4">
                            <div class="card-header">
                             <h1>Q & A</h1>  
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-7">                                   
                                        <form action="question.php" method="post">
<!--                                            <div><h4>Post Question</h4></div>-->
                                            <div class="input-group mb-3">
                                                <textarea name="question" id="question" cols="30" rows="10" class="form-control" placeholder="Ask your question here..."></textarea>
                                                <input type="submit" value="POST" name="post" class="btn btn-primary"/>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--        <form action="question.php" method="post">
        <div><h1>Q & A</h1></div>
       <textarea name="question" id="question" cols="30" rows="10" placeholder="Ask your question here..."></textarea>
       <input type="submit" value="POST" name="post" />
        </form>-->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <?php include('footer.php');?>
                    
                    </body>
</html>  
<?php 
}
else{
    echo '<script>alert("Session Expired! login to continue!"); window.location.href="index.php"</script>';
}
?>