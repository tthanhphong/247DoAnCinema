<?php 
    session_start();
    
       
    if(isset($_POST["btn_addcinema"])){

        include("../conn.php");
        $name = $_POST["cinema_name_txt"];
        $location = $_POST["cinema_location_name"];
        $city = $_POST["cinema_city"];

        $con = new connec();
        $sql = "INSERT INTO cinema VALUES (0,' $name','$location','$city')";
        $con ->insert($sql,"Record Inserted");
        header("location:viewcinema.php");

    }

    if(empty($_SESSION["admin_username"])){
        header("location:index.php");
    }else{

        include("../admin/admin_header.php");

    ?>  
        
            
        <section>
            <div class="container-fluid">   
                    <div class="row">
                        <div class="col-md-2" style="background-image: linear-gradient(to bottom, #bdc3c7, #2c3e50); min-height: 450px;">
                            <?php 
                            include("../admin/admin_sidenavbar.php");
                            ?>
                        </div>
                        <div class="col-md-10">
                            <h5 class="text-center mt-2" style="font-family: Montserrat, sans-serif;">ADD CINEMA DETAILS</h5>
                            <form method="post">
                <div class="container-fluid">
                    </div>
                    <hr>
                        <!-- form add cinema -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">CINEMA NAME</label>
                                <input type="text" name="cinema_name_txt" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Cinema Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">CINEMA LOCATION</label>
                                <input type="text" name="cinema_location_name" class="form-control" id="exampleInputPassword1" placeholder="Enter Cinema Location">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">CITY</label>
                                <input type="text" name="cinema_city" class="form-control" id="exampleInputPassword1" placeholder="City">
                            </div>
                            <div class="modal-group" style="text-align: right;">
                                <button type="submit" name="btn_addcinema" class="btn" style="background-image: linear-gradient(to right, #bdc3c7, #2c3e50); color:white;">Insert</button>
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

