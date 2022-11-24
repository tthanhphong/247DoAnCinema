<?php
session_start();
$error = "";
if(isset($_POST["btn_login"])){  
    $email_id = $_POST["email"];
    $password_log = $_POST["pass"];
    
        if("admin@gmail.com" == $email_id){
            if("123123" == $password_log){
                $_SESSION["admin_username"] = $email_id;   
                header("location:dashboard.php");  
            }else{
                $error="Invalid Password";
            }
            
        }else{
            $error="Invalid email";
        } 
}


?>
<!doctype html>
<html lang="en">
  <head>
    <title>ADMIN PANEL</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="margin: auto;">
            <!-- form login -->
                <form method="post">
                    <div class="container-fluid">
                    <center>
                        <h1>
                            ADMIN LOGIN
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
                                <label for="exampleInputPassword1">Enter Your Password</label>
                                <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>  
                            <div class="modal-group" style="text-align: right;">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" name="btn_login" class="btn" style="background-image: linear-gradient(to right, #bdc3c7, #2c3e50); color:white;">Login</button>
                            </div>
                    </form>
                        <p style="margin-left: 1%;"> <?php echo $error; ?></p>
            </div>
        </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

