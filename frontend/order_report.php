<?php
include('../backend/connect_db.php');
include('header_admin.php');
$x = 0;
?>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("nav_right.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('nav_top.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="d-flex justify-content-between">
                        <h1 class="h3 mb-2 text-gray-800">ออเดอร์ล่าสุด</h1>
                    </div>

                    <br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead style="text-align: center;">
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>วันที่การสั่งซื้อ</th>
                                            <th>ชื่อลูกค้า</th>
                                            <th>ราคาทั้งหมด</th>
                                            <th>สลีบโอนเงิน</th>
                                            <th>สถานะออเดอร์</th>
                                            <th>ดูรายการออเดอร์</th>
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
                                        $status = "รอยืนยัน";
                                        $result = $conn->query("SELECT * FROM orders WHERE status = '$status'");
                                        while ($row = $result->fetch_assoc()) {
                                            $date = date_create($row['order_date']); //format date จาก db
                                            $id_user = $row['id_user'];
                                            $userRe = $conn->query("SELECT * FROM users WHERE user_id = '$id_user'");
                                            $user = $userRe->fetch_assoc();
                                            $x++;
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $x; ?>
                                                </td>
                                                <td>
                                                    <?php echo date_format($date, "d/m/Y"); ?>
                                                </td>
                                                <td>
                                                    <?php echo $user['fullname'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['total'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="slipMoney/<?php echo $row['slipMoney']; ?>"
                                                        class="glightbox"><button class="btn btn-primary">ดู</button></a>
                                                    <!-- <img src="slipMoney/<?php echo $row['slipMoney']; ?>" style="width:150px; height:150px;" class="mx-auto d-block"> -->
                                                </td>
                                                <td class="text-center">
                                                    <p class="text-warning">
                                                        <?php echo $row['status']; ?>
                                                    </p>
                                                </td>
                                                <td class="text-center"><button class="btn btn-danger" id="openOrder"
                                                        data-id="<?php echo $row['id_order']; ?>"
                                                        data-id_user="<?php echo $row['id_user']; ?>">เปิด</button></td>
                                                <!-- <td><div class="text-center"><button class="btn btn-warning" id="EditProduct" data-id="<?php echo $row['id_product']; ?>" data-num="<?php echo $x; ?>">แก้ไข</button></div></td>
                                            <td><div class="text-center"><button class="btn btn-danger" id="DeleteProduct" data-id="<?php echo $row['id_product']; ?>">ลบ</button></div></td> -->
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
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <!-- Bootstrap core JavaScript-->


    <script src="assets_user/js/main.js"></script>
    <script src="assets_admin/js/sb-admin-2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });

        $(document).on("click", "#openOrder", function () {
            var idOrder = $(this).data("id");
            var idUser = $(this).data("id_user");
            console.log(idUser);
            var formdata = new FormData();
            formdata.append("idOrder", idOrder);
            formdata.append("idUser", idUser);
            $.ajax({
                url: "modalOrder.php",
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
        })
        $(document).on("click", "#confirmOrder", function () {
            // console.log("hi")
            var idOrder = $(this).data("id");
            // alert(id);
            Swal.fire({
                title: "ต้องการอนุมัติออเดอร์ใช่หรือไม่?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes",
            }).then((result) => {
                if (result.isConfirmed) {
                    var formdata = new FormData();
                    formdata.append("idOrder", idOrder);
                    // alert(id);

                    $.ajax({
                        url: "../backend/approve_order.php",
                        type: "POST",
                        data: formdata,
                        dataType: "json",
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            if (data == 1) {
                                Swal.fire({
                                    title: "อนุมัติเสร็จสิ้น",
                                    showConfirmButton: false,
                                    icon: "success",
                                    timer: 800
                                }).then((result) => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: "เกิดข้อผิดพลาด",
                                    showConfirmButton: false,
                                    icon: "error",
                                    timer: 800
                                });
                            }

                        }
                    });
                }
            });
        });

        $(document).on("click", "#cancelOrder", function () {
            // console.log("hi")
            var idOrder = $(this).data("id");
            // alert(id);
            Swal.fire({
                title: "ต้องการยกเลิกออเดอร์ใช่หรือไม่?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes",
            }).then((result) => {
                if (result.isConfirmed) {
                    var formdata = new FormData();
                    formdata.append("idOrder", idOrder);
                    // alert(id);

                    $.ajax({
                        url: "../backend/cancel_order.php",
                        type: "POST",
                        data: formdata,
                        dataType: "json",
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            if (data == 1) {
                                Swal.fire({
                                    title: "ยกเลิกเสร็จสิ้น",
                                    showConfirmButton: false,
                                    icon: "success",
                                    timer: 800
                                }).then((result) => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: "เกิดข้อผิดพลาด",
                                    showConfirmButton: false,
                                    icon: "error",
                                    timer: 800
                                });
                            }

                        }
                    });
                }
            });
        });

    </script>

</body>

</html>