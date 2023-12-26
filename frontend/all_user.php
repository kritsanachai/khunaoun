<?php 
    include("header_admin.php");
    include("../backend/connect_db.php");

    $x = 0;
    ?>
    
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('nav_right.php');?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include('nav_top.php'); ?>

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-flex justify-content-between">
                        <h1 class="h3 mb-2 text-gray-800">ผู้ใช้งานทั้งหมด (All user)</h1>
                    </div>
                    
                    <br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ชื่อ - นามสกุล</th>
                                            <th>E-Mail</th>
                                            <th>เบอร์โทร</th>
                                            
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
                                        $status = "user";
                                        $result = $conn->query("SELECT * FROM users WHERE status = '$status'");
                                        while ($row = $result->fetch_assoc()){
                                            $x++;
                                    ?>
                                        <tr>
                                            <td><?php echo $x;?></td>
                                            <td><?php echo $row['fullname']?></td>
                                            <td><?php echo $row['email']?></td>
                                            <td><?php echo $row['tel']?></td>
                                        </tr>
                                       <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

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

    
    <script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
    </script>

<script src="assets_admin/js/sb-admin-2.min.js"></script>

</body>

</html>