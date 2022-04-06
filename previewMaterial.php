<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Study Material</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Study Material</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th>Sno</th>
                                <th>Name</th>
                                <th>Subject</th>
                                <th>Title</th>
                                <th>Document</th>
                                </tr>
                            </thead>

                            <tbody>
                                
                                <?php 
                                    include 'dbcon.php';

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM resources WHERE CONCAT(Subject) LIKE '%$filtervalues%' ";
                                        echo $query;
                                        $query_run = mysqli_query($con, $query);

                                        
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $result)
                                            {
                                                ?>
                                                <tr>
                                                    <td> <?php echo $result['S.No']; ?></td>
                                                    <td> <?php echo $result['UploadedBy']; ?></td>
                                                    <td> <?php echo $result['Subject']; ?></td>
                                                    <td> <?php echo $result['Title']; ?></td>
                                                    <td><a href="<?php echo $result['Document']; ?>"><?php echo $result['Document']; ?></a></td>
                                                    
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="5">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>