
<?php

session_start();
if(isset($SESSION['loggedin'])){
$_SESSION = array();
session_destroy();
header("location: login.php");
}
else{
    echo '<script>alert("please login to continue"); window.location.href="login.php"</script>';
}
?>
