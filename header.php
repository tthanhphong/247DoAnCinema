<?php  
    include ("conn.php");
    $con = new connec();



    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_GET["action"])){
        if($_GET["action"] == "logout"){
            $_SESSION["username"] = null;
            $_SESSION["cust_id"] = null;
        }
    }

    if(empty($_SESSION["username"])){
        
            $_SESSION["ul"] = '<li class="nav-item" style="font-family: Montserrat, sans-serif;">
            <a class="nav-link" data-toggle="modal" data-target="#modelId0" style="color: white;">REGISTER</a>
            </li>   
            <li class="nav-item" style="font-family: Montserrat, sans-serif;">
            <a class="nav-link" data-toggle="modal" data-target="#modelId1" style="color: white;">LOGIN</a>
            </li>';
    }

    

    if(isset($_POST["btn_login"])){  
        $email_id = $_POST["email"];
        $password_log = $_POST["pass"];
        
        $result = $con->select_login("customer", $email_id);

        if($result->num_rows > 0){  
            $row = $result->fetch_assoc();
            if($row["email"] ==  $email_id && $row["password"] ==  $password_log){
                $_SESSION["username"] = $row["fullname"];
                $_SESSION["cust_id"] = $row["id"];
                
                $_SESSION["ul"] = '<li class="nav-item"><a class="nav-link"style="color: white;">Hello, '.$_SESSION["username"].'</a></li><li class="nav-item"><a class="nav-link" href="index.php?action=logout" style="color: white;">LOGOUT</a></li>';
            }else{
                echo '<script> alert("Invalid Password");</script>';
            }
        }else{
            echo '<script> alert("Invalid Email");</script>';
        }   
    }

    if(isset($_POST["btn_reg"])){
        $name = $_POST["name"];
        $password= $_POST["password"];
        $email= $_POST["email"];
        $address= $_POST["address"];
        $confirmpassword = $_POST["confirmpassword"];


        if($password == $confirmpassword){
            $sql = "INSERT INTO customer VALUES (0,' $name','$password','$email','$address')";
            $con = new connec();
            $con ->insert($sql,"Customer Registed Now You Can Login");
        }else{
            ?>
            <script> alert("Confirm Password Not Matched");</script>;
            <?php
        }
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <title>247 Movie Ticket Booking</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="images/icon247.png">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   
  </head>
  <body>

  <nav class="navbar navbar-expand-sm navbar-dark" style="background-image: linear-gradient(to right, #bdc3c7, #2c3e50);">

    <a class="navbar-brand" href="index.php"><img src="images/icon247.png" style ="width:70px;"></a>

    <div class="collapse navbar-collapse" id="collapsibleNavId" style="align-items: center;">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0" style="font-family: Montserrat, sans-serif;" >
            <li class="nav-item">
                <a class="nav-link" href="index.php" style="color: white; margin-right:10px;">TRANG CHỦ</a>
            </li>
            
            <li class="nav-item dropdown" style="margin-right:10px;">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;"><i class="fas fa-money-bill-wave-alt"></i>PHIM</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="commingsoon.php">PHIM SẮP CHIẾU</a>
                    <a class="dropdown-item" href="nowshowing.php">PHIM ĐANG CHIẾU</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="offers.php" style="color: white; margin-right:10px;">TIN KHUYẾN MÃI</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="booking.php" style="color: white; margin-right:10px;">MUA VÉ</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="about.php" style="color: white; margin-right:10px;">VỀ CHÚNG TÔI</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="contact.php" style="color: white; margin-right:10px;">LIÊN HỆ</a>
            </li>
            
        </ul>
        <p>
            <form action="timkiem.php" method="POST">
                <input style="border-radius: 10%;" type="text" placeholder="Tìm kiếm..." name="tukhoa">
                <input type="submit" placeholder="Tìm kiếm..." name="timkiem" value="Tìm Kiếm">

            </form>
        </p>


        <ul class="navbar-nav">
            <?php  
                echo $_SESSION["ul"];

            ?>
            <!-- Button Register Trigger Model
            <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#modelId0" style="color: white;">Register</a>
            </li>   
            Button Login Trigger Model
            <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#modelId1" style="color: white;">Login</a>
            </li>  -->
        </ul>
        <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
    </div>
  </nav>
   
<!-- Register Modal -->     
<div class="modal fade" id="modelId0" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header"  style="background-image: linear-gradient(to left, #bdc3c7, #2c3e50); color:white;">
                        <!-- <h5 class="modal-title">Register</h5> -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <form method="post">
                    <div class="container">
                        <center>
                            <h1>
                                 Customer Register
                            </h1>
                            <p>
                                Please fill this form to create an account.
                            </p>
                        </center>
                    </div>
                    <div class="form-group">
                            <label for="exampleInputEmail1">Full Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">ConfirmPassword</label>
                            <input type="password" name="confirmpassword" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Address">
                        </div>

                        <div class="modal-group" style="text-align: right;">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" name="btn_reg" class="btn" style="background-image: linear-gradient(to right, #bdc3c7, #2c3e50); color:white;">Register</button>
                        </div>
                        <br>
                    <!-- form register -->
                    </form>
                    <div class="container signin" style="text-align: center; background-color:gray; color: white; padding: 1%;">
                                <p>Already have an account?<a data-toggle="modal" data-target="#modelId1" data-dismiss="modal"> Log in.</a></p>
                    </div>
            </div>
        </div>
    </div>
</div>

<!-- Login Modal -->     
<div class="modal fade" id="modelId1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header" style="background-image: linear-gradient(to left, #bdc3c7, #2c3e50); color:white;">
                        <!-- <h5 class="modal-title">Login</h5> -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
            <form method="post">
                <div class="container-fluid">
                <center>
                    <h1>
                        Login
                    </h1>
                    <p>
                        Please fill this form to login.
                    </p>
                </center>
                </div>
                <hr>
                    <!-- form login -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enter Your Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="modal-group" style="text-align: right;">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" name="btn_login" class="btn" style="background-image: linear-gradient(to right, #bdc3c7, #2c3e50); color:white;">Login</button>
                        </div>
                </form>
            </div>
                
        </div>
    </div>
</div>


