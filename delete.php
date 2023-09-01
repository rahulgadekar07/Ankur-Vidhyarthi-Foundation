<?php
    include 'Partials/_dbconnect.php';
    $id=$_GET['id'] ;
    $sql="DELETE FROM `news` WHERE `Id`= $id"; 
    $result=mysqli_query($conn,$sql);
    header('location:admindash.php');
  
?>