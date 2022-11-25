<?php 
    session_start();
    
    if(empty($_SESSION["admin_username"])){
        header("location:index.php");
    }else{

        include("../admin/admin_header.php");


        $con = new connec();
        $sql = "SELECT seat_reserved.id, seat_reserved.show_id, customer.fullname, seat_reserved.seat_number, seat_reserved.reserved 
        FROM seat_reserved, customer 
        WHERE seat_reserved.cust_id = customer.id;";
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
                            <h5 class="text-center mt-2" style="font-family: Montserrat, sans-serif;" >CHI TIẾT GHÊ ĐẶT TRƯỚC</h5>

                            <table class="table mt-5" border="1">
                                <thead style="background-color:#008080;">
                                    <tr style="color: white;">
                                        <th>ID</th>
                                        <th>KHÁCH HÀNG</th>
                                        <th>CHI TIẾT GHẾ</th>
                                        <th>TRẠNG THÁI</th>
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
                                                        <td><?php echo $row["seat_number"]; ?></td>
                                                        <td>
                                                            <?php 
                                                                if($row["reserved"]){
                                                                    echo "<p>Already Booked</p>";
                                                                }
                                                                else{
                                                                    echo "<p>Available</p>";
                                                                }
                                                            ?>
                                                        
                                                        </td>
                                                        <td>
                                                            <a href="editseatreserved.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">EDIT</a> |
                                                            <a href="deleteseatreserved.php?id=" class="btn btn-danger">DELETE</a>
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

