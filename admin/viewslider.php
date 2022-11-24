<?php 
    session_start();
    
    if(empty($_SESSION["admin_username"])){
        header("location:index.php");
    }else{

        include("../admin/admin_header.php");


        $con = new connec();
        $tbl = "slider";
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
                            <h5 class="text-center mt-2" style="font-family: Montserrat, sans-serif;" >SLIDER DETAILS</h5>
                            <b><a href="addslider.php" style="color: gray;">ADD SLIDER</a></b>

                            <table class="table mt-5" border="1">
                                <thead style="background-color:#008080;">   
                                    <tr style="color: white;">
                                        <th>ID</th>
                                        <th>IMAGE</th>
                                        <th>ALT .TEXT</th>
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
                                                        <td><img src="../<?php echo $row["img_path"]; ?>" style="height: 100px;"></td>
                                                        <td><?php echo $row["alt"]; ?></td>
                                                        <td>
                                                            <a href="editslider.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">EDIT</a> |
                                                            <a href="deleteslider.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">DELETE</a>
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

