<?php
$sno=$_GET['sno'];
$search==$_GET['search'];
//echo $sno;
$con = mysqli_connect("localhost", "root", "", "bvspace");
$squery="DELETE FROM resources WHERE `S.No`=$sno";
if($con->query($squery) == true)
{
    header("Location:branchWisePreview.php");
    header("Location:previewMaterial.php?search=".$search);
}
else
{
    echo "ERROR:$sql <br> $conn->error";
}
?>