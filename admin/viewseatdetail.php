<?php 
    session_start();
    
    if(empty($_SESSION["admin_username"])){
        header("location:index.php");
    }else{

        include("../admin/admin_header.php");


        $con = new connec();
        $sql = "SELECT seat_detail.id, customer.fullname, seat_detail.seat_no, 247cinema.show.id AS 'show_id', movie.name
        FROM
        seat_detail, customer, 247cinema.show
        JOIN movie
        WHERE
        seat_detail.cust_id = customer.id AND
        seat_detail.show_id = 247cinema.show.id AND
        movie.id = 247cinema.show.movie_id;";
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
                            <h4 class="text-center mt-2" style="font-family: Montserrat, sans-serif;" ><b>CHI TIẾT GHẾ</b></h4>
                

                            <table class="table mt-5" border="1">
                                <thead style="background-color:#008080;">
                                    <tr style="color: white;">
                                        <th>ID</th>
                                        <th>KHÁCH HÀNG</th>
                                        <th>SỐ LƯỢNG GHẾ</th>
                                        <th>TÊN PHIM</th>
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
                                                        <td><?php echo $row["fullname"]; ?></td>
                                                        <td><?php echo $row["seat_no"]; ?></td>
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

