<?php 
    session_start();
    
       
    if(isset($_POST["btn_addmovie"])){

        $name = $_POST["name"];
        $movie_desc = $_POST["movie_desc"];
        $rel_date = $_POST["rel_date"];
        $industry_id = $_POST["industry_id"];
        $genre_id = $_POST["genre_id"];
        $lang_id = $_POST["lang_id"];
        $duration = $_POST["duration"];
       
         
        $target_dir = "images/";
        $target_file = $target_dir.$_FILES["fileToUpLoad"]["name"];
        
        $target_dir_01 = "../images/";
        $target_file_01 = $target_dir_01.$_FILES["fileToUpLoad"]["name"];

        $uploadOK = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if(move_uploaded_file($_FILES["fileToUpLoad"]["tmp_name"], $target_file_01)){  

            include("../conn.php");
            $con = new connec();
            // $sql = "insert into movie values (0,'$name','$target_file','$movie_desc','$rel_date',$industry_id,$genre_id,$lang_id,'$duration');";
            $sql = "INSERT INTO `movie`(`id`, `name`, `movie_banner`, `movie_desc`, `rel_date`, `industry_id`, `genre_id`, `lang_id`, `duration`) VALUES (0, '$name', '$target_file', '$movie_desc', '$rel_date', $industry_id, $genre_id, '$lang_id', '$duration');";

            $con->insert($sql,"Record Inserted");
            header("location:viewmovie.php");  

        }else{
            echo "Sorry, there was an error uploading your file.";
        }
        

    }

    if(empty($_SESSION["admin_username"])){
        header("location:index.php");
    }else{

        include("admin_header.php");

        $con = new connec();
        

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
                                                <label for="exampleInputPassword1">TÊN PHIM</label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter alternate text" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">CHỌN ẢNH</label>
                                                <input type="file" name="fileToUpLoad" id="fileToUpLoad" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">MÔ TẢ PHIM</label>
                                                <input type="text" name="movie_desc" class="form-control" placeholder="Enter alternate text" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">NGÀY ĐẶT VÉ</label>
                                                <input type="date" name="rel_date" class="form-control" placeholder="Enter alternate text" required>
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
                                                <input type="text" name="duration" class="form-control" placeholder="Enter alternate text" required>
                                            </div>
                                            <div class="modal-group" style="text-align: right;">
                                                <button type="submit" name="btn_addmovie" class="btn" style="background-image: linear-gradient(to right, #bdc3c7, #2c3e50); color:white;">Insert</button>
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

