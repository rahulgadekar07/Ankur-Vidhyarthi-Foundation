<?php
    $login=false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'partials/_dbconnect.php';
        $adminname = $_POST["adminname"];
        $adpassword = $_POST["adpassword"]; 

        $sql = "SELECT * FROM adminlogin WHERE adminname='$adminname'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1){
            while($row=mysqli_fetch_assoc($result)){
                if ($_POST["adpassword"]==$row["adpassword"]){ 
                    $login = true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['adminname'] = $adminname;
                    header("location: admindash.php");
                } 
                else{
                    // $showError = "Invalid Credentials";
                    echo '<script> alert("INVALID CREDENTIALS ";)</script>';
                }
            }
            
        } 
        else{
            $showError = "Invalid Credentials";
            echo '<script> alert("INVALID CREDENTIALS ";)</script>';
        }
    }
        
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="CSS/adminlogin1.css">
    <link rel="stylesheet" href="CSS/home.css">
</head>

<body>
    <?php
        if($login){
        echo '<script> alert("Login Successful..!! );</script>';
        }
    ?>

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
            <h1 id="title1">Ankur Vidhyarthi Founadtion</h1>
            <p>-At/post:- Velu, Tal- Koregaon, District-Satara,415511</</p>
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



    <div class="col-md-6 login-form-2">
        <h2>Administrator Login</h2>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="adminname" class="form-control" placeholder="Admin name" value="" />
            </div>
            <div class="form-group">
                <input type="password" name="adpassword" class="form-control" placeholder="Your Password *" value="" />
            </div>
            <div class="form-group">
                <input type="submit" class="btnSubmit" value="Login" />
            </div>
            <div class="form-group">

                <!-- <a href="#" class="ForgetPwd" value="Login">Forget Password?</a> -->
            </div>
        </form>
    </div>

     <!-- footer -->
   <div style="text-align: center!important;
   background: linear-gradient(15deg, #2196f3 0%, #80d0c7 100%);
   padding: 10px 10px!important;
   font-weight: 600!important;">
    &copy; All rights reserved | Ankur vidhyarthi Founadtion
   </div>

</body>

</html>