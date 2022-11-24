<?php 
    session_start();

    $imgsrc="";
    $alt_txt="";
    if(isset($_POST["btn_cancelslider"])){
        header("location:viewslider.php");
}
    if(isset($_POST["btn_deleteslider"])){

            include("../conn.php");

            $id = $_GET["id"];  
            $table = "slider";
            $con=new connec();

            $con ->delete($table, $id);
            header("location:viewslider.php");
    }
    
    if(empty($_SESSION["admin_username"])){
        header("location:index.php");
    }else{

        include("../admin/admin_header.php");

        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $con = new connec();
            $tbl = "slider";
            $result = $con->select($tbl,$id);
            if($result ->num_rows > 0){
                $row = $result->fetch_assoc();

                $imgsrc = $row["img_path"];
                $alt_txt = $row["alt"];
            }
            
        }

    ?>  

        <section>
            <div class="container-fluid">   
                    <div class="row">
                        <div class="col-md-2" style="background-image: linear-gradient(to bottom, #bdc3c7, #2c3e50); min-height: 450px;">
                            <?php 
                            include("admin_sidenavbar.php");
                            ?>
                        </div>
                        <div class="col-md-10">
                            <h5 class="text-center mt-2" style="font-family: Montserrat, sans-serif;">UPDATE SLIDER</h5>
                            <form method="post" enctype="multipart/form-data" class="mt-5">
                                <div class="container">
                                    
                                    <hr>
                                        <!-- form update slider -->
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">SELECT IMAGE</label>
                                                <img src="../<?php echo $imgsrc; ?>" alt="<?php echo $alt; ?>" style="height: 150px;" /> 
                                            </div>
                                                
                                            <br><br>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">ALTERNATE TEXT</label>
                                                <input type="text" name="slider_alt_txt" class="form-control" placeholder="Enter alternate text" value="<?php echo $alt_txt; ?>" required>
                                            </div>
                                            
                                            <div class="modal-group" style="text-align: right;">
                                                <button type="submit" name="btn_cancelslider"class="btn btn-danger" style="color:white;">Cancel</button>
                                                <button type="submit" name="btn_deleteslider" class="btn" style="background-image: linear-gradient(to right, #bdc3c7, #2c3e50); color:white;">Delete</button>
                                            </div>
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

