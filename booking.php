<?php 
session_start();

 if(empty($_SESSION["username"])){
    header("location:index.php");
 }else{
    include("header.php");
 }

$con = new connec();
 $result = $con->select_show_dt(); 
 $checked_value=0;

if(isset($_POST["btn_booking"])){
    $con = new connec();

    $cust_id=$_POST["cust_id"];
    $show_id=$_POST["show_id"];
    $no_tiks=$_POST["no_ticket"];
    $bkng_date=$_POST["booking_date"];
    $total_amnt = (400 * $no_tiks);

    $seat_number = $_POST["seat_dt"];
    $seat_arr = explode(", ",$seat_number);

    //seat_reserved là ghế được đặt trước
    foreach($seat_arr as $item){
        $sql = "INSERT INTO seat_reserved VALUES (0,$show_id,$cust_id,'$item','true')";
        $abc = $con->insert_lastid($sql);
    }
    //chi tiết vé
    $sql = "INSERT INTO seat_detail VALUES (0, $cust_id, $show_id, $no_tiks)";
    $seat_dt_id = $con->insert_lastid($sql);

    //đặt vé
    $sql = "INSERT INTO booking VALUES (0, $cust_id, $show_id, $no_tiks, $seat_dt_id, '$bkng_date', $total_amnt)";
    $con ->insert($sql,"Your Ticket Is Booked");
}

?>

<script>
    //Tạo hàng cột ghế, button....
    $(document).ready(function(){
        for(i=1; i<=10; i++){
                for(j = 1; j <=5; j++){
                    $('#seat_chart').append('<div class="col-md-2 mt-2 mb-2 ml-2 mr-2 text-center" style="background-color:#008080; color: white;"><input type="checkbox" id="seat" value="R'+(i+'S'+j)+'" name="seat_chart[]" class="mr-2 col-md-2 mb-2" onclick="checkboxtotal();" />R'+(i+'S'+j)+'</div>')
                }
        } 

        // $('show_id').change(function(){
        //     <?php  
        //         if($result ->num_rows){
        //             while($row1 = $result1->fetch_assoc()){
        //                 if($row1[""]){

        //                 }
        //             }
        //         }

        //     ?>
        // });
    });
    // lấy dữ liệu hàng ghế trên
    function checkboxtotal(){
        var seat=[];
        $('input[name="seat_chart[]"]:checked').each(function(){
            seat.push($(this).val());
        }); 

        var st=seat.length;
        document.getElementById('no_ticket').value=st;

        var total ="Rs. " +(st * 400);
        $('#price_details').text(total);

        // $('#seat_details').text(seat.join(", "));
        $('#seat_dt').val(seat.join(", "));
    }

</script>

<section class="mt-5">  
    <h3 class="text-center" style="color: black;">ĐẶT VÉ XEM PHIM</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="seat-map" id="seatCharts"> 
                    <h3 class="text-center mt-5" tyle="color: white;">Chọn Ghế</h3>
                    <hr>
                    <label class="text-center" style="width: 100%; background-color:#008080; color: white; padding:2%;">Màng Hình</label>

                    <div class="row" id="seat_chart">
                    </div>

                    </div>
                    <!-- <h6 class="mt-5" style="color: #008080;">Cinema Name</h6>
                    <p class="mt-1" id="cinema_name"></p>
                    
                    <h6 class="mt-3" style="color: #008080;">Movie Show (Date and Timing)</h6>
                    <p class="mt-1" id="show_date_time"></p>

                    <h6 class="mt-3" style="color: #008080;">Ticket Price</h6>
                    <p class="mt-1" id="price"></p> -->

                    <h6 class="mt-3" style="color: #008080;">Thành Tiền</h6>
                    <p class="mt-1" id="price_details"></p>

            </div>  
            <div class="col-md-6">
                <form method="post" class="mt-5">
                    <center>
                            Điền đầy đủ thông tin vào biểu mẩu mua vé xem phim.
                    </center> <hr>
                    <div class="container" style="color: gray; font-weight: bold;">
                            <div class="form-group">
                                <label for="username">Custumer ID</label>   
                                <input type="number" name="cust_id" id="cust_id" class="form-control" required value=<?php echo $_SESSION["cust_id"]; ?> >
                            </div>
                            <div class="form-group">
                                <label for="email">Show ID</label>
                                <!-- <input type="text" name="show_id" class="form-control" required > -->
                                  <label for=""></label>
                                  <select class="form-control" name="show_id" id="show_id">
                                    <option>Select Show</option>
                                    <?php  
                                        if($result->num_rows>0){
                                            while($row = $result->fetch_assoc()){
                                                echo '<option value="'.$row["id"].'">'.$row["movie_name"].'</option>';
                                            }
                                        }
                                    
                                    ?>
                                  </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số Lượng Vé</label>
                                <input type="number" name="no_ticket" id="no_ticket" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã Ghế Ngồi</label>
                                <input type="text" name="seat_dt" id="seat_dt" class="form-control" required>
                            </div>

                            <div class="form-group">    
                                <label for="exampleInputEmail1">Ngày Đặt Vé</label>
                                <input type="date" name="booking_date" class="form-control" required>
                            </div>

                            <div class="modal-group" style="text-align: right;">
                                <button type="submit" name="btn_booking" class="btn" style="background-image: linear-gradient(to right, #bdc3c7, #2c3e50); color:white;">Booking Now</button>
                            </div>
                            <hr>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>


<?php 
 include ("footer.php");
?>