<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'Partials/_dbconnect.php';
        $donorname= $_POST["donorname"];
        $amount= $_POST["amt"];
        $sql="INSERT INTO `donors` (`donorname`, `amount`, `date`) VALUES ('$donorname', '$amount', CURRENT_TIMESTAMP)";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('You donated $amount Successfully..!!');
            window.location.href='home.php';
            </script>");
        }
        else{
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Donation failed..!!');
                window.location.href = 'home.php';
            </script>");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate</title>
    <link rel="stylesheet" href="/Ankur Vidhyarthi Foundation/CSS/home.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">

<style>
    .dform{
        text-align: center;
    width: 50vw;
   
    margin: 30px 310px;
    padding: 20px 20px;
    border: 2px solid #2937df ;
    background-color: antiquewhite;
    border-radius: 30px;
    box-shadow: 5px 5px 10px #2196f3;
    font-weight: bold;
    }
    .dform h2{
    font-family: 'Roboto Condensed', sans-serif !important;
    color: rebeccapurple;
    }
</style>
</head>

<body>
    <!-- header -->
    <header class="head1">
        <div class="email1">
            <img src="/Ankur Vidhyarthi Foundation/Images/mail-142.svg" height="20" alt="error">
            Email: ankurfounadtion@gmail.com
        </div>


        <!-- Signin & Signup -->
        <!-- 
        
            // if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
            // $loggedin= true;
            // }
            // else{
            // $loggedin = false;
            // }
            // if($loggedin){
            //     echo '<a href="logout.php" > LogOut </a>';
            // }
            // else{
            //     echo '<a id="test"> Login/Sign Up </a>';
            // }-->


    </header>

    <!-- title with Logo -->
    <div class="heading">
        <div class="logo1">
            <img src="/Ankur Vidhyarthi Foundation/Images/logo1.jpg" alt="Error Loading Image" height="120px"
                width="120px">
        </div>
        <div class="title">
            <h1 id="title1">Ankur Vidhyarthi Foundation</h1>
            <p>-At/post:- Velu, Tal- Koregaon, District-Satara,415511</< /p>
        </div>
        <div class="logo2">
            <img src="/Ankur Vidhyarthi Foundation/Images/logo2.jpg" alt="Error Loading Image" height="120px"
                width="120px">
        </div>
    </div>

    <!-- navbar -->
    <nav class="nav1">
        <ul>
            <li> <a href="home.php">Home</a> </li>
            <li> <a href="home.php/#about">About Us </a> </li>
            <li> <a href="adminlogin.php">Admin Login</a> </li>
            <li> <a href="home.php/#contact">Contact Us </a> </li>
        </ul>
    </nav>





    <div class="dform">
        <h2>Donate Us</h2>
        <form method="post">
             <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Donor's Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter your name" name="donorname">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Amount</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="amt" placeholder=" &#x20B9; &nbsp; Donation Amount  ">
        </div>
        <button class=" btn btn-success btn-submit ui fluid large primary submit button">Donate</button>
    </div>
        </form>
       
   



  <!-- footer -->
  <div style="text-align: center!important;
  background: linear-gradient(15deg, #2196f3 0%, #80d0c7 100%);
  padding: 10px 10px!important;
  font-weight: 600!important;">
       &copy; All rights reserved | Ankur vidhyarthi Founadtion
   </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

</body>

</html>