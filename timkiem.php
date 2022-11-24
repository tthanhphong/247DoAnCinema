<?php 
 include ("header.php");


 if(isset($_POST["timkiem"])){
     $tukhoa = $_POST['tukhoa'];
     $con = new connec();
     $tbl = "movie";
     $result = $con->find($tbl,$tukhoa);
}
?>

<section class="mt-5">  
    <h3 class="text-center">KẾT QUẢ TÌM KIẾM<?php $_POST['timkiem']; ?></h3>
    <div class="container">
        <div class="row">
            <?php 
                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){

                        $ind = $con->select("industry",$row["industry_id"]);
                        $indrow = $ind->fetch_assoc();

                        $lang = $con->select("language",$row["lang_id"]);
                        $langrow = $lang->fetch_assoc();

                        $genre = $con->select("genre",$row["genre_id"]);
                        $genrerow = $genre->fetch_assoc();

                        ?>
                        <div class="col-md-3">
                            <img src="<?php echo $row["movie_banner"];?>"style="width: 100%; height: 350px;">
                            
                            <h6 class="text-center mt-2" style="height: 40px;"><?php echo $row["name"];?></h6>
                            <p><b>Release Date:</b><?php echo $row["rel_date"]; ?></p>
                            <p><b>Industry    :</b><?php echo $indrow["industry_name"]; ?></p>
                            <p><b>Language    :</b><?php echo $langrow["language_name"]; ?></p>
                            <p><b>Genere      :</b><?php echo $genrerow["genre_name"]; ?></p>
                            <a class="btn" style="background-color: gray; color: white; width:45%; margin-bottom: 15px;" href="booking.php">ĐẶT VÉ</a>
                            &nbsp;&nbsp;
                            <a class="btn" style="background-color:gray; color:white; width:45%; margin-bottom: 15px; " href="detail.php?id=<?php echo $row["id"]; ?>">CHI TIẾT</a>
                            
                            </div>
                        <?php
                    }
                }

            ?>
            
        </div>    
    </div>
</section>




<?php   
 include ("footer.php");

?>