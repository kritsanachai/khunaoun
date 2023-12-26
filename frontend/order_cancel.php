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
                        <h1 class="h3 mb-2 text-gray-800">ออเดอร์ที่ยกเลิก</h1>
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
                                            <th>สถานะออเดอร์</th>
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
                                        $status = "ยกเลิก";
                                        $result = $conn->query("SELECT * FROM orders WHERE status = '$status'");
                                        while ($row = $result->fetch_assoc()){
                                            $date=date_create($row['order_date']); //format date จาก db
                                            $id_user = $row['id_user'];
                                            $userRe = $conn->query("SELECT * FROM users WHERE user_id = '$id_user'");
                                            $user = $userRe->fetch_assoc();
                                            $x++;
                                    ?>
                                        <tr>
                                            <td><?php echo $x;?></td>
                                            <td><?php echo date_format($date,"d/m/Y");?></td>
                                            <td><?php echo $user['fullname']?></td>
                                            <td class="text-center fw-bolder"><p class="text-danger"><?php echo $row['status'];?></p></td>
                                       
                                            <!-- <td><div class="text-center"><button class="btn btn-warning" id="EditProduct" data-id="<?php echo $row['id_product'];?>" data-num="<?php echo $x;?>">แก้ไข</button></div></td>
                                            <td><div class="text-center"><button class="btn btn-danger" id="DeleteProduct" data-id="<?php echo $row['id_product'];?>">ลบ</button></div></td> -->
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
    </script>

</body>

</html>