<?php
    // $sub=false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'Partials/_dbconnect.php';
        $name=$_POST['name'];
        $address=$_POST['address'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $orgname=$_POST['orgname'];
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "Uploaded Images/".$filename;
        $pname=$_POST['pname'];
        $pmobile=$_POST['pmobile'];
        $income=$_POST['income'];

        $sql="INSERT INTO `applicationForms`(`name`, `address`, `email`, `mobile`, `orgname`, `filename`, `pname`, `pmobile`, `income`, `date`) VALUES ('$name','$address','$email','$mobile','$orgname','$filename','$pname','$pmobile','$income', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        move_uploaded_file($tempname, $folder);
       

        if($result){
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Application Form created Successfully..!');
            window.location.href='home.php';
            </script>");
            // $sub=true;
        }
        else{
          
            echo'<script>alert("Application form failed to submit..!");</script>';
        }
    }
    // if($sub){
    //     header("location:home.php");
    // }

       
       
?> 
<!DOCTYPE html>
<html lang="en">

<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholorship Application</title>

    <link rel="stylesheet" href="/Ankur Vidhyarthi Foundation/CSS/home.css">
    <link rel="stylesheet" href="CSS/apply.css">
    <link rel="stylesheet" href="home.css">

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

</head>

<body>
    <!-- header -->
    <header class="head1">
        <div class="email1">
            <img src="/Ankur Vidhyarthi Foundation/Images/mail-142.svg" height="20" alt="error">
            Email: ankurfounadtion@gmail.com
        </div>


        <!-- Signin & Signup -->
        

    </header>

    <!-- title with Logo -->
    <div class="heading">
        <div class="logo1">
            <img src="/Ankur Vidhyarthi Foundation/Images/logo1.jpg" alt="Error Loading Image" height="120px"
                width="120px">
        </div>
        <div class="title">
            <h1 id="title1">Ankur Vidhyarthi Founadtion</h1>
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
            <li> <a href="home.php/#about">About Us </a> </li>
            <li> <a href="#">Our Work</a> </li>
            <li> <a href="#">Contact Us </a> </li>
        </ul>
    </nav>
    <div class="zoom-in-zoom-out"><h2 id="formheading">Scholorship Form</h2></div>
        
    
    
    <div class="applicationForm">
        <form method="post" enctype="multipart/form-data">
            <h4 class="subformheading">Your details</h4>

            <div class="mb-3 ">
                <label for="name" class="form-label">Name</label>
                <input required placeholder="Enter full name" type="text" name="name" class="form-control" id="name"
                    aria-describedby="emailHelp">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>

            <div class="form-floating">
                <textarea required class="form-control mb-3" placeholder="Leave a comment here"  name="address" id="floatingTextarea2"
                    style="height: 100px"></textarea>
                <label for="floatingTextarea2">Address</label>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input required placeholder="Enter valid email " type="email" name="email" class="form-control" id="email"
                    aria-describedby="emailHelp">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile No.</label>
                <input required placeholder="Enter mobile no." type="tel" class="form-control" id="mobile" name="mobile"
                    maxlength="10">
            </div>
            <div class="mb-3 ">
                <label for="orgname" class="form-label">College/School Name</label>
                <input required placeholder="Enter college/school name" type="text" name="orgname" class="form-control" id="orgname"
                    aria-describedby="emailHelp">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input required type="file" class="form-control" id="image" name="image"
                   >
            </div>

            <h4 class="subformheading">Parents Details</h4>

            <div class="mb-3 ">
                <label for="pname" class="form-label">Parent's Name</label>
                <input required placeholder="Enter full name" type="text" name="pname" class="form-control" id="pname"
                    aria-describedby="emailHelp">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="pmobile" class="form-label">Mobile No.</label>
                <input required placeholder=" Enter Parent's mobile no." type="tel" class="form-control" id="pmobile"
                    name="pmobile" maxlength="10">
            </div>
            <div class="mb-3">
                <label for="income" class="form-label">Annual Income</label>
                <input required type="number" class="form-control" id="income" name="income"
                    placeholder="e.g. &#x20B9; 200000">
            </div>
           
            <button type="submit" class="btn btn-success m-2">Submit</button>
            <button type="reset" class="btn btn-primary m-2 mb-5">Clear</button>
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