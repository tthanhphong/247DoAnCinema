<?php 
    session_start();

    $imgsrc="";
    $name="";
    $rel_date="";
    $movie_desc="";
    $industry_id="";
    $genre_id="";
    $lang_id="";
    $duration="";
       
    if(isset($_POST["btn_deletemovie"])){

        include("../conn.php");

        $id = $_GET["id"];  
        $table = "movie";
        $con = new connec();
        
        $con ->delete($table, $id);
        header("location:viewmovie.php");
    }
    


    if(empty($_SESSION["admin_username"])){
        header("location:index.php");
    }else{

        include("../admin/admin_header.php");

        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $con = new connec();
            $tbl = "movie";
            $result = $con->select($tbl,$id);
            if($result ->num_rows > 0){
                $row = $result->fetch_assoc();

                $imgsrc = $row["movie_banner"];
                $name= $row["name"];
                $rel_date= $row["rel_date"];
                $movie_desc= $row["movie_desc"];
                $industry_id= $row["industry_id"];
                $genre_id= $row["genre_id"];
                $lang_id= $row["lang_id"];
                $duration= $row["duration"];
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
                            <h4 class="text-center mt-2" style="font-family: Montserrat, sans-serif;"><b>DELETE MOVIE</b></h4>
                            <form method="post" enctype="multipart/form-data" class="mt-5">
                                <div class="container">
                                    
                                    <hr>
                                        <!-- form update slider -->
                                            <!-- <div class="form-group">
                                                <label for="exampleInputEmail1">CHỌN ẢNH</label>
                                                <input type="file" name="fileToUpLoad" id="fileToUpLoad" value=" <?php echo $imgsrc; ?>" required>  
                                            </div> -->
                                                <img src="../<?php echo $imgsrc; ?>" alt="<?php echo $alt; ?>" style="height: 150px;"/>
                                            <br><br>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">TÊN PHIM</label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter alternate text" value="<?php echo $name; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">NGÀY PHÁT HÀNH</label>
                                                <input type="date" name="rel_date" class="form-control" placeholder="Enter alternate text" value="<?php echo $rel_date; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">NỘI DUNG</label>
                                                <input type="text" name="movie_desc" class="form-control" placeholder="Enter alternate text" value="<?php echo $movie_desc; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">QUỐC GIA</label>
                                                <input type="text" name="industry_id" class="form-control" placeholder="Enter alternate text" value="<?php echo $industry_id; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">THỂ LOẠI </label>
                                                <input type="text" name="genre_id" class="form-control" placeholder="Enter alternate text" value="<?php echo $genre_id; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">NGÔN NGỮ</label>
                                                <input type="text" name="lang_id" class="form-control" placeholder="Enter alternate text" value="<?php echo $lang_id; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">THỜI LƯỢNG</label>
                                                <input type="text" name="duration" class="form-control" placeholder="Enter alternate text" value="<?php echo $duration; ?>" required>
                                            </div>
                                            <div class="modal-group" style="text-align: right;">
                                                <button type="submit" name="btn_deletemovie" class="btn" style="background-image: linear-gradient(to right, #bdc3c7, #2c3e50); color:white;">DELETE</button>
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

