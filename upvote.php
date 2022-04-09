<?php session_start();
if(isset($_SESSION['id']))
{
?>
    <?php
    $id=$_POST['answerID'];
    $vote=$_POST['up'];
    echo $id." ".$vote;
    $vote=$vote+1;
    $mail= $_SESSION['emailId'];
    echo $mail;
    $con = mysqli_connect("localhost", "root", "", "bvspace");
    $selectquery= "SELECT * FROM liketable WHERE ans_id=$id AND id=$mail";
    $query= mysqli_query($con, $selectquery);
    $flag=1;
    while($res=mysqli_fetch_assoc($query))
    {
        $flag=0;
        echo $res["ans_id"];
        echo $res["id"];
    }
    if($flag==1)
    {
        $sql1="INSERT INTO `liketable` (`ans_id`,`id`) VALUES('$id','$mail');";
        if($con->query($sql1) == true){
            echo "Successfully inserted";
        }
        else{
            echo "ERROR:$sql1 <br> $conn->error";
        }
        $sql="update answer set upvote=$vote where ans_id=$id";
        if($con->query($sql) == true){
            echo '<script>alert("your like is counted"); window.location.href="display.php"</script>';
        }
        else{
            echo "ERROR:$sql <br> $conn->error";
        }
    }
     else 
    {
        echo '<script>alert("Already liked!"); window.location.href="display.php"</script>';
    }
    ?>
<?php 
}
else{
    echo '<script>alert("Session Expired! login to continue!"); window.location.href="index.php"</script>';
}
?>

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

