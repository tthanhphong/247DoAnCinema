<?php 
    session_start();
    
       
    if(isset($_POST["btn_addslider"])){

        $alt = $_POST["slider_alt_txt"];
         
        $target_dir = "images/";
        $target_file = $target_dir.$_FILES["fileToUpLoad"]["name"];
        
        $target_dir_01 = "../images/";
        $target_file_01 = $target_dir_01.$_FILES["fileToUpLoad"]["name"];

        $uploadOK = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if(move_uploaded_file($_FILES["fileToUpLoad"]["tmp_name"], $target_file_01)){  

            include("../conn.php");
            $con = new connec();
            $sql = "insert into slider values (0,'$target_file','$alt');";
            $con->insert($sql,"Record Inserted");
            header("location:viewslider.php");  

        }else{
            echo "Sorry, there was an error uploading your file.";
        }
        

    }

    if(empty($_SESSION["admin_username"])){
        header("location:index.php");
    }else{

        include("admin_header.php");

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
                            <h5 class="text-center mt-2" style="font-family: Montserrat, sans-serif;">ADD SLIDER</h5>
                            <form method="post" enctype="multipart/form-data" class="mt-5">
                                <div class="container">
                                    
                                    <hr>
                                        <!-- form add slider -->
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">SELECT IMAGE</label>
                                                <input type="file" name="fileToUpLoad" id="fileToUpLoad" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">ALTERNATE TEXT</label>
                                                <input type="text" name="slider_alt_txt" class="form-control" placeholder="Enter alternate text" required>
                                            </div>
                                            
                                            <div class="modal-group" style="text-align: right;">
                                                <button type="submit" name="btn_addslider" class="btn" style="background-image: linear-gradient(to right, #bdc3c7, #2c3e50); color:white;">Insert</button>
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

