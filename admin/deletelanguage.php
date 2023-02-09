<?php 
    session_start();
    $language = "";

      
    if(isset($_POST["btn_cancellanguage"])){
        header("location:viewlanguage.php");
    }
    if(isset($_POST["btn_deletelanguage"])){

        include("../conn.php");

        $id = $_GET["id"];  
        $table = "language";
        $con = new connec();
        
        $con ->delete($table, $id);
        header("location:viewlanguage.php");
    }
    
    if(empty($_SESSION["admin_username"])){
        header("location:index.php");

    }else{
        include("../admin/admin_header.php");
        
        if(isset($_GET["id"])){

            $id = $_GET["id"];
            $con = new connec();
            $tbl = "language";
            $result = $con->select($tbl,$id);
            if($result ->num_rows > 0){
                $row = $result->fetch_assoc();
                $n = $row["language_name"];

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
                            <h4 class="text-center mt-2" style="font-family: Montserrat, sans-serif;"><b>DELETE NGÔN NGỮ</b></h4>
                            <form method="post">
                <div class="container-fluid">
                    </div>
                    <hr>
                        <!-- form login -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">TÊN NGÔN NGỮ</label>
                                <input type="text" name="language_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Cinema Name" value="<?php echo $n; ?>">
                            </div>
                            
                            <div class="modal-group" style="text-align: right;">

                                <button type="submit" name="btn_cancellanguage"class="btn btn-danger" style="color:white;">Cancel</button>
                                <button type="submit" name="btn_deletelanguage" class="btn" style="background-image: linear-gradient(to right, #bdc3c7, #2c3e50); color:white;">Delete</button>
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

