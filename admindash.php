<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: adminlogin.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/admindash.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
    <title>admin dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- bootstrap link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="head">
        <h1>Admin Dashboard</h1>
        <div class="logout">
            <?php
            
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                $loggedin= true;
                }
                else{
                $loggedin = false;
                }
                if($loggedin){
                    echo '<a href="adminlogout.php" text="blue" > LogOut </a>';
                }
                else{
                    echo '<a id="test"> Login/Sign Up </a>';
                }
            ?>
        </div>

    </div>
    </div>
    <div class="dashcontent">
        <div class="aside">
            <div class="l1"><a href="#users">Registered Users</a></div>
            <div class="l1"><a href="#nw">NewsBoard</a></div>
            <div class="l1"><a href="#app">Scholorship Appicants</a></div>
            <div class="l1"><a href="#donor">Donors List</a></div>
        </div>
        <div class="subcontent">
            <div id="users">
                <h2 style=" font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                margin-bottom: 20px;">Registered Users</h2>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Sr.no</th>
                            <th scope="col">Username</th>
                            <th scope="col">Date & Time</th>


                    </thead>
                    <tbody>
                        <?php
                                include "Partials/_dbconnect.php";
                                // error_reporting(0);
                                $temp1=0;
                                                            
                                $result=mysqli_query($conn,"SELECT * FROM `users`");
                                $num_rows= mysqli_num_rows($result);
                                // echo "<h3>$num_rows</h3>";
                                                        
                                                        
                                while($row = mysqli_fetch_assoc($result)){

                                    $temp1++;
                                    echo"
                                    <tr>
                                    <th scope=`row`>". $temp1."</th>
                                    <td>". $row['username'] ."</td>
                                    <td>". $row['date'] ."</td>
                                    
                                    </tr>";
                                    if($num_rows==0){
                                        break;
                                    }
                                    
                                }
                            ?>
                    </tbody>
                </table>

            </div>

            <div class="applications" id="app">
                <h2 style=" font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                margin-bottom: 20px;">
                    Scholorship Forms
                </h2>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Sr.no</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Email</th>

                            <th scope="col">Organization name</th>
                            <th scope="col">Parent Income</th>
                            <th scope="col"> Accept Request</th>


                    </thead>
                    <tbody>
                        <?php
                                include "Partials/_dbconnect.php";
                                // error_reporting(0);
                                $temp1=0;
                                                            
                                $result=mysqli_query($conn,"SELECT * FROM `applicationforms`");
                                $num_rows= mysqli_num_rows($result);
                                // echo "<h3>$num_rows</h3>";
                                                        
                                                        
                                while($row = mysqli_fetch_assoc($result)){
                                            
                                    $temp1++;
                                    echo"
                                    <tr>
                                    <th scope=`row`>". $temp1."</th>
                                    <td>". $row['name'] ."</td>
                                    <td>". $row['address'] ."</td>
                                    <td>". $row['email'] ."</td>
                                   
                                    <td>". $row['orgname'] ."</td>
                                    <td>". $row['income'] ."</td>
                                    <td><button class='btn btn-success'>Accept</button></td>
                                    
                                    </tr>";
                                    if($num_rows==0){
                                        break;
                                    }
                                    
                                }
                            ?>
                    </tbody>
                </table>

            </div>
            <div class="newsboard" id="nw">
                <h2 style=" font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                margin-bottom: 20px;">
                    Update News
                </h2>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Sr.no</th>
                            <th scope="col">News</th>
                            <th scope="col">Delete News</th>
                            <th scope="col">Update News</th>
                           



                    </thead>
                    <tbody>
                        <?php
                                include "Partials/_dbconnect.php";
                                // error_reporting(0);
                                $temp1=0;
                                                            
                                $result=mysqli_query($conn,"SELECT * FROM `news`");
                                $num_rows= mysqli_num_rows($result);
                                // echo "<h3>$num_rows</h3>";
                                                 
                                while($row = mysqli_fetch_assoc($result)){

                                    $temp1++;
                                    ?>
                                    
                                    <tr>
                                    <td> <?php echo $temp1?></td>
                                    <td> <?php echo $row['news'] ?></td>
                                    <td> <button class="btn btn-sm btn-danger"><a class="text-white text-decoration-none" href="delete.php?id=<?php echo$row['Id']; ?>">Delete</a></button> </td>               
                                    <td> <button class="btn btn-sm btn-success"><a class="text-white text-decoration-none" href="update.php?id=<?php echo$row['Id']; ?>">Update</a></button> </td>               
                                    
                                   
                                   
                                    
                                    
                                    </tr>
                                    
                             <?php       
                                }
                            ?>
                    </tbody>
                </table>
            </div>
            <div class="addnews">
                <form method="post">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Add news</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                placeholder="type news here" name="addnews">
                        </div>
                    
                        <button class=" btn btn-success btn-submit ui fluid large primary submit button">Add</button>
                    </form>
                    <?php
                   
                        include 'Partials/_dbconnect.php';
                        $sql="SELECT * from `news`";
                            $result=mysqli_query($conn,$sql);
                            $sno=mysqli_num_rows($result);
                            
                        if($_SERVER["REQUEST_METHOD"] == "POST"){
                            
                            $addnews= $_POST["addnews"];
                            $sno++;
                            $sql="INSERT INTO `news`( `sno`, `news`, `date`) VALUES ('$sno','$addnews',current_timestamp())";
                            $result=mysqli_query($conn,$sql);    
                            if($result){
                                echo'<script>alert("News inserted");</script>';
                            }     
                            else{
                                echo'<script>alert("News not inserted");</script>';

                            }            
                         }
                    ?>
            </div>
           
            <div class="donorlist" id="donor">
                <h2 style=" font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                    margin-bottom: 20px;">
                    Donors
                </h2>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Sr.no</th>
                            <th scope="col">Donor name</th>
                            <th scope="col">Donation Amount</th>
    
    
    
                    </thead>
                    <tbody>
                        <?php
                                    include "Partials/_dbconnect.php";
                                    // error_reporting(0);
                                    $temp1=0;
                                                                
                                    $result=mysqli_query($conn,"SELECT * FROM `donors`");
                                    $num_rows= mysqli_num_rows($result);
                                    // echo "<h3>$num_rows</h3>";
                                                            
                                                            
                                    while($row = mysqli_fetch_assoc($result)){
    
                                        $temp1++;
                                        echo"
                                        <tr>
                                        <th scope=`row`>". $temp1."</th>
                                        <td>". $row['donorname'] ."</td>
                                        <td>". $row['amount'] ."</td>
                                       
                                        
                                        
                                        </tr>";
                                        if($num_rows==0){
                                            break;
                                        }
                                        
                                    }
                                ?>
                    </tbody>
                </table>
            </div>
        </div>

        
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

</body>

</html>