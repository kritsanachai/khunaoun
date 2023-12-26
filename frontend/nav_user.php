<?php 
  include('../backend/function.php');
  checkUser();
?>
<div class="container d-flex align-items-center justify-content-between">
  <a href="index_user.php" class="logo d-flex align-items-center me-auto me-lg-0">
    <!-- Uncomment the line below if you also wish to use an image logo -->
    <!-- <img src="assets/img/logo.png" alt=""> -->
    <h1>คุณอ้วน<span>.</span></h1>
  </a>

  <nav id="navbar navbar-expand-lg " class="navbar ">
    <ul>
      <li><a href="#hero">หน้าแรก</a></li>
      <li><a href="#menu">เมนู</a></li>
      <!-- <li><a href="#testimonials">ผู้จัดทำ</a></li> -->
      <li><a href="#contact">ติดต่อ</a></li>
      <?php if (isset($_SESSION['user_login'])) {
        $id_user = $_SESSION['user_login'];
        $sqlUser = $conn->query("SELECT * FROM users WHERE user_id = $id_user");
        $users = $sqlUser->fetch_array();
        $result = $conn->query("SELECT * FROM cart WHERE id_user = $id_user");
        $row = $result->num_rows;
        ?>


        &nbsp;&nbsp;&nbsp;&nbsp;<a href="cart.php"><button type="button" class="btn btn-primary position-relative">
            ตะกร้าสินค้า
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              <?php echo $row; ?>
              <!-- <span class="visually-hidden">unread messages</span> -->
            </span>
          </button></a>

        <li>



    
          <div class="nav-item dropdown no-arrow ">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">

              <img class="img-profile rounded-circle" src="assets_admin/img/undraw_profile.svg" style="height: 2rem;
        width: 2rem;">
            </a>
            <!-- Dropdown - User Information -->

  

            <div class="dropdown-menu col-12 shadow animated--grow-in ">
              <!-- <a class="dropdown-item" href="#">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Settings
          </a>-->


              <div class="text-center">
                <span class="text-gray-600 justify-content-center ">
                  <?php echo $users['fullname']; ?>
                </span>
              </div>
              <div class="dropdown-divider "></div>
              <button class="dropdown-item text-danger justify-content-center mt-2" style="cursor: pointer;"
                id="editProfile" data-id="<?php echo $id_user; ?>">
                ข้อมูลส่วนตัว
              </button>
              <a href="order_user.php"><button class="dropdown-item text-danger justify-content-center mt-2" style="cursor: pointer;">
                รายงานการสั่งสินค้า
              </button></a>

              <!-- <span class="dropdown-item text-danger justify-content-center" style="cursor: pointer;" data-bs-toggle="modal"
            data-bs-target="#userModal">
              เพิ่มที่อยู่ในการจัดส่ง
            </span> -->


              <div class="dropdown-divider "></div>
              <a class="dropdown-item justify-content-center " href="#" id="logout">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;
                <span class="justify-content-center">Logout</span>
              </a>
            </div>
          </div>
      <?php } ?>
        </li>
        <!-- <li class="float-start">
          <button type="button" class="btn-book-a-table" data-bs-toggle="modal"
            data-bs-target="#userModal">เข้าสู่ระบบ</button>

    
      </li> -->


      <!-- <a href="./result/logout.php"><button type="button" class="btn-book-a-table">ออกจากระบบ</button></a> -->
    </ul>


  </nav>


  <!-- .navbar -->
  <!-- <button type="button" class="btn-book-a-table" data-bs-toggle="modal" data-bs-target="#userModal">Add User</button> -->
  <!-- <a class="btn-book-a-table" href="../login_register/login.php" >เข้าสู่ระบบ</a> -->




  <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
  <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

</div>
<script src="assets_admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets_admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="asssets_admin/js/sb-admin-2.min.js"></script>
<script>
  $(document).on("click", "#logout", function () {
    // alert(id);
    Swal.fire({
      title: "คุณต้องการออกจากระบบใช่หรือไม่?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes!",
    }).then((result) => {
      if (result.isConfirmed) {
        // var formdata = new FormData();
        // formdata.append("id", id);
        // alert(id);
        $.ajax({
          url: "../backend/logout.php",
          dataType: "json",
          contentType: false,
          processData: false,
          success: function (data) {
            if (data == 1) {
              Swal.fire({
                title: "ออกจากระบบเรียบร้อย",
                showConfirmButton: false,
                icon: "success",
                timer: 800
              }).then((result) => {
                window.location.href = "index.php";
              });
            }
          }
        });
      }
    });
  });
   $(document).on("click", "#editProfile", function () {
      var idUser = $(this).data("id");
      var formdata = new FormData();
      formdata.append("idUser", idUser);
      $.ajax({
        url: "edit_profile.php",
        type: "POST",
        data: formdata,
        dataType: "html",
        contentType: false,
        processData: false,
        success: function (data) {
          Swal.fire({
            showConfirmButton: false,
            html: data,
            width: "800px",
            customClass: ".swal-back"
          });
        }
      })
    });

    $(document).on("click", "#UpdateProfile1", function () {
      var id_user = $('#id_user').val();
      var fullname = $('#fullname1').val();
      var email = $('#email1').val();
      var tel = $('#tel1').val();
      var address = $('#address1').val();
      // console.log($('#fullname1').val());
      
      var formdata = new FormData();

      formdata.append("id_user", id_user);
      formdata.append("fullname", fullname);
      formdata.append("email", email);
      formdata.append("tel", tel);
      formdata.append("address", address);
      $.ajax({
        url: "../backend/update_profile.php",
        type: "POST",
        data: formdata,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function (data) {
          // console.log(data)
          if (data == 1) {
            Swal.fire({
              title: "แก้ไขเสร็จสิ้น",
              showConfirmButton: false,
              icon: "success",
              timer: 800,
            }).then((result) => {
              window.location.reload();
            });
          } else {
            Swal.fire({
              title: "เกิดข้อผิดพลาด",
              showConfirmButton: false,
              icon: "error",
              timer: 800,
            });
          }
        },
      });
    });
</script>