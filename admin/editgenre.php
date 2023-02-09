<?php 
    session_start();
    $genre = "";
       
    if(isset($_POST["btn_editgenre"])){

        include("../conn.php");
        
        $genre_name = $_POST["genre_name"];

        $id = $_GET["id"];  
        $con = new connec();
        $sql = "update genre set genre_name= '$genre_name' WHERE id=$id;";
        $con ->update($sql,"Record Update");
        header("location:viewgenre.php");
    }
    
    if(empty($_SESSION["admin_username"])){
        header("location:index.php");

    }else{
        include("../admin/admin_header.php");
        
        if(isset($_GET["id"])){

            $id = $_GET["id"];
            $con = new connec();
            $tbl = "genre";
            $result = $con->select($tbl,$id);
            if($result ->num_rows > 0){
                $row = $result->fetch_assoc();

                $genre = $row["genre_name"];

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
                            <h5 class="text-center mt-2" style="font-family: Montserrat, sans-serif;">EDIT THỂ LOẠI</h5>
                            <form method="post">
                <div class="container-fluid">
                    </div>
                    <hr>
                            <div class="form-group">
                                <label for="exampleInputEmail1">TÊN THỂ LOẠI</label>
                                <input type="text" name="genre_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Cinema Name"value="<?php echo $genre; ?>">
                            </div>
                            <div class="modal-group" style="text-align: right;">
                                <button type="submit" name="btn_editgenre" class="btn" style="background-image: linear-gradient(to right, #bdc3c7, #2c3e50); color:white;">UPDATE</button>
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

