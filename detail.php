<?php 
 include ("header.php");

    $imgsrc="";
    $n="";
    $d="";
    $r="";
    $dr="";

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $con = new connec();
        $tbl = "movie";
        $result = $con->select($tbl,$id);
        if($result ->num_rows > 0){
            $row = $result->fetch_assoc();

            $imgsrc = $row["movie_banner"];
            $n = $row["name"];
            $d = $row["movie_desc"];
            $r = $row["rel_date"];
            $dr = $row["duration"];

            
        }
        
}
$con = new connec();
$tbl = "movie";
$result =  $con->select_movie($tbl, "now()");
 
?>

<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="../<?php echo $imgsrc; ?>"style="height: 350px;" />
            </div>
            <div class="col-md-6" style="text-align: left;">
                <h4 style="text-align: center;"><b><?php echo $n; ?></b></h4>
                <h5><b>NGÀY KHỞI CHIẾU:</b>&nbsp;&nbsp;<?php echo $r; ?></h5>
                <h5><b>THỜI LƯỢNG:</b>&nbsp;&nbsp;<?php echo $dr; ?></h5>
                <h5><b>MÔ TẢ:</b>&nbsp;&nbsp;<?php echo $d; ?></h5>

            </div>  
            <div class="col-md-3">
            <h3 class="text-center">PHIM SẮP CHIẾU</h3>
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
  
                            <a href="detail.php?id=<?php echo $row["id"]; ?>"><img  src="<?php echo $row["movie_banner"];?>"style="width: 100%; height: 350px;"></a>
                            <h6 class="text-center mt-2"><?php echo $row["name"];?> <hr></h6>
                           
                        <?php
                        

                    }
                }

            ?>
            
            </div>
            
            
        </div>
    </div>
</section>

<?php   
 include ("footer.php");
?>