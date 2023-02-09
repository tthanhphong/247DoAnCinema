<?php 
    session_start();
    $fullname = "";
    $password = "";
    $email = "";
    $address = "";
       
    if(isset($_POST["btn_editcustomer"])){

        include("../conn.php");
        
        $fullname = $_POST["fullname"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $address = $_POST["address"];

        $id = $_GET["id"];  
        $con = new connec();
        $sql = "update customer set fullname= '$fullname',  password= '$password' , email= '$email', address= '$address' WHERE id=$id;";
        $con ->update($sql,"Record Update");
        header("location:viewcustomer.php");
    }
    
    if(empty($_SESSION["admin_username"])){
        header("location:index.php");

    }else{
        include("../admin/admin_header.php");
        
        if(isset($_GET["id"])){

            $id = $_GET["id"];
            $con = new connec();
            $tbl = "customer";
            $result = $con->select($tbl,$id);
            if($result ->num_rows > 0){
                $row = $result->fetch_assoc();

                $fullname = $row["fullname"];
                $password = $row["password"];
                $email = $row["email"];
                $address = $row["address"];

            }
        }

    ?>  
        
            
        <section>
            <div class="continr-fluid">
                    <div class="row">
                        <div class="col-md-2" style="background-image: linear-gradient(to bottom, #bdc3c7, #2c3e50); min-height: 450px;">
                            <?php 
                            include("../admin/admin_sidenavbar.php");
                            ?>
                        </div>
                        <div class="col-md-10">
                            <h4 class="text-center mt-2" style="font-family: Montserrat, sans-serif;"><b>EDIT THỂ LOẠI</b></h4>
                            <form method="post">
                <div class="container-fluid">
                    </div>
                    <hr>
                            <div class="form-group">
                                <label for="exampleInputEmail1">TÊN NGƯỜI DÙNG</label>
                                <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Genre Name"value="<?php echo $fullname; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">PASSWORD</label>
                                <input type="text" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Genre Name"value="<?php echo $password; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">EMAIL</label>
                                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Genre Name"value="<?php echo $email; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">ĐỊA CHỈ</label>
                                <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Genre Name"value="<?php echo $address; ?>">
                            </div>

                            <div class="modal-group" style="text-align: right;">
                                <button type="submit" name="btn_editcustomer" class="btn" style="background-image: linear-gradient(to right, #bdc3c7, #2c3e50); color:white;">UPDATE</button>
                            </div>
                    </form>
                        </div>
                    </div>
                </div>
            </nav>
        </section>

    <?php

    include("../admin/admin_footer.php");
        }
    ?>

