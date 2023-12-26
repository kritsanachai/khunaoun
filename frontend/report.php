<?php
include('../backend/connect_db.php');
include('header_admin.php');
$x = 0;
$total = 0;
$status = "จัดส่งสำเร็จ";
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
                        <h1 class="h3 mb-2 text-gray-800">รายงาน (Report)</h1>
                    </div>

                
                        <!-- <form>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <label for="date" class="col-1 col-form-label">Date</label>
                      
                                        <div class="input-group date" >
                                            <input type="date" class="form-control" />
                                        </div>
                
                                </div>
                                <div>
                                    <label for="date" class="col-1 col-form-label">Date</label>
                          
                                        <div class="input-group date" >
                                            <input type="date" class="form-control" />
                                        </div>
                         
                                </div>
                            </div>
                            
                        </form> -->

                    <form action="report.php" method="get">
                        <div class="d-flex justify-content-between">
                                <label class="col-1 col-form-label" >เริ่มต้น : </label>
                                <input type="date" class="form-control" name = "dateStart" required>
                                <label class="col-1 col-form-label">สิ้นสุด : </label>
                                <input type="date" class="form-control" name = "dateEnd" required>

                        </div>
                        <div class="d-grid gap-2 d-md-flex ">
                            <button class="btn btn-primary form-control mt-3" name="key" >
                                ค้นหา
                            </button>
                            <a href="report.php" class="btn btn-danger form-control mt-3">รีเซ็ต</a>
                        </div>
                    </form>
                    <!-- <button class="btn btn-danger form-control mt-3">
                           รีเซ็ต
                        </button>
                        <br>       -->
                    <br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>วันที่การสั่งซื้อ</th>
                                            <th>ชื่อลูกค้า</th>
                                            <th class="text-center">สถานะออเดอร์</th>
                                            <th class="text-center">ราคาทั้งหมด</th>
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
                                        if(isset($_GET['key'])){
                                            // $dateStart = $_GET['dateStart'];
                                            // $dateEnd = $_GET['dateEnd'];
                                            $dateStart = date_create($_GET['dateStart']);
                                            $dateEnd = date_create($_GET['dateEnd']);
                                            $dateS = date_format($dateStart,"d-m-Y");
                                            $dateE = date_format($dateEnd,"d-m-Y");
                                            $result = $conn->query("SELECT * FROM orders WHERE status = '$status' AND order_date BETWEEN '$dateS 00:00:00' AND '$dateE 23:59:59'");
                                            // $result = $conn->query("SELECT * FROM orders WHERE status = '$status' AND order_date BETWEEN '07-10-2023' AND '10-10-2023'");
                                            // echo $dateS . " " .  $dateE;
                                        }else{
                                            $result = $conn->query("SELECT * FROM orders WHERE status = '$status'");
                                        }
                                        
                                        while ($row = $result->fetch_assoc()) {
                                            $date = date_create($row['order_date']); //format date จาก db
                                            $id_user = $row['id_user'];
                                            $userRe = $conn->query("SELECT * FROM users WHERE user_id = '$id_user'");
                                            $user = $userRe->fetch_assoc();
                                            $x++;
                                            $total += $row['total'];
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
                                                <td class="text-center">
                                                    <p class="text-success">
                                                        <?php echo $row['status']; ?>
                                                    </p>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['total'] ?>
                                                </td>

                                                <!-- <td><div class="text-center"><button class="btn btn-warning" id="EditProduct" data-id="<?php echo $row['id_product']; ?>" data-num="<?php echo $x; ?>">แก้ไข</button></div></td>
                                            <td><div class="text-center"><button class="btn btn-danger" id="DeleteProduct" data-id="<?php echo $row['id_product']; ?>">ลบ</button></div></td> -->
                                            </tr>

                                        <?php } ?>
                                        <tr class="text-center">
                                            <td colspan="4">รวมทั้งหมด</td>
                                            <td style="display:none"></td>
                                            <td style="display:none"></td>
                                            <td style="display:none"></td>
                                            <td>
                                                <?php echo $total; ?>
                                            </td>
                                        </tr>

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
        });
        


    </script>

</body>

</html>