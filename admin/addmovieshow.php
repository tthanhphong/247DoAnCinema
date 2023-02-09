<?php 
    session_start();
    
       
    if(isset($_POST["btn_addmovieshow"])){

        
        $movie = $_POST["movie_id"];
        $show = $_POST["show_date"];
        $show_time = $_POST["show_time_id"];
        $no = $_POST["no_seat"];
        $cinema = $_POST["cinema_id"];
        $ticket = $_POST["ticket_price"];

 
        include("../conn.php");
        $con = new connec();
        $sql = "INSERT INTO `show`(`id`, `movie_id`, `show_date`, `show_time_id`, `no_seat`, `cinema_id`, `ticket_price`) VALUES (0,$movie,'$show',$show_time,$no,$cinema,$ticket)";
        $con ->insert($sql,"Record Inserted");
        header("location:viewmovieshow.php");
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
                            <h5 class="text-center mt-2" style="font-family: Montserrat, sans-serif;">ADD SHOW</h5>
                            <form method="post">
                    <div class="container-fluid">
                        </div>
                        <hr>
                        <!-- form add movie show -->
                            <div class="form-group">
                                <label for="exampleInputPassword1">PHIM</label>
                                <!-- <input type="text" name="show_id" class="form-control" required > -->
                                <label for="exampleInputPassword1"></label>
                                <select class="form-control" name="movie_id" id="movie_id"> 
                                    <option>Chọn Phim</option>
                                    <?php 

                                        $result = $con->select_show_movie_id(); 

                                        if($result->num_rows>0){
                                            while($row = $result->fetch_assoc()){

                                                $movie = $con->select("movie",$row["movie_id"]);
                                                $movierow = $movie->fetch_assoc();

                                                echo '<option value="'.$row["movie_id"].'"> '.$movierow["name"].' </option>';
                                            }
                                        }
                                    
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">NGÀY XUẤT CHIẾU</label>
                                <input type="date" name="show_date" class="form-control" placeholder="Enter alternate text" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">THỜI LƯỢNG PHIM</label>
                                <!-- <input type="text" name="show_id" class="form-control" required > -->
                                <label for="exampleInputPassword1"></label>
                                <select class="form-control" name="show_time_id" id="show_time_id"> 
                                    <option>Chọn Thời Lượng Phim</option>
                                    <?php 

                                        $result1 = $con->select_show_show_time_id(); 

                                        if($result1->num_rows>0){
                                            while($row = $result1->fetch_assoc()){

                                                $show_time = $con->select("show_time",$row["show_time_id"]);
                                                $show_timerow = $show_time->fetch_assoc();

                                                echo '<option value="'.$row["show_time_id"].'"> '.$show_timerow["time"].' </option>';
                                            }
                                        }
                                    
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">SỐ LƯỢNG GHẾ</label>
                                <input type="text" name="no_seat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Cinema Name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">RẠP CHIẾU PHIM</label>
                                <!-- <input type="text" name="show_id" class="form-control" required > -->
                                <label for="exampleInputPassword1"></label>
                                <select class="form-control" name="cinema_id" id="cinema_id"> 
                                    <option>Chọn RẠP CHIẾU</option>
                                    <?php 

                                        $result2 = $con->select_show_cinema_id(); 

                                        if($result2->num_rows>0){
                                            while($row = $result2->fetch_assoc()){

                                                $cinema_id = $con->select("cinema",$row["cinema_id"]);
                                                $cinemarow = $cinema_id->fetch_assoc();

                                                echo '<option value="'.$row["cinema_id"].'"> '.$cinemarow["name"].' </option>';
                                            }
                                        }
                                    
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">GIÁ VÉ</label>
                                <input type="text" name="ticket_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Cinema Name">
                            </div>
                            <div class="modal-group" style="text-align: right;">
                                <button type="submit" name="btn_addmovieshow" class="btn" style="background-image: linear-gradient(to right, #bdc3c7, #2c3e50); color:white;">Insert</button>
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

