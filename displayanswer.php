<?php
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
?>
<?php
session_start();
if(isset($_SESSION['id']))
{
?>
<html>
    <head>
        <title>Q & A</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600;1,800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script>
         
            function click() {
               alert ("answer submitted!");
               document.write ("answer submitted!");
            }
        
      </script> 
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
<!--                                        <form action="question.php" method="post">
                                            <div><h4>Post Question</h4></div>
                                            <div class="input-group mb-3">
                                                <textarea name="question" id="question" cols="30" rows="10" class="form-control" placeholder="Ask your question here..."></textarea>
                                                <input type="submit" value="POST" name="post" class="btn btn-primary"/>
                                        </form>-->
                                        <form action="answer.php" method="post">
                                        <textarea name="answer" id="answer" cols="30" rows="10" class="form-control" placeholder="Type your answer here..."></textarea>
                                        <?php $qId= $_GET['value'];    echo '<input type="hidden" value="'.$qId.'" id="questionID" name="questionID"/>' ?>

                                       <input type="submit" value="POST" onclick = "click();" name="post" class="btn btn-primary"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--        <form action="answer.php" method="post">
        <div><h1>Q & A</h1></div>
        <textarea name="answer" id="answer" cols="30" rows="10" placeholder="Type your answer here..."></textarea>
        //<?php// $qId= $_GET['value'];    echo '<input type="hidden" value="'.$qId.'" id="questionID" name="questionID"/>' ?>
       
       <input type="submit" value="POST" onclick = "click();" name="post" />
        </form>-->
<!--    </body>
</html>

<html>
    <head>
        <title>Q & A</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>   
        <br><br>
        <table border="2">
            <thead>
                <tr>
                    <th>Question_Id</th>
                    <th>Question</th>
                    <th>Date</th>
                    <th>Upvote</th>
                </tr>
            </thead>-->
        <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Question_Id</th>
                                    <th>Question</th>
                                    <th>Date</th>
                                    <th>Upvote</th>
                                </tr>
                            </thead>
                            <tbody>
        <h3><?php
                    $value= $_GET['value'];
                    $con = mysqli_connect("localhost", "root", "", "bvspace");
                    $selectquery3= "SELECT * FROM question WHERE ques_id=$value";
                    $query3= mysqli_query($con, $selectquery3);
                    while($res3=mysqli_fetch_assoc($query3))
                    {
                        $view_times=$res3["view_times_no"]+1;
                        $sql3="update question set view_times_no=$view_times where ques_id=$value";
                        //echo $sql3;
                        if($con->query($sql3) == true){
                            //echo "Successfully inserted";

                        }
                        else{
                            echo "ERROR:$sql <br> $conn->error";
                        }
                    }
                            
                    $selectquery= "SELECT * FROM answer WHERE ques_id=$value ORDER BY upvote DESC ";
                    $query= mysqli_query($con, $selectquery);
                    while($res=mysqli_fetch_assoc($query))
                    {
                        session_start();
                        $email= $_SESSION['emailId'];
                        ?>
                        <tr>
                            <th> <?php  echo $res["ques_id"] ?></th>
                            <th> <?php  echo $res["ans"] ?></th>
                            <?php $id=$res["ans_id"]?>
                            <?php $upvote=$res["upvote"]?>
                            <!--<script type="text/javascript">
                            
                            var timesClicked=<?php echo $res["upvote"]?>;

                            function btnClick(){
                            timesClicked ++;
                            document.getElementById('timesClicked').innerHTML = timesClicked;
                            <?php //$res["upvote"] = "<script>document.writeln(timesClicked);</script>";?>
                            return true;
                            }
                            </script>
                            <center><span id="timesClicked"><?php// echo $res["upvote"]?></span></center>
                            <button type="button" class="btn btn-default" onclick="javascript:btnClick()">Like me!</button>-->
                            
                            <th> <?php  echo $res["date_posted"] ?></th>
                            <th><?php  echo $res["upvote"];?>
                                 <form action="upvote.php" method="post">
                                <?php echo '<input type="hidden" value="'.$id.'" id="answerID" name="answerID"/>' ?>
                                <?php echo '<input type="hidden" value="'.$upvote.'" id="up" name="up"/>' ?>
                                <input type="submit" value="Like me!" name="post" class="btn btn-primary"/>
                                </form>   
                             
                             </th>
                        </tr>
                        <?php
                    }
                    ?><?php
                    $selectquery1= "SELECT * FROM question WHERE ques_id=$value";
                    $query1= mysqli_query($con, $selectquery1);
                    $res1=mysqli_fetch_assoc($query1);
                    //echo $res1["view_times_no"];
                    $res1["view_times_no"]=1+$res1["view_times_no"];
                    //echo $res1["view_times_no"];
                    ?>
             </h3>
                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
