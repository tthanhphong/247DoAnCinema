<?php 
    session_start();
    
       
    if(isset($_POST["btn_addshowtime"])){

        include("../conn.php");
        $showtime = $_POST["showtime"];

        $con = new connec();
        $sql = "INSERT INTO show_time VALUES (0,' $showtime')";
        $con ->insert($sql,"Record Inserted");
        header("location:viewshowtime.php");

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
                            <h5 class="text-center mt-2" style="font-family: Montserrat, sans-serif;">THỂ LOẠI</h5>
                            <form method="post">
                <div class="container-fluid">
                    </div>
                    <hr>
                        <!-- form add cinema -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">THỜI GIAN SHOW</label>
                                <input type="text" name="showtime" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Cinema Name">
                            </div>
                            <div class="modal-group" style="text-align: right;">
                                <button type="submit" name="btn_addshowtime" class="btn" style="background-image: linear-gradient(to right, #bdc3c7, #2c3e50); color:white;">Insert</button>
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

