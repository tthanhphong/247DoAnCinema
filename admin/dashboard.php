<?php 
    session_start();
    
    if(empty($_SESSION["admin_username"])){
        header("location:index.php");
    }else{

        include("../admin/admin_header.php");
    ?>
        
        
        <section>
            <nav class="continer">
                    <div class="row">
                        <div class="col-md-3" style="background-image: linear-gradient(to bottom, #bdc3c7, #2c3e50); min-height: 450px;">
                            <?php 
                            include("../admin/admin_sidenavbar.php");
                            ?>
                        </div>
                        <div class="col-md-9">
                        <h4 class="text-center mt-2" style="font-family: Montserrat, sans-serif;" ><b>ADMIN DASHBOARD</b></h4>
                        </div>
                    </div>
                </nav>
            </nav>
        </section>

    <?php

    include("../admin/admin_footer.php");
        }
    ?>

