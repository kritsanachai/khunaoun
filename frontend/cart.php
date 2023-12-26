<?php include('header_user.php'); ?>

<body>
    <?php
    session_start();
    include('../backend/connect_db.php');

    ?>
    <div class="modal fade " id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php include("login.php") ?>
                </div>
            </div>
        </div>
    </div>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <?php include("nav_cart.php"); ?>
    </header><!-- End Header -->


    <section class="h-100 h-custom">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">

                    <div class="table-responsive">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col" class="h5">ตะกร้าสินค้าของคุณ</th>
                                    <th scope="col">ราคาต่อหน่วย</th>
                                    <th scope="col">จำนวน</th>
                                    <th scope="col">ราคารวม</th>
                                    <th scope="col" class="text-center">ตัวจัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                $shipping = 50;
                                $user_id = $_SESSION['user_login'];
                                $sqlUser = $conn->query("SELECT * FROM users WHERE user_id = '$user_id'");
                                $dataUser = $sqlUser->fetch_assoc();
                                $resultCart = $conn->query("SELECT * FROM cart WHERE id_user = '$user_id'");
                                $rowCart = $resultCart->num_rows;
                                // echo $rowCart;
                                

                                if($resultCart->num_rows > 0){
                                while ($dataCart = $resultCart->fetch_assoc()) {
                                    $id_product = $dataCart['id_product'];
                                    $resultPro = $conn->query("SELECT * FROM products WHERE id_product = '$id_product'");
                                    $product = $resultPro->fetch_assoc();
                                    $qty = $dataCart['qty'];
                                    $pricePro = $product['price'];
                                    $sumTotal = $qty * $pricePro;
                                    $total += $sumTotal;
                                    
                                    // $total += $dataCart['total'];
                                    ?>
                                    <tr>
                                        <th scope="row" class="border-bottom-0">
                                            <div class="d-flex align-items-center">
                                                <img src="upload/<?php echo $product['img']; ?>" class="img-fluid rounded-3"
                                                    style="width: 120px;" alt="Book">
                                                <div class="flex-column ms-4">
                                                    <p class="mb-2">
                                                        <?php echo $product['name']; ?>
                                                    </p>
                                                    <p class="mb-0">
                                                        <?php echo $product['detail']; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="align-middle border-bottom-0">
                                            <p class="mb-0" style="font-weight: 500;">
                                                <?php echo $product['price']; ?> บาท
                                            </p>
                                        </td>
                                        <td class="align-middle border-bottom-0">
                                            <div class="d-flex flex-row">
                                                <!-- <button class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button> -->

                                                <input min="0" id="qty" value="<?php echo $dataCart['qty']; ?>"
                                                    type="number" class="form-control form-control-sm numberChange"
                                                    style="width: 50px;" />
                                                <input type="hidden" value="<?php echo $dataCart['id_product']; ?>"
                                                    id="id_product">
                                                    

                                                <!-- <button class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button> -->
                                            </div>
                                        </td>
                                        <td class="align-middle border-bottom-0">
                                            <p class="mb-0" style="font-weight: 500;">
                                                <?php echo $sumTotal; ?> บาท
                                            </p>
                                        </td>
                                        <td class="align-middle border-bottom-0 text-center">
                                            <i class="fa fa-trash fa-2x fa-lg text-danger pe-2" id="deleteCart" data-id_cart="<?php echo $dataCart['id_cart'];?>" style="cursor : pointer;"></i>
                                        </td>
                                    </tr>
                                <?php }  ?>
                                <?php }else{ ?>
                                    <tr>
                                        <td colspan="5"> 
                                            <div class="card shadow-2-strong mb-5 mb-lg-0 mt-3" style="border-radius: 16px;">
                                                <div class="card-body p-4 ">
                                                    <h2 class="text-center">ไม่มีสินค้า เพิ่มสินค้าลงตะกร้าได้เลย!!</h2>
                                                    <div class="d-flex justify-content-center mt-3">
                                                        <a href="index.php">
                                                            <button class="btn btn-success">สั่งซื้อสินค้า</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                    <?php } ?>
                            </tbody>
                            
                        </table>
                       
                    </div>
                   

                    <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
                        <div class="card-body p-4">

                            <div class="row">
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-4 mb-md-0">
                                    <div class="d-flex flex-row">
                                        <div class="rounded border w-100 p-3">
                                            <p class="d-flex align-items-center mb-0">
                                                <i class="fa fa-qrcode fa-2x fa-lg text-dark pe-2"></i>QR Code
                                            </p>

                                        </div>
                                    </div>
                                    <div class="d-flex flex-row mt-2">
                                        <!-- <div class="rounded border w-100 p-3"> -->
                                        <img src="upload/qrcode.jpg" alt="" class="img-thumbnail">
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-6">
                                    <div class="d-flex flex-row">
                                        <div class="rounded border w-100 p-3">
                                            <h5 class="d-flex align-items-center mb-0">รายละเอียดบัญชี</h5>
                                            <p class="d-flex align-items-center mb-0 mt-2">ชื่อ : นายกฤษณชัย อุบลทิพย์</p>
                                            <p class="d-flex align-items-center mb-0 ">ธนาคาร : กสิกร</p>
                                        </div>
                                    </div>
                                    <p class="d-flex align-items-center text-danger mb-0 mt-2 ">แนบหลักฐานการโอนเงินได้ที่นี้</p>
                                    <div class="d-flex flex-row mt-2">
                                        <div class="rounded border w-100 p-3">
                                            <input type="file" accept="image/png, image/jpg, image/jpeg" id = "slipMoney">
                                            <input type="hidden" id = "address" value="<?php echo $dataUser['address'];?>">
                                            <input type="hidden" id = "rowCart" value="<?php echo $rowCart;?>" >
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 mt-3">
                                    <div class="d-flex justify-content-between" style="font-weight: 500;">
                                        <p class="mb-2">ราคารวม</p>
                                        <p class="mb-2">
                                            <?php echo $total; ?>
                                        </p>
                                    </div>

                                    <div class="d-flex justify-content-between" style="font-weight: 500;">
                                        <p class="mb-2">ค่าจัดส่ง</p>
                                        <p class="mb-2">
                                            <?php echo $shipping; ?>
                                        </p>
                                    </div>

                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                                        <p class="mb-2">ราคาทั้งหมด (รวมค่าจัดส่ง)</p>
                                        <span class="mb-2" >
                                            <?php echo $sumTotal = $total + $shipping; ?>
                                            <input type="hidden" value="<?php echo $sumTotal?>" id = "total">
                                        </span>
                                    </div>

                                    <button type="button" class="btn btn-primary btn-block btn-lg">
                                        <div class="d-flex justify-content-between">
                                            <span id="InsertOrder">ยืนยันการสั่งซื้อ</span>
                                        </div>
                                    </button>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div>
                        <h4>Address</h4>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022 - US<br>
                        </p>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Reservations</h4>
                        <p>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Opening Hours</h4>
                        <p>
                            <strong>Mon-Sat: 11AM</strong> - 23PM<br>
                            Sunday: Closed
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

    </footer><!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>


    <!-- Template Main JS File -->
    <script src="assets_user/js/main.js"></script>
    <script src="assets_user/js/script.js"></script>

    <script>
        $(".numberChange").on("change", function () {
            var $el = $(this).closest('tr');
            var qty = $el.find("#qty").val();
            var id_product = $el.find("#id_product").val();

            var formdata = new FormData();
            formdata.append("id_product", id_product);
            formdata.append("qty", qty);

            $.ajax({
                url: "../backend/numberChange.php",
                type: "POST",
                data: formdata,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (data) {
                    window.location.reload();
                },
            });
        });

        $(document).on("click", "#deleteCart", function () {
            var id_cart = $(this).data("id_cart");
            // var id_product = $(this).data("id_product");
            // alert(id_product);
            // var qty = $el.find("#qty").val();
            // var id_product = $el.find("#id_product").val();
            Swal.fire({
            title: "คุณต้องการลบรายการนี้ใช่หรือไม่?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
            }).then((result) => {
            if (result.isConfirmed) {
                var formdata = new FormData();
                formdata.append("id_cart", id_cart);
                // alert(id);

                $.ajax({
                    url:"../backend/delete_cart.php",
                    type:"POST",
                    data:formdata,
                    dataType:"json",
                    contentType:false,
                    processData:false,
                    success:function(data){
                        if(data == 1){
                            Swal.fire({
                            title:"เสร็จสิ้น",
                            showConfirmButton:false,
                            icon:"success",
                            timer:800
                        }).then((result) => {
                            window.location.reload();
                        });
                        }else{
                            Swal.fire({
                            title:"เกิดข้อผิดพลาด",
                            showConfirmButton:false,
                            icon:"error",
                            timer:800
                        });
                        }

                        }
                    });
                }
            });
        });

        $(document).on("click", "#InsertOrder", function () {
            var slipMoney = $('#slipMoney')[0].files[0];
            // var slipMoney = $('#slipMoney').val();
            var total = $('#total').val();
            var address = $('#address').val();
            var rowCart = $('#rowCart').val();
            // console.log(rowCart);
            if(rowCart == 0){
                Swal.fire({
                    title: "ไม่สามารถดำเนินการได้",
                    text: "ในตะกร้าของคุณไม่มีสินค้า!!",
                    icon : "error",
                    showConfirmButton: false,
                    timer: 1200
                });
            }else if (slipMoney === undefined){
                Swal.fire({
                    title: "ไม่สามารถดำเนินการได้",
                    text: "กรุณาแนบหลักฐานการโอนเงิน!!",
                    icon : "error",
                    showConfirmButton: false,
                    timer: 1200
                });
            }else if(address === ''){
                Swal.fire({
                    title: "ไม่พบข้อมูลที่อยู่",
                    text: "กรุณาเพิ่มข้อมูลที่อยู่ในการส่งสินค้า สามารถเพิ่มข้อมูลได้ที่แก้ไขข้อมูลส่วนตัว!!",
                    icon : "error",
                    showConfirmButton: false,
                    timer: 1200
                });
            }else{
                // console.log("hi");
                var formdata = new FormData();
                formdata.append("slipMoney", slipMoney);
                formdata.append("total", total);

                $.ajax({
                    url:"../backend/insert_order.php",
                    type:"POST",
                    data:formdata,
                    dataType:"json",
                    contentType:false,
                    processData:false,
                    success:function(data){
                        console.log(data)
                        if(data == 1){
                            Swal.fire({
                                title:"สั่งซื้อเสร็จสิ้น",
                                showConfirmButton:false,
                                icon:"success",
                                timer:800
                        }).then((result) => {
                            window.location.reload();
                        });
                        }else{
                            Swal.fire({
                                title:"เกิดข้อผิดพลาด",
                                showConfirmButton:false,
                                icon:"error",
                                timer:800
                            });
                        }

                        }
                    });
                }
        })
    </script>


</body>

</html>