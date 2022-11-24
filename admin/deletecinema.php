<?php 
    session_start();
    $n = "";
    $l = "";
    $c = "";
      
    if(isset($_POST["btn_cancelcinema"])){
        header("location:viewcinema.php");
    }
    if(isset($_POST["btn_deletecinema"])){

        include("../conn.php");

        $id = $_GET["id"];  
        $table = "cinema";
        $con = new connec();
        
        $con ->delete($table, $id);
        header("location:viewcinema.php");
    }
    
    if(empty($_SESSION["admin_username"])){
        header("location:index.php");

    }else{
        include("../admin/admin_header.php");
        
        if(isset($_GET["id"])){

            $id = $_GET["id"];
            $con = new connec();
            $tbl = "cinema";
            $result = $con->select($tbl,$id);
            if($result ->num_rows > 0){
                $row = $result->fetch_assoc();
                $n = $row["name"];
                $l = $row["location"];
                $c = $row["city"];

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
                            <h5 class="text-center mt-2" style="font-family: Montserrat, sans-serif;">DELETE CINEMA DETAILS</h5>
                            <form method="post">
                <div class="container-fluid">
                    </div>
                    <hr>
                        <!-- form login -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">CINEMA NAME</label>
                                <input type="text" name="cinema_name_txt" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Cinema Name" value="<?php echo $n; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">CINEMA LOCATION</label>
                                <input type="text" name="cinema_location_name" class="form-control" id="exampleInputPassword1" placeholder="Enter Cinema Location" value="<?php echo $l;?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">CITY</label>
                                <input type="text" name="cinema_city" class="form-control" id="exampleInputPassword1" placeholder="City" value="<?php echo $c;?>">
                            </div>
                            <div class="modal-group" style="text-align: right;">

                                <button type="submit" name="btn_cancelcinema"class="btn btn-danger" style="color:white;">Cancel</button>
                                <button type="submit" name="btn_deletecinema" class="btn" style="background-image: linear-gradient(to right, #bdc3c7, #2c3e50); color:white;">Delete</button>
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

