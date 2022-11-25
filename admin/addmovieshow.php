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
        $sql = "INSERT INTO `show`(`id`, `movie_id`, `show_date`, `show_time_id`, `no_seat`, `cinema_id`, `ticket_price`) VALUES (0,$movie,$show,$show_time,$no,$cinema,$ticket)";
        $con ->insert($sql,"Record Inserted");
        header("location:viewmovieshow.php");
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
                            <h5 class="text-center mt-2" style="font-family: Montserrat, sans-serif;">ADD SHOW</h5>
                            <form method="post">
                <div class="container-fluid">
                    </div>
                    <hr>
                        <!-- form add cinema -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">PHIM ID</label>
                                <input type="text" name="movie_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Cinema Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">NGÀY XUẤT CHIẾU</label>
                                <input type="date" name="show_date" class="form-control" placeholder="Enter alternate text" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">THỜI LƯỢNG ID</label>
                                <input type="text" name="show_time_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Cinema Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">SỐ LƯỢNG GHẾ</label>
                                <input type="text" name="no_seat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Cinema Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">RẠP ID</label>
                                <input type="text" name="cinema_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Cinema Name">
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

