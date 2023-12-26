<?php include('header_user.php'); ?>

<body>
    <?php
    session_start();
    include('../backend/connect_db.php');
    ?>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <?php include("nav_cart.php"); ?>
    </header><!-- End Header -->


    <section class="h-100 h-custom">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="container-fluid">

                        <div class="d-flex justify-content-between">
                            <h1 class="h3 mb-2 text-gray-800">รายการสั่งซื้อ</h1>
                        </div>

                        <br>
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center" id="myTable" width="100%" cellspacing="0">
                                        <thead style="text-align: center;">
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>วันที่ทำการสั่งซื้อ</th>
                                                <th>รายการออเดอร์</th>
                                                <th>สถานะ</th>
                                            </tr>
                                        </thead>
                                        <!-- <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </tfoot> -->

                                        <tbody>
                                            <?php
                                                $id_user = $_SESSION['user_login'];
                                                $result = $conn->query("SELECT * FROM orders WHERE id_user = '$id_user'");
                                                $rows = $result->num_rows;
                                                $x = 0;
                                                if ($rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                    // $userRe = $conn->query("SELECT * FROM users WHERE user_id = '$id_user'");
                                                    // $user = $userRe->fetch_assoc();
                                                    $date = date_create($row['order_date']);
                                                    // $date = date_format($dateStart, "d-m-Y");
                                                    $x++;
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $x; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo date_format($date, "d/m/Y"); ?>
                                                        </td>
                                                        <td><button class="btn btn-primary" id="openOrderApp"
                                                                data-id="<?php echo $row['id_order']; ?>"
                                                                data-id_user="<?php echo $row['id_user']; ?>">เปิด</button></td>
                                                        <td class="fw-bolder">
                                                                <?php if($row['status'] == "จัดส่งสำเร็จ"){ ?>
                                                                    <p class="text-success"><?php echo $row['status']; ?></p>
                                                                <?php }else if($row['status'] == "รอยืนยัน"){ ?>
                                                                    <p class="text-warning"><?php echo $row['status']; ?></p>
                                                                <?php }else if($row['status'] == "อนุมัติแล้ว"){ ?>
                                                                    <p class="text-primary"><?php echo $row['status'];?>
                                                                <?php }else { ?>
                                                                    <p class="text-danger"><?php echo $row['status']; ?></p>
                                                                <?php }?>
                                                        </td>
                                                    </tr>
                                                <?php }
                                            } else { ?>
                                                <tr>
                                                    <td style="display:none"></td>
                                                    <td style="display:none"></td>
                                                    <td style="display:none"></td>
                                                    <td colspan="4">ไม่มีรายการสั่งซื้อ</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

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
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
        $(document).on("click", "#openOrderApp", function () {
            var idOrder = $(this).data("id");
            var idUser = $(this).data("id_user");
            console.log(idUser);
            var formdata = new FormData();
            formdata.append("idOrder", idOrder);
            formdata.append("idUser", idUser);
            $.ajax({
                url: "modalOrderUser.php",
                type: "POST",
                data: formdata,
                dataType: "html",
                contentType: false,
                processData: false,
                success: function (data) {
                    Swal.fire({
                        width: '1000px',
                        showConfirmButton: false,
                        html: data
                    });
                }
            })
        });
    </script>


</body>

</html>