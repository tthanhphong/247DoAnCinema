<?php 
    session_start();
    
    if(empty($_SESSION["admin_username"])){
        header("location:index.php");
    }else{

        include("../admin/admin_header.php");


        $con = new connec();
        $tbl = "contact";
        $result = $con->select_all($tbl);


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
                            <h5 class="text-center mt-2" style="font-family: Montserrat, sans-serif;">CONTACT DETAILS</h5>
                            <b><a href="addcustomer.php" style="color: gray;">ADD CONTACT</a></b>

                            <table class="table mt-5" border="1">
                                <thead style="background-color:#008080;">
                                    <tr style="color: white;">
                                        <th>ID</th>
                                        <th>NAME</th>
                                        <th>EMAIL</th>
                                        <th>NO. PHONE</th>
                                        <th>CONTENT MESSAGE</th>
                                        <th>MESSAGE_FATE</th>
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
                                                        <td><?php echo $row["name"]; ?></td>
                                                        <td><?php echo $row["email"]; ?></td>
                                                        <td><?php echo $row["number"]; ?></td>
                                                        <td><?php echo $row["message"]; ?></td>
                                                        <td><?php echo $row["msg_date"]; ?></td>

                                                        <td>
                                                            <a href="editcinema.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">EDIT</a> |
                                                            <a href="deletecinema.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">DELETE</a>
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

