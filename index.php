<!DOCTYPE html>
<!--
select lines to be commented control+/ enter
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if(isset($SESSION['loggedin'])){
   header("location: homepage.php");
    echo $SESSION['uname']." ".$SESSION['pass'];
    exit;
}
 else {
    header("location: login.php");
}
?>