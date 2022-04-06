<?php
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
?>

<html>
    <head>
        <title>Q & A</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script>
         
            function click() {
               alert ("answer submitted!");
               document.write ("answer submitted!");
            }
        
      </script> 
    </head>
    <body>
        
        <form action="answer.php" method="post">
        <div><h1>Q & A</h1></div>
        <textarea name="answer" id="answer" cols="30" rows="10" placeholder="Type your answer here..."></textarea>
        <?php $qId= $_GET['value'];    echo '<input type="hidden" value="'.$qId.'" id="questionID" name="questionID"/>' ?>
       
       <input type="submit" value="POST" onclick = "click();" name="post" />
        </form>
    </body>
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
            </thead>
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
                                <input type="submit" value="Like me!" name="post" />
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
                </table>
            </form>
        </tbody> 
    </body>
</html>
        
