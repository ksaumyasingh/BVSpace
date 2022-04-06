
 <html><?php
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
        $id = 1;//filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $sql="INSERT INTO `bvspace`.`question` (`ques`, `view_times_no` ,`date_posted`,`id`) VALUES ('$question' , 1 , current_timestamp(),'$id');";

    
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
    <head>
        <title>Q & A</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="question.php" method="post">
        <div><h1>Q & A</h1></div>
       <textarea name="question" id="question" cols="30" rows="10" placeholder="Ask your question here..."></textarea>
       <input type="submit" value="POST" name="post" />
        </form>
    </body>
</html>   