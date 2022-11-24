<?php 
    session_start();
    
    if(empty($_SESSION["admin_username"])){
        header("location:index.php");
    }else{

        include("../admin/admin_header.php");


        $con = new connec();
        $sql = "SELECT booking.id, customer.fullname, booking.show_id, booking.no_ticket, booking.booking_date, booking.total_amount
        FROM booking, customer
        WHERE booking.cust_id = customer.id;";
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
                            <h4 class="text-center mt-2" style="font-family: Montserrat, sans-serif;" ><b>DANH SÁCH ĐẶT VÉ</b></h4> 
                            <table class="table mt-5" border="1">
                                <thead style="background-color:#008080;">
                                    <tr style="color: white;"> 
                                        <th>ID</th>     
                                        <th>FULL NAME</th>
                                        <th>ID SHOW</th>
                                        <th>NUMBER OF TICKET</th>
                                        <th>BOOKING DATE</th>
                                        <th>TOTAL</th>
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
                                                        <td><?php echo $row["show_id"]; ?></td>
                                                        <td> <?php echo $row["no_ticket"];?></td>
                                                        <td><?php echo $row["booking_date"]; ?></td>
                                                        <td><?php echo $row["total_amount"]; ?></td>

                                                        <td>
                                                        <a href="editmovie.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">EDIT</a> |
                                                        <a href="deletemovie.php?id=" class="btn btn-danger">DELETE</a>
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

