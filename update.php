<?php
  include 'Partials/_dbconnect.php';
    $id=$_GET['id'] ;
    $sql="SELECT * from `news`";
    $result=mysqli_query($conn,$sql);
    $sno=mysqli_num_rows($result);
 if($_SERVER["REQUEST_METHOD"] == "POST"){
    $updatenews= $_POST["updatenews"];
  
    
    $sql="UPDATE `news` SET Id=id,sno=$sno,news='$updatenews' where Id=$id";
    $result=mysqli_query($conn,$sql);    
    if($result){
        echo'<script>alert("News updated");</script>';
        header("location: admindash.php");
    }     
    else{
        echo'<script>alert("News not updated");</script>';

    }            
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update news</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- bootstrap link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="admindash.css"> -->
<style>
    .head{
    padding: 20px;
    background: linear-gradient(15deg, #238be0 0%, #80d0c7 100%);
    border-radius: 20px;
    text-align: center;
    margin: 0px 10px;
    /* position: fixed;
    width: 100%;
    overflow: hidden; */
    
    
}
.head h1{
    color: #b82c3f;
    font-family: 'Roboto Condensed', sans-serif;
    margin: 0px;
    font-size: 2.5rem;
 
}
.updatenews{
   
    /* margin-bottom: 50px; */
    text-align: center;
    /* border:2px solid rgb(100, 66, 66); */
    border-radius: 20px;
    /* background-color: #b82c3f; */
    width: 70%;
    margin: 4rem 8rem;
    border: 2px solid ;
    padding: 50px;
    border-radius: 20px;
    font-weight: bold;
    border: 2px solid #2937df;
    box-shadow: 5px 5px 10px #2196f3;
}
</style>
</head>
<body>
<div class="head">
        <h1>Update News</h1>
        
</div>
<div class="updatenews">
    <form method="post">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Update news</label>
            <input type="text" class="form-control" id="formGroupExampleInput"
                placeholder="type news here" name="updatenews">
        </div>
       
        <button class=" btn btn-success btn-submit ui fluid large primary submit button">Update</button>
    </form>
</div>
</body>
</html>