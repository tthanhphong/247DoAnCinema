<?php 
    session_start();
    
    if(empty($_SESSION["admin_username"])){
        header("location:index.php");
    }else{

        include("../admin/admin_header.php");


        $con = new connec();
        $sql = "SELECT 247cinema.show.id, 247cinema.show.show_date, 247cinema.show.ticket_price, 247cinema.show.no_seat, movie.name AS 'movie_name', show_time.time, cinema.name AS 'name'
        FROM 247cinema.show, movie, show_time, cinema
        WHERE 247cinema.show.movie_id = movie.id
        AND 247cinema.show.cinema_id = cinema.id 
        AND 247cinema.show.show_time_id = show_time.id;";
        $result = $con->select_by_query($sql);

    ?>
        
            
        <section>
            <nav class="continer-fluid">
                    <div class="row">
                        <div class="col-md-2" style="background-image: linear-gradient(to bottom, #bdc3c7, #2c3e50); min-height: 450px;">
                            <?php 
                            include("../admin/admin_sidenavbar.php");
                            ?>
                        </div>
                        <div class="col-md-10">
                            <h5 class="text-center mt-2" style="font-family: Montserrat, sans-serif;" >CHI TIẾT SHOW</h5>
                            <b><a href="addmovieshow.php" style="color: gray;">THÊM SHOW</a></b>

                            <table class="table mt-5" border="1">
                                <thead style="background-color:#008080;">
                                    <tr style="color: white;">
                                        <th>ID</th>
                                        <th>NGÀY PHÁT HÀNH SHOW</th>
                                        <th>GIÁ VÉ</th>
                                        <th>SỐ LƯỢNG GHẾ</th>
                                        <th>TÊN PHIM</th>
                                        <th>THỜI LƯỢNG</th>
                                        <th>TÊN RẠP</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if($result ->num_rows > 0){
                                            while($row = $result->fetch_assoc()){
                                                ?>  
                                                    <tr>
                                                        <td><?php echo $row["id"]; ?></td>
                                                        <td><?php echo $row["show_date"]; ?></td>
                                                        <td><?php echo $row["ticket_price"]; ?></td>
                                                        <td><?php echo $row["no_seat"]; ?></td>
                                                        <td><?php echo $row["movie_name"]; ?></td>
                                                        <td><?php echo $row["time"]; ?></td>
                                                        <td><?php echo $row["name"]; ?></td>
                                                        
                                                        <td>
                                                            <a href="editseat.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">EDIT</a> |
                                                            <a href="deleteseat.php?id=" class="btn btn-danger">DELETE</a>
                                                        </td>
                                                    </tr>
                                                <?php
                                            }
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>


                        </div>
                    </div>
                </nav>
            </nav>
        </section>

    <?php

    include("../admin/admin_footer.php");
        }
    ?>

