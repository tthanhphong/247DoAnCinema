<?php
    session_start();
    include ("header.php");

    $con = new connec();
    $tbl = "slider";
    $result = $con->select_all($tbl);
    $result1 = $con->select_all($tbl);

    if(empty($_SESSION["username"]))
    {
        ?>     
        <script>
                $(document).ready(function(){   
                    $("#modelId1").modal('show');
                });
        </script>
        <?php
    }


?>  
<section>  

<div id="carouselId" class="carousel slide" data-ride="carousel">
    <?php  
        if($result->num_rows>0){
            $i = 0;
            echo '<ol class="carousel-indicators">';
            while($row = $result -> fetch_assoc()){
                if($i ==0){
                    echo'<li data-target="#carouselId" data-slide-to="'.$i.'" class="active"></li>';
                }else{  
                    echo '<li data-target="#carouselId" data-slide-to="'.$i.'"></li>';
                }
                $i++;
            }
            echo'</ol>';
        }

    ?>
    <!-- <ol class="carousel-indicators">
        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
        <li data-target="#carouselId" data-slide-to="1"></li>
        <li data-target="#carouselId" data-slide-to="2"></li>
    </ol> -->
    <div class="carousel-inner" role="listbox" >
        <?php
          if($result1 ->num_rows>0){
            $j = 0;
            while($row1 = $result1->fetch_assoc()){
                if($j==0)
                {
                    ?>
                        <div class="carousel-item active">
                            <img src="<?php echo $row1["img_path"];?>" alt="<?php echo $row1["alt"]; ?>" style="width: 100%; height: 550px;">
                        </div>        
                    <?php
                }else{
                    ?>
                        <div class="carousel-item">
                            <img src="<?php echo $row1["img_path"]; ?>" alt="<?php echo $row1["alt"]; ?>" style="width: 100%; height: 550px;">
                        </div>
                         
                    <?php
                }
                $j++;
            }
          }
        ?>
        <!-- Dự định làm form booking đè lên section slider -->
        <!-- <div class="form">
                <p style="background-color: aqua; position: absolute; right: 6%; bottom: ; width: 450px;">Lorem ipsum dolor sit 
                amet consectetur, adipisicing elit.
                 Voluptatibus voluptates perferendis soluta eligendi autem, 
                 minima fugiat, facere inventore culpa nostrum natus ullam
                  cumque accusantium aperiam fuga quam. Ut, vitae optio!</p>
        </div> -->

    </div>
    <!-- 
        <div class="carousel-item active">
            <img src="images/banner1.jpg" alt="First slide" style="width: 100%; height: 450px;">
        </div>
        <div class="carousel-item">
            <img src="images/banner2.jpg" alt="Second slide" style="width: 100%; height: 450px;">
        </div>
        <div class="carousel-item">
            <img src="images/banner3.jpg" alt="Third slide" style="width: 100%; height: 450px;">
        </div>
        <div class="carousel-item">
            <img src="images/banner4.jpg" alt="Four slide" style="width: 100%; height: 450px;">
        </div>
    -->

    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div> 
<!-- Phim sắp chiếu -->
<?php 
    $con = new connec();
    $tbl = "movie";
    $result =  $con->select_movie($tbl, "now()");
    
    ?>
    <section class="mt-3" >  
        <div class="container">   
        <h3 class="text-left" style="padding-bottom:1%;";>PHIM SẮP CHIẾU</h3>
        <hr>
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
                                <a href="detail.php?id=<?php echo $row["id"]; ?>"><img src="<?php echo $row["movie_banner"];?>"style="width: 100%; height: 350px;"></a>
                                <h6 class="text-center mt-2" style="height: 40px;"><?php echo $row["name"];?></h6>
                                <a class="btn" style="background-color:gray; color:white; width:100%; margin-bottom: 15px;" href="detail.php?id=<?php echo $row["id"]; ?>">CHI TIẾT PHIM</a>
                                </div>
                            <?php
                        }
                    }

                ?>
                
            </div>    
        </div>
    </section>
<!-- Phim đang chiếu -->
    <?php 
    $con = new connec();
    $tbl = "movie";
    $result =  $con->select_nowmovie($tbl, "now()");
    
    ?>
    <section class="mt-3" >  
        <div class="container">   
        <h3 class="text-left" style="padding-bottom:1%;";>PHIM ĐANG CHIẾU</h3>
        <hr>
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
                                <a href="booking.php"><img src="<?php echo $row["movie_banner"];?>"style="width: 100%; height: 350px;"></a>
                                <h6 class="text-center mt-2" style="height: 40px;"><?php echo $row["name"];?></h6>
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
<!-- Tin khuyến mãi -->
    <?php 
    $con = new connec();
    $tbl = "offer";
    $result =  $con->select_all($tbl);
    ?>

    <section class="mt-5">  
        <div class="container">
        <h3 class="text-left" style="padding-bottom:1%;">TIN KHUYẾN MÃI</h3>
        <hr>
            <div class="row">
                <?php 
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){

                            ?>
                            <div class="col-md-3" style="padding: 1%;">
                                <img src="<?php echo $row["img_path"];?>" style="width: 100%; height: 450px;">
                            </div>
                            <?php
                        }
                    }

                ?>
                
            </div>    
        </div>

    </section>
    <section class="mt-5">
        <div class="container">
            <h3 class="text-left" style="padding-bottom:1%;">247CINEMA</h3>
            <div><hr></div>
                <p><b>247Cinema</b> là một trong những công ty tư nhân đầu tiên về điện ảnh được thành lập từ năm 2003, 
                đã khẳng định thương hiệu là 1 trong 10 địa điểm vui chơi giải trí được yêu thích nhất. 
                Ngoài hệ thống rạp chiếu phim hiện đại, thu hút hàng triệu lượt người đến xem,
                <b>247Cinema</b> còn hấp dẫn khán giả bởi không khí thân thiện cũng như chất lượng dịch vụ hàng đầu.<br><br>
                Đến website 247cinema.vn, khách hàng sẽ dễ dàng tham khảo các phim hay nhất,
                phim mới nhất đang chiếu hoặc sắp chiếu luôn được cập nhật thường xuyên. 
                Lịch chiếu tại tất cả hệ thống rạp chiếu phim của <b>247Cinema</b> cũng được cập nhật đầy đủ hàng ngày hàng giờ trên trang chủ.<br><br>
                Từ vũ trụ điện ảnh Marvel, người hâm mộ sẽ có cuộc tái ngộ với Người Nhện qua Spider-Man: No Way Home hoặc Doctor Strange 2. 
                Ngoài ra 007: No Time To Die, Turning Red, Minions: The Rise Of Gru..., 
                là những tác phẩm hứa hẹn sẽ gây bùng nổ phòng vé trong thời gian tới.<br><br>
                Giờ đây đặt vé tại <b>247Cinema</b> càng thêm dễ dàng chỉ với vài thao tác vô cùng đơn giản. 
                Để mua vé, hãy vào tab Mua vé. Quý khách có thể chọn Mua vé theo phim, theo rạp, hoặc theo ngày. 
                Sau đó, tiến hành mua vé theo các bước hướng dẫn. Chỉ trong vài phút,
                quý khách sẽ nhận được tin nhắn và email phản hồi Đặt vé thành công của <b>247Cinema</b>. 
                Quý khách có thể dùng tin nhắn lấy vé tại quầy vé của <b>247Cinema</b> hoặc quét mã QR để một bước vào rạp mà không cần tốn thêm bất kỳ công đoạn nào nữa.<br>
                Nếu bạn đã chọn được phim hay để xem, hãy đặt vé cực nhanh bằng box Mua Vé Nhanh ngay từ Trang Chủ. 
                Chỉ cần một phút, tin nhắn và email phản hồi của <b>247Cinema</b> sẽ gửi ngay vào điện thoại và hộp mail của bạn.<br><br>
                Nếu chưa quyết định sẽ xem phim mới nào,
                hãy tham khảo các bộ phim hay trong mục Phim Đang Chiếu cũng như Phim Sắp Chiếu tại rạp chiếu phim bằng cách vào mục Bình Luận Phim ở Góc Điện Ảnh để đọc những bài bình luận chân thật nhất, 
                tham khảo và cân nhắc. Sau đó, chỉ việc đặt vé bằng box Mua Vé Nhanh ngay ở đầu trang để chọn được suất chiếu và chỗ ngồi vừa ý nhất.<br><br>
                <b>247Cinema</b> luôn có những chương trình khuyến mãi, ưu đãi, quà tặng vô cùng hấp dẫn như giảm giá vé, tặng vé xem phim miễn phí, tặng Combo, tặng quà phim…  
                dành cho các khách hàng. <br><br>Trang web galaxycine.vn còn có mục Góc Điện Ảnh - nơi lưu trữ dữ liệu về phim, diễn viên và đạo diễn, những bài viết chuyên sâu về điện ảnh, hỗ trợ người yêu phim dễ dàng hơn trong việc lựa chọn phim và bổ sung thêm kiến thức về điện ảnh cho bản thân. <br><br>Ngoài ra, vào mỗi tháng, Galaxy Cinema cũng giới thiệu các phim sắp chiếu hot nhất trong mục Phim Hay Tháng . Hiện nay, Galaxy Cinema đang ngày càng phát triển hơn nữa với các chương trình đặc sắc, các khuyến mãi hấp dẫn, đem đến cho khán giả những bộ phim bom tấn của thế giới và Việt Nam nhanh chóng và sớm nhất.

                </p>

        </div>  
    </section>
<?php
    include ("footer.php");
?>