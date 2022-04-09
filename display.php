<?php session_start();
if(isset($_SESSION['id']))
{
?>
    <?php
    ini_set('error_reporting', 0);
    ini_set('display_errors', 0);
    ?>
    <html>
        <head>
            <title>Q & A</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600;1,800&display=swap" rel="stylesheet">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
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
                                <h4>Q & A</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-7">

                                        <form action="oldlist.php" method="post">
                                            <div class="input-group mb-3">
                                                <input type="text" name="search" value="" class="form-control" placeholder="Search question">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                            </div>
                                        </form>
                                        <form action="question.php" method="post">
                                            <div class="input-group mb-3">
                                            <input type="submit" value="Ask Question" name="askques" class="btn btn-primary"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

<!--            <div><h1>Q & A</h1></div>-->
<!--            <form action="oldlist.php" method="post">
            <input type="text" name="search" value="" size="110" placeholder="Search question"/>
            <input type="submit" value="Search" name="search" /><br>
            </form>-->
            
            <br><br>
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Question_Id</th>
                                    <th>Question</th>
                                    <th>views</th>
                                </tr>
                            </thead>
                            <tbody>
<!--            <table border="4">
                <thead>
                    <tr>
                        <th>Question_Id</th>
                        <th>Question</th>
                        <th>views</th>
                    </tr>
                </thead>
                <tbody>-->
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
                                        $_SESSION['emailId']=$_SESSION['id'];;
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
<!--                </tbody>
            </table>
        </body>-->
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
