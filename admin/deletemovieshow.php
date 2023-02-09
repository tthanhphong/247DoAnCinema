<?php 
    session_start();

    $movie_id="";
    $show_date="";
    $show_time_id="";
    $no_seat="";
    $cinema_id="";
    $ticket_price="";
    
    if(isset($_POST["btn_deletemovieshow"])){

        include("../conn.php");

        $id = $_GET["id"];  
        $table = "247cinema.show";
        $con = new connec();
        
        $con ->delete($table, $id);
        header("location:viewmovieshow.php");
    }

    if(empty($_SESSION["admin_username"])){
        header("location:index.php");
    }else{

        include("../admin/admin_header.php");

        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $con = new connec();
            $tbl = "247cinema.show";
            $result = $con->select($tbl,$id);
            
            if($result ->num_rows > 0){
                $row = $result->fetch_assoc();

                $movie_id= $row["movie_id"];
                $show_date= $row["show_date"];
                $show_time_id= $row["show_time_id"];
                $no_seat= $row["no_seat"];
                $cinema_id= $row["cinema_id"];
                $ticket_price= $row["ticket_price"];
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
                                <!-- form add movie show -->
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">TÊN PHIM</label>
                                                <input type="text" name="movie_id" class="form-control" placeholder="Enter alternate text" value=" <?php echo $movie_id; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">NGÀY XUẤT CHIẾU</label>
                                                <input type="text" name="show_date" class="form-control" placeholder="Enter alternate text" value=" <?php echo $show_date; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">THỜI LƯỢNG PHIM</label>
                                                <input type="text" name="show_time_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Cinema Name" value=" <?php echo $show_time_id; ?>" required>
                                            </div>
                                            

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">SỐ LƯỢNG GHẾ</label>
                                                <input type="text" name="no_seat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Cinema Name" value=" <?php echo $no_seat; ?>" required>
                                            </div>

                                            <div class="form-group">
                                            <label for="exampleInputEmail1">RẠP CHIẾU PHIM</label>
                                                <input type="text" name="cinema_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Cinema Name" value=" <?php echo $cinema_id; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">GIÁ VÉ</label>
                                                <input type="text" name="ticket_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Cinema Name" value=" <?php echo $ticket_price; ?>" required>
                                            </div>

                                            <div class="modal-group" style="text-align: right;">
                                                <button type="submit" name="btn_cancelmovieshow"class="btn btn-danger" style="color:white;">Cancel</button>
                                                <button type="submit" name="btn_deletemovieshow" class="btn" style="background-image: linear-gradient(to right, #bdc3c7, #2c3e50); color:white;">Delete</button>
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

