<?php 
    session_start();
    
    if(empty($_SESSION["admin_username"])){
        header("location:index.php");
    }else{

        include("../admin/admin_header.php");


        $con = new connec();
        $sql = "SELECT movie.id, movie.name, movie.movie_banner, movie.rel_date, industry.industry_name, genre.genre_name, language.language_name, movie.duration
        FROM movie, genre, industry, 247cinema.language
        WHERE
        movie.industry_id = industry.id AND
        movie.genre_id = genre.id AND
        movie.lang_id = language.id;";
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
                            <h5 class="text-center mt-2" style="font-family: Montserrat, sans-serif;" >MOVIE DETAILS</h5>
                            <b><a href="addmovie.php" style="color: gray;">ADD MOVIE</a></b>

                            <table class="table mt-5" border="1">
                                <thead style="background-color:#008080;">
                                    <tr style="color: white;">
                                        <th>BANNER</th>
                                        <th>NAME</th>
                                        <th>RELEASE DATE</th>
                                        <th>INDUSTRY</th>
                                        <th>GENRE</th>
                                        <th>LANGUAGE</th>
                                        <th>MOVIE DURATION </th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if($result ->num_rows > 0){
                                            while($row = $result->fetch_assoc()){
                                                ?>  
                                                    <tr>
                                                        <td><img src="../<?php echo $row["movie_banner"]; ?>" style="height: 100px;"></td>
                                                        <td><?php echo $row["name"]; ?></td>
                                                        <td><?php echo $row["rel_date"]; ?></td>
                                                        <td><?php echo $row["industry_name"]; ?></td>
                                                        <td><?php echo $row["genre_name"]; ?></td>
                                                        <td><?php echo $row["language_name"]; ?></td>
                                                        <td><?php echo $row["duration"]; ?></td>

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

