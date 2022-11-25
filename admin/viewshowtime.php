<?php 
    session_start();
    
    if(empty($_SESSION["admin_username"])){
        header("location:index.php");
    }else{

        include("../admin/admin_header.php");


        $con = new connec();
        $tbl = "show_time";
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
                            <h5 class="text-center mt-2" style="font-family: Montserrat, sans-serif;" >THỜI GIAN SHOW</h5>
                            <b><a href="addshowtime.php" style="color: gray;">ADD THỜI GIAN SHOW</a></b>

                            <table class="table mt-5" border="1">
                                <thead style="background-color:#008080;">   
                                    <tr style="color: white;">
                                        <th>ID</th>
                                        <th>TIME</th>
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
                                                        <td><?php echo $row["time"]; ?></td>

                                                        <td>
                                                            <a href="editshowtime.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">EDIT</a> |
                                                            <a href="deleteshowtime.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">DELETE</a>
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

