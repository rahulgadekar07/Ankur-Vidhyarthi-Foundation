<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
     
    // $sql = "Select * from users where username='$username' AND password='$password'";
    
    $sql = "SELECT * from users where username='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['password'])){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                // header("location: welcome.php");
            } 
            else{
                // $showError = "Invalid Credentials";
                echo '<script> alert("INVALID CREDENTIALS ")</script>';
            }
        }
        
    } 
    else{
        // $showError = "Invalid Credentials";
        echo '<script> alert("INVALID CREDENTIALS ")</script>';
    }

    
}
    
?>


<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ankur Vidhyarthi Foundation</title>


    <link rel="stylesheet" href="/Ankur Vidhyarthi Foundation/CSS/home.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Corousel links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- bootstrap link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">

    <!-- modal links -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
    <link
        href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css"
        rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script
        src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js">
        </script>
    <meta charset="utf-8">
    <script>
        $(function () {
            $("#test").click(function () {
                $(".test").modal('show');
            });
            $(".test").modal({
                closable: true
            });
        });
    </script>







</head>

<body id="hbdy">
    <!-- modal -->
    <div class="ui modal test">
        <div class="ui middle aligned center aligned grid">
            <div class="column">
                <h2 class="ui blue image header">
                    <img src="/Ankur Vidhyarthi Foundation/Images/download.jpg" class="image">
                    <div class="content">
                        Log-in to your account
                    </div>
                </h2>
                <form class="ui large form" method="post">
                    <div class="ui  segment">
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="text" name="username" placeholder="username">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" name="password" placeholder="Password">
                            </div>
                        </div>
                        <button class="ui fluid large primary submit button">Login</button>

                    </div>
                </form>

                <div class="ui message">
                    New to us? <a href="/Ankur Vidhyarthi Foundation/signup.php">Sign Up</a>
                </div>
            </div>
        </div>
    </div>

    <!-- header -->
    <header class="head1">
        <div class="email1">
            <img src="/Ankur Vidhyarthi Foundation/Images/mail-142.svg" height="20" alt="error">
            Email: ankurfounadtion@gmail.com
        </div>


        <!-- Signin & Signup -->
        <?php
        
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
            $loggedin= true;
            
            }
            else{
            $loggedin = false;
            }
            if($loggedin){
                echo '<a href="logout.php" text="blue" > LogOut </a>';
            }
            else{
                echo '<a id="test"> Login/Sign Up </a>';
            }
       ?>

    </header>

    <!-- title with Logo -->
    <div class="heading">
        <div class="logo1">
            <img src="/Ankur Vidhyarthi Foundation/Images/logo1.jpg" alt="Error Loading Image" height="120px"
                width="120px">
        </div>
        <div class="title">
            <h1 id="title1">Ankur Vidhyarthi Foundation</h1>
            <p>
            <Address
                style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;font-weight: bold;">
                -At/post:- Velu, Tal- Koregaon, District-Satara,415511</Address>
            </p>
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
            <li> <a href="#about">About Us </a> </li>
            <li> <a href="adminlogin.php">Admin Login</a> </li>
            <li> <a href="#contact">Contact Us </a> </li>
            
            
        </ul>
    </nav>
    <?php
        //  $user= $_SESSION[`username`];
        if($login){
            echo"<script>alert('Login Successful..!!')</script>";
        // echo ' <div class="alert mt-1 alert-success alert-dismissible fade show" role="alert">
        //     <strong>Success!</strong> You are logged in <br>Welcome <strong>'. $username.'</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //         <span aria-hidden="true">&times;</span>
        //     </button>
        // </div> ';
        }
        // if($showError){
        //     echo ' <div class=" mt-2 alert alert-danger alert-dismissible fade show" role="alert">
        //     <strong>Error!</strong> '. $showError.'
        //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //         <span aria-hidden="true">&times;</span>
        //     </button>
        // </div> ';
        // }
    ?>

            
    <h2 style=" text-align:center;color: crimson;background-color: #80d0c7;border-radius: 30px;padding:5px;margin:0px 200px;margin-top: 20px;"> Our Location </h2>

    <!-- google map location -->
    <div class="map1">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d243459.6580825091!2d74.19140651553963!3d17.55246518313358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc3d28c80dffafd%3A0x50cd40035ce738c7!2sVelu%2C%20Maharashtra%20415511!5e0!3m2!1sen!2sin!4v1649227331809!5m2!1sen!2sin"
            width="100%" height="40%" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>



    <div class="content">
        <!-- news window with marquee -->
        <div class="announce">
            <h4 style="text-align: center;">News &AMP; Updates </h4>
            <hr>
            <marquee behavior="scroll" direction="up">
                <?php
                    include "Partials/_dbconnect.php";
                    // error_reporting(0);
                    // $temp1=0;
                                                
                    $result=mysqli_query($conn,"SELECT * FROM `news`");
                    $num_rows= mysqli_num_rows($result);
                    // echo "<h3>$num_rows</h3>";
                                            
                                            
                    while($row = mysqli_fetch_assoc($result)){

                        // $temp1++;
                        echo"<li>". $row['news'] ."</li>
                        <hr>";
                        if($num_rows==0){
                            break;
                        }
                        
                    }
                ?>

                <!-- <li>news announced at 2 month</li>
                <hr>
                <li>news announced at 3 month</li>
                <hr>
                <li>news announced at 4 month</li>
                <hr> -->
            </marquee>
        </div>


        <div class="content1">
            <h1 style="margin-bottom: 50px;">Welcome to Ankur Foundation</h1>
            <p>Click below to apply for our scholorships:</p>
            <div class="apl">

                <button id="#btn1" onclick="window.location.href='apply.php'">Apply</button>

            </div>
            <p style="margin-top:20px;"> Kindly Donate Us to Help more Students:-</p>
            <div class="apl1">
    
                <button id="#btn2" onclick="window.location.href='donate.php'">Donate</button>
    
            </div>
        </div>
        <!--onclick="window.location.href='apply.php' -->
    </div>


                    <!-- about us  -->
    <div class="content2">
        <h1 id="about" style=" font-size: 2.5rem;
        margin: 20px 0px;
        background: linear-gradient(15deg, #2196f3 0%, #80d0c7 100%);
        border-radius: 20px;">About Us </h1>
        <div class="content2_1">
            <p style=" font-size: 1.5rem;
        font-weight: bold;margin: 20px;">
            Ankur Student Foundation is a NGO to provide financial support for the educational expense of impoverished student in rural areas who are very talented and filled with great potential. 
            </p><p style=" font-size: 1.5rem;
            font-weight: bold;padding: 20px;">
            Chairperson of Ankur Student Foundation is Mr. Ankush Bhosale.He was started NGO in Velu village near Rahimatpur Dist:Satara from 2019 come through from  NGO of  Disha Pariwar , Pune and Bhatevara Foundation , Pune
        </p>
        <div class="container my-4">
        <h2 style="color: crimson;background-color: #80d0c7;border-radius: 30px;padding:5px;margin:10px 200px">Picture Gallary:</h2>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner mb-5">
                <div class="item active">
                    <img src="Images/IMG-20220402-WA0000.jpg" alt="Los Angeles" style="width:100%; height: 400px;">
                </div>

                <div class="item">
                    <img src="Images/IMG-20220402-WA0001.jpg" alt="Chicago" style="width:100%; height: 400px;">
                </div>

                <div class="item">
                    <img src="Images/IMG-20220402-WA0002.jpg" alt="Error loading image" style="width:100%; height: 400px;">
                </div>
                <div class="item">
                    <img src="Images/IMG-20220402-WA0003.jpg" alt="Error loading image" style="width:100%; height: 400px;">
                </div>
                <div class="item">
                    <img src="Images/IMG-20220402-WA0004.jpg" alt="Error loading image" style="width:100%; height: 400px;">
                </div>
                <div class="item">
                    <img src="Images/IMG-20220402-WA0005.jpg" alt="Error loading image" style="width:100%;">
                </div>
                <div class="item">
                    <img src="Images/IMG-20220402-WA0006.jpg" alt="Error loading image" style="width:100%; height: 400px;">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        </div>
        
    </div>
    </div>

    

                    <!-- contact us -->
    <div class="content3">
        <h1 id="contact" style=" font-size: 2.5rem;
        margin: 20px 0px;
        background: linear-gradient(15deg, #2196f3 0%, #80d0c7 100%);
        border-radius: 20px;"> Contact Us </h1>
        <div class="content3_1">
        <h2 id="title1">Ankur Vidhyarthi Founadtion</h1>
         <div class="logo1">
            <img src="/Ankur Vidhyarthi Foundation/Images/logo1.jpg" alt="Error Loading Image" height="120px"
                width="120px">
        </div>
       <div class="email2">
            <img src="/Ankur Vidhyarthi Foundation/Images/mail-142.svg" height="20" alt="error">
            Email: ankurfounadtion@gmail.com
        </div>
       <div class="location">
         <i style="font-size:24px" class="fa">&#xf041;</i>
         -At/post:- Velu, Tal- Koregaon, District-Satara,415511
        </div>
        <div class="phone">
        <i style="font-size:24px" class="fa">&#xf095;</i>
        02162-854747
        </div>
        </div>
        

    </div>

    <!-- footer -->
    <div style="text-align: center!important;
   background: linear-gradient(15deg, #2196f3 0%, #80d0c7 100%);
   padding: 10px 10px!important;
   font-weight: 600!important;">
        &copy; All rights reserved | Ankur vidhyarthi Founadtion
    </div>

    <!-- 
    <script type="text/javascript">
        document.body.classList.remove('dimmable');
    </script> -->


</body>

</html>