<?php
    include ("header.php");


    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $number = $_POST["number"];
        $message = $_POST["message"];

        $sql = "INSERT INTO contact VALUES (0,' $name','$email','$number','$message',now())";

        $con = new connec();
        $con ->insert($sql,"We Will Contact You Soon On Your Email Address");
    }
?>
    <section class="mt-5" style="min-height: 450px;">
        <div class="container">
            <div class="col-md-12">
                    <center>
                        <h3>
                            Bạn Có Gì Muốn Nhắn Nhủ Đến 247Cinema?
                        </h3>
                        <h5>
                            Liên lạc
                        </h5>
                        <p>
                            Chúng tôi muốn nói về cách chúng tôi có thể làm việc cùng nhau.
                            Gửi cho chúng tôi một tin nhắn bên dưới và chúng tôi sẽ trả lời càng sớm càng tốt
                        </p>
                    </center>
            </div>     
            <div class="row">
                <div class="col-md-6 mt-5 mb-5 pl-5" style=" border-radius: 10%; background-color: gray; margin-bottom: 2%;">
                <h2 class="mt-5 ml-5" style="color: white;">Thông Tin Liên Hệ</h2>

                <p class="ml-5" style="color: white;">
                Nhóm của chúng tôi sẽ liên hệ lại với bạn trong 24 giờ
                </p>

                <p class="mt-5 ml-5" style="color: white;"><i class="fa fa-phone fa-1x mt-3"></i>&nbsp; +84 1234567890</p>
                <p class="mt-3 ml-5" style="color: white;"><i class="fa fa-envelope fa-1x mt-3"></i>&nbsp; 247movie@.gmail.com</p>
                <p class="mt-3 ml-5" style="color: white;"><i class="fa fa-map-marker fa-1x mt-3"></i>&nbsp; 247movie@.gmail.com</p>

                <h2 class="mt-5 ml-5" style="color: white;">Tham Gia Với Chúng Tôi</h2>
                <a href="" class="mt-5 ml-5" style="color: white;"><i class="fa fa-facebook-square fa-2x mt-3" ></i></a>
                <a href="" class="mt-5 ml-5" style="color: white;"><i class="fa fa-twitter-square fa-2x mt-3"></i></a>
                <a href="" class="mt-5 ml-5" style="color: white;"><i class="fa fa-instagram fa-2x mt-3"></i></a>
                <a href="" class="mt-5 ml-5" style="color: white;"><i class="fa fa-linkedin-square fa-2x mt-3"></i></a>

                </div>              
                <div class="col-md-6">  
                        <form method="post">

                            <div class="form-group">
                                    <label for="exampleInputEmail1">Họ Tên</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số Điện Thoại</label>
                                    <input type="text" name="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Number">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Message</label>
                                    <textarea name="message" rows="8" style="resize: none; width: 100%; "></textarea>
                                </div>

                                <div class="modal-group" style="text-align: right;">
                                    <button type="submit" name="submit" class="btn" style="background-image: linear-gradient(to right, #bdc3c7, #2c3e50); color:white;">Send Message</button>
                                </div>
                                <br>
                        <!-- form contact -->
                        </form>
                </div>   
            </div>
                    

        </div>

    </section>





<?php
    include ("footer.php");
?>