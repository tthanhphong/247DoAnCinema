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

    if(isset($_POST["btn_editmovie"])){

        $name= $_POST["name"];
        $rel_date= $_POST["rel_date"];
        $movie_desc= $_POST["movie_desc"];
        $industry_id= $_POST["industry_id"];
        $genre_id= $_POST["genre_id"];
        $lang_id= $_POST["lang_id"];
        $duration= $_POST["duration"];


        $target_dir = "images/";
        $target_file = $target_dir.$_FILES["fileToUpLoad"]["name"];
        
        $target_dir_01 = "../images/";
        $target_file_01 = $target_dir_01.$_FILES["fileToUpLoad"]["name"];

        $uploadOK = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if(move_uploaded_file($_FILES["fileToUpLoad"]["tmp_name"], $target_file_01)){  

            include("../conn.php");
            $id = $_GET["id"];  
            $con=new connec();
            $sql = "update movie SET name='$name', movie_banner='$target_file', movie_desc='$movie_desc', rel_date='$rel_date', industry_id='$industry_id', genre_id='$genre_id', lang_id='$lang_id', duration='$duration' WHERE id=$id;";
            $con ->update($sql,"Record Update");
            header("location:viewmovie.php");  

        }
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
                            <h4 class="text-center mt-2" style="font-family: Montserrat, sans-serif;"><b>UPDATE MOVIE</b></h4>
                            <form method="post" enctype="multipart/form-data" class="mt-5">
                                <div class="container">
                                    
                                    <hr>
                                        <!-- form update slider -->
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">CHỌN ẢNH</label>
                                                <input type="file" name="fileToUpLoad" id="fileToUpLoad" value=" <?php echo $imgsrc; ?>" required>  
                                            </div>
                                                <img src="../<?php echo $imgsrc; ?>" alt="<?php echo $alt; ?>" style="height: 150px;"/>
                                            <br><br>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">TÊN PHIM</label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter text" value="<?php echo $name; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">NGÀY PHÁT HÀNH</label>
                                                <input type="date" name="rel_date" class="form-control" placeholder="Enter text" value="<?php echo $rel_date; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">NỘI DUNG</label>
                                                <input type="textarea" name="movie_desc" class="form-control" placeholder="Enter text" value="<?php echo $movie_desc; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">QUỐC GIA</label>
                                                <!-- <input type="text" name="show_id" class="form-control" required > -->
                                                <label for="exampleInputPassword1"></label>
                                                <select class="form-control" name="industry_id" id="industry_id"> 
                                                    <option>Chọn Quốc Gia</option>
                                                    <?php 

                                                        $result1 = $con->select_movie_industry(); 

                                                        if($result1->num_rows>0){
                                                            while($row = $result1->fetch_assoc()){

                                                                $industry = $con->select("industry",$row["industry_id"]);
                                                                $industryrow = $industry->fetch_assoc();

                                                                echo '<option value="'.$row["industry_id"].'"> '.$industryrow["industry_name"].' </option>';
                                                            }
                                                        }
                                                    
                                                    ?>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">THỂ LOẠI</label>
                                                <!-- <input type="text" name="show_id" class="form-control" required > -->
                                                <label for="exampleInputPassword1"></label>
                                                <select class="form-control" name="genre_id" id="genre_id"> 
                                                    <option>Chọn Thể Loại</option>
                                                    <?php  
                                                    // $genre = $con->select("genre",$row["genre_id"]);
                                                    // $genrerow = $genre->fetch_assoc();
                                                    //     <p><b>Genere      :</b><?php echo $genrerow["genre_name"];
                                                    $result = $con->select_movie_genre(); 
                                                        if($result->num_rows>0){
                                                            while($row = $result->fetch_assoc()){

                                                                $genre = $con->select("genre",$row["genre_id"]);
                                                                $genrerow = $genre->fetch_assoc();

                                                                echo '<option value="'.$row["genre_id"].'"> '.$genrerow["genre_name"].' </option>';
                                                            }
                                                        }
                                                    
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">NGÔN NGỮ</label>
                                                <!-- <input type="text" name="show_id" class="form-control" required > -->
                                                <label for="exampleInputPassword1"></label>
                                                <select class="form-control" name="lang_id" id="lang_id"> 
                                                    <option>Chọn Ngôn Ngữ</option>
                                                    <?php  
                                                    // $genre = $con->select("genre",$row["genre_id"]);
                                                    // $genrerow = $genre->fetch_assoc();
                                                    //     <p><b>Genere      :</b><?php echo $genrerow["genre_name"];
                                                    $result2 = $con->select_movie_language(); 

                                                        if($result2->num_rows>0){
                                                            while($row = $result2->fetch_assoc()){

                                                                $genre = $con->select("language",$row["lang_id"]);
                                                                $genrerow = $genre->fetch_assoc();

                                                                echo '<option value="'.$row["lang_id"].'"> '.$genrerow["language_name"].' </option>';
                                                            }
                                                        }
                                                    
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">THỜI LƯỢNG</label>
                                                <input type="text" name="duration" class="form-control" placeholder="Enter text" value="<?php echo $duration; ?>" required>
                                            </div>
                                            <div class="modal-group" style="text-align: right;">
                                                <button type="submit" name="btn_cancelmovie"class="btn btn-danger" style="color:white;">Cancel</button>
                                                <button type="submit" name="btn_editmovie" class="btn" style="background-image: linear-gradient(to right, #bdc3c7, #2c3e50); color:white;">Update</button>
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

