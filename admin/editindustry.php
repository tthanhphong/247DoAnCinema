<?php 
    session_start();
    $industry = "";
       
    if(isset($_POST["btn_editindustry"])){

        include("../conn.php");
        
        $industry_name = $_POST["industry_name"];

        $id = $_GET["id"];  
        $con = new connec();
        $sql = "update industry set industry_name= '$industry_name' WHERE id=$id;";
        $con ->update($sql,"Record Update");
        header("location:viewindustry.php");
    }
    
    if(empty($_SESSION["admin_username"])){
        header("location:index.php");

    }else{
        include("../admin/admin_header.php");
        
        if(isset($_GET["id"])){

            $id = $_GET["id"];
            $con = new connec();
            $tbl = "industry";
            $result = $con->select($tbl,$id);
            if($result ->num_rows > 0){
                $row = $result->fetch_assoc();

                $industry = $row["industry_name"];

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
                            <h4 class="text-center mt-2" style="font-family: Montserrat, sans-serif;"><b>EDIT QUỐC GIA</b></h4>
                            <form method="post">
                <div class="container-fluid">
                    </div>
                    <hr>
                            <div class="form-group">
                                <label for="exampleInputEmail1">TÊN QUỐC GIA</label>
                                <input type="text" name="industry_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Industry Name"value="<?php echo $industry; ?>">
                            </div>
                            <div class="modal-group" style="text-align: right;">
                                <button type="submit" name="btn_editindustry" class="btn" style="background-image: linear-gradient(to right, #bdc3c7, #2c3e50); color:white;">UPDATE</button>
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

