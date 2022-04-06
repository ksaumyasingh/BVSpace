<?php
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
?>
<html>
    <head>
        <title>Q & A</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
        <div><h1>Q & A</h1></div>
        <form action="oldlist.php" method="post">
        <input type="text" name="search" value="" size="110" placeholder="Search question"/>
        <input type="submit" value="Search" name="search" /><br>
        </form>
        <form action="question.php" method="post">
            <input type="submit" value="Ask Question" name="askques" />
        </form>
        <br><br>
        <table border="4">
            <thead>
                <tr>
                    <th>Question_Id</th>
                    <th>Question</th>
                    <th>views</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $con = mysqli_connect("localhost", "root", "", "bvspace");
                    $selectquery= "SELECT * FROM question ORDER BY view_times_no DESC";
                    $query= mysqli_query($con, $selectquery);
                    $nums= mysqli_num_rows($query);
                    //echo $nums."<br>";
                    while($res=mysqli_fetch_assoc($query))
                    {
                        ?>
                        <tr>
                             <?php  $value=$res["ques_id"];
                                    $my = urlencode($value);
                                    $uid = urlencode($res["id"]);
                                    session_start();
                                    $_SESSION['emailId']=$res["id"];
                            ?>
                            <th> <?php  echo $res["ques_id"] ?></th>
                            <th><?php
                            echo "<a href=\"displayanswer.php?value=$my\">";
                            echo $res["ques"];
                            echo '</a>';
                            ?></th>
                            <th> <?php  echo $res["view_times_no"] ?></th>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>
<?php
   /*$con = mysqli_connect("localhost", "root", "", "quora");

   $selectquery= "SELECT * FROM question";
   $query= mysqli_query($con, $selectquery);
   $nums= mysqli_num_rows($query);
   echo $nums."<br>";
   while($res=mysqli_fetch_assoc($query))
   {
       echo $res["sno"]."  ".$res["ques"];
       echo "<br>";
   }
   <td><a href="#" style="font-weight:normal; font-style:italic" onclick="openPage(<?php echo $value ;?>)"> <?php echo $value ;?> </a></td>
                            <script type="text/javascript">
                            function openPage(value){window.open('displayanswer.php?value='+value);}
                            </script>
 /*  $stmt = mysqli_prepare($con, "SELECT * FROM question");
   
   //Executing the statement
   mysqli_stmt_execute($stmt);

   mysqli_stmt_store_result($stmt);

   //Number of rows
   $count = mysqli_stmt_num_rows($stmt);

   print("Number of rows in the table: ".$count."\n");
   
   //Closing the statement
   mysqli_stmt_close($stmt);
   

   //Closing the connection
   mysqli_close($con);*//*
    $con = new mysqli("localhost", "root", "", "quora");

   /*$con -> query("CREATE TABLE Test(Name VARCHAR(255), Age INT)");
   $con -> query("insert into Test values('Raju', 25),('Rahman', 30),('Sarmista', 27)");
   print("Table Created.....\n");

   $stmt = $con -> prepare( "SELECT * FROM Test WHERE Name in(?, ?)");
   $stmt -> bind_param("ss", $name1, $name2);
   $name1 = 'Raju';
   $name2 = 'Rahman';
    $stmt = $con -> prepare( "SELECT * FROM question");
   //Executing the statement
   $stmt->execute();
  

   //Retrieving the result
   $result = $stmt->get_result();

   //Fetching all the rows as arrays
   while($obj = $result->fetch_assoc()){	
      echo $obj["sno"]."  ".$obj["ques"];
      echo "\n";
      
   }

   //Closing the statement
   $stmt->close();

   //Closing the connection
   $con->close();*/
?>