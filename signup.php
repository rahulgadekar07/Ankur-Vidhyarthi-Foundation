 <?php
        $showAlert = false;
        $showError = false;
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            include 'Partials/_dbconnect.php';
            $username = $_POST["username"];
            $password = $_POST["password"];
            $cpassword = $_POST["cpassword"];
            // $exists=false;

            // Check whether this username exists
            $existSql = "SELECT * FROM `users` WHERE username = '$username'";
            $result = mysqli_query($conn, $existSql);
            $numExistRows = mysqli_num_rows($result);
            if($numExistRows > 0){
                // $exists = true;
                $showError = "Username Already Exists";
            }
            else{
                // $exists = false; 
                if(($password == $cpassword)){
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO `users` ( `username`, `password`, `date`) VALUES ('$username', '$hash', current_timestamp())";
                    $result = mysqli_query($conn, $sql);
                    if ($result){
                        $showAlert = true;
                    }
                }
                else{
                    $showError = "Passwords do not match";
                }
            }
        }
    
    ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ankur Vidhyarthi Foundation</title>


    <link rel="stylesheet" href="/Ankur Vidhyarthi Foundation/CSS/home.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


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
    $(function() {
        $("#test").click(function() {
            $(".test").modal('show');
        });
        $(".test").modal({
            closable: true
        });
    });
    </script>
    <style>
    .signup {
        margin: 20px 50px;
        padding: 50px;
    }

    h1 {
        text-align: center;
        font-family: 'Roboto Condensed', sans-serif;
    }
    </style>
</head>

<body>
    <!-- header -->
    <header class="head1">
        <p>Email: ankurfounadtion@gmail.com</p>

        <!-- Signin & Signup
        <a id="test"> Login/Sign Up </a> -->

    </header>
    <!-- title with Logo -->
    <div class="heading">
        <div class="logo1">
            <img src="/Ankur Vidhyarthi Foundation/Images/logo1.jpg" alt="Error Loading Image" height="120px" width="120px">
        </div>
        <div class="title">
            <h1 id="title1">Ankur Vidhyarthi Foundation</h1>
            <p>-At/post:- Velu, Tal- Koregaon, District-Satara,415511</ </p>
        </div>
        <div class="logo2">
            <img src="/Ankur Vidhyarthi Foundation/Images/logo2.jpg" alt="Error Loading Image" height="120px" width="120px">
        </div>
    </div>
    <!-- navbar -->
    <nav class="nav1">
        <ul>
            <li> <a href="home.php">Home</a> </li>
            <li> <a href="#">About Us </a> </li>
            <li> <a href="#">Our Work</a> </li>
            <li> <a href="#">Contact Us </a> </li>
        </ul>
    </nav>
    
    <?php
        if($showAlert){
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Account created Successfully..! Now you can Login');
            window.location.href='home.php';
            </script>");
        }
        if($showError){
        echo ' <div class=" mt-2 alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '. $showError.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> ';
        }
    ?>
    <div class="signup">
        <h1>Create New Account</h1>
        <form class="ui large form" action="/Ankur Vidhyarthi Foundation/signup.php" method="post">
            <div class="ui  segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input required type="text" name="username" placeholder="username">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input required type="password" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input required type="password" name="cpassword" placeholder="Confirm Password">
                    </div>
                </div>
                <button class="ui fluid large primary submit button">Create Account</button>
            
        </form>

    </div>

   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body>

</html>