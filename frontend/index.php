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
    <?php include("nav.php"); ?>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div
          class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">ยินดีต้อนรับ<br>ร้านคุณอ้วน</h2>

          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="#book-a-table" class="btn-book-a-table">ติดต่อเรา</a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="assets_user/img/1.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <!-- <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>About Us</h2>
          <p>Learn More <span>About Us</span></p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-7 position-relative about-img" style="background-image: url(assets_user/img/about.jpg) ;"
            data-aos="fade-up" data-aos-delay="150">
            <div class="call-us position-absolute">
              <h4>ติดต่อสอบถาม</h4>
              <p>0615423611</p>
            </div>
          </div>
          <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bi bi-check2-all"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                  irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla
                  pariatur.</li>
              </ul>
              <div class="position-relative mt-4">
                <img src="assets_user/img/about-2.jpg" class="img-fluid" alt="">
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>End About Section -->

    <!-- ======= Why Us Section ======= -->
    <!-- <section id="why-us" class="why-us section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="why-box">
              <h3>Why Choose Yummy?</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Duis aute irure dolor in reprehenderit
                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad
                corporis.
              </p>
              <div class="text-center">
                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-8 d-flex align-items-center">
            <div class="row gy-4">

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-clipboard-data"></i>
                  <h4>Corporis voluptates officia eiusmod</h4>
                  <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                </div>
              </div>

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-gem"></i>
                  <h4>Ullamco laboris ladore pan</h4>
                  <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                </div>
              </div>

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-inboxes"></i>
                  <h4>Labore consequatur incidid dolore</h4>
                  <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div>
    </section>End Why Us Section -->


    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2> Menu</h2>
          <p>สินค้าร้าน <span>คุณอ้วน</span></p>
        </div>


        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

          <div class="tab-pane fade active show" id="menu-starters">

            <div class="row gy-5 justify-content-center">
              <?php
              $sql = "SELECT * FROM products";
              $query = $conn->query($sql);
              $row = $query->num_rows;

              if ($row > 0) {
                while ($product = $query->fetch_array()) {
                  ?>
                      <div class="col-lg-4 menu-item">
                        <a href="upload/<?php echo $product['img']; ?>" class="glightbox"><img
                            src="upload/<?php echo $product['img']; ?>" 
                            class="menu-img img-fluid testimonial-img" alt="" style="width: 550px; height: 250px; object-fit: cover;"></a>
                        <h4>
                          <?php echo $product['name']; ?>
                        </h4>
                        <p class="ingredients">
                          <?php echo $product['detail']; ?>
                        </p>
                        <p class="price">
                          $
                          <?php echo $product['price']; ?> บาท
                        </p>
                        <?php if (isset($_SESSION['user_login'])) { ?>
                            <button class="btn btn-danger" id="AddCart" data-id_product="<?php echo $product['id_product']; ?>"
                              data-qty="<?php echo "1" ?>"><i class="fa-solid fa-cart-plus"></i> ใส่ตะกร้า</button>
                        <?php } else { ?>
                            <button class="btn btn-danger" onclick="checkMenu()"><i class="fa-solid fa-cart-plus"></i>
                              ใส่ตะกร้า</button>
                        <?php } ?>

                      </div><!-- Menu Item -->
                  <?php }
              } else { ?>
                  <div class="d-flex align-items-center justify-content-center ">
                    <div class="text-center row">

                      <div class=" col-md-12 mt-4">
                        <p class="fs-3"> <span class="text-danger">Sorry!</span> ไม่มีรายการสินค้า TT.</p>

                      </div>
                    </div>
                  </div>
              <?php } ?>
            </div>
          </div><!-- End Starter Menu Content -->
        </div>
      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Testimonials Section ======= -->
    <!-- <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          
          <p>คณะผู้จัดทำ</p>
        </div>

        <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram
                        malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Sara Wilsson</h3>
                      <h4>Designer</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                          class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="assets_user/img/testimonials/testimonials-2.jpg" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis
                        minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Jena Karlis</h3>
                      <h4>Store Owner</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                          class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="assets_user/img/testimonials/testimonials-3.jpg" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div>



          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section> -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact</h2>
          <p>ข้อมูลที่อยู่ร้าน</p>
        </div>

        <div class="mb-3">
          <iframe style="border:0; width: 100%; height: 350px;"
            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d968.406833523325!2d100.09355126947777!3d13.861394301208623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTPCsDUxJzQxLjAiTiAxMDDCsDA1JzM5LjEiRQ!5e0!3m2!1sen!2sth!4v1703218663529!5m2!1sen!2sth" 
            frameborder="0" allowfullscreen></iframe>
        </div><!-- End Google Maps -->

        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-map flex-shrink-0"></i>
              <div>
                <h3>ที่อยู่</h3>
                <p>9/2 หมู่ 2 ต.ทุ่งน้อย อ.เมืองนครปฐม จ.นครปฐม 73120</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>sorawit@gmail.com</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>เบอร์โทร</h3>
                <p>061-5423611</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-share flex-shrink-0"></i>
              <div>
                <h3>วันเวลาเปิด - ปิด</h3>
                <div><strong>จันทร์ - เสาร์:</strong> 8:00 - 17:00
                  <strong>อาทิตย์:</strong> หยุด
                </div>
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->



  <!-- ======= Footer ======= -->
  <?php 
    include("footer.php");
  ?>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>


  <!-- Template Main JS File -->
  <script src="assets_user/js/main.js"></script>
  <script src="assets_user/js/script.js"></script>
  <script>
    function checkMenu() {
      Swal.fire({
        position: "center",
        title: "กรุณาเข้าสู่ระบบก่อนสั่งซื้อ",
        icon: "error",
        showConfirmButton: false,
        timer: 1000

      });
    }

    // $(document).on("click", "#AddCart", function () {
    //   var id_product = $(this).data("id_product");
    //   var qty = $(this).data("qty");
    //   var formdata = new FormData();
    //   formdata.append("id_product", id_product);
    //   formdata.append("qty", qty);

    //   $.ajax({
    //     url: "../backend/cart_add.php",
    //     type: "POST",
    //     data: formdata,
    //     dataType: "json",
    //     contentType: false,
    //     processData: false,
    //     success: function (data) {
    //       console.log(data)
    //       if (data == 1) {
    //         Swal.fire({
    //           title: "เพิ่มสินค้าเสร็จสิ้น",
    //           showConfirmButton: false,
    //           icon: "success",
    //           timer: 800,
    //         }).then((result) => {
    //           window.location.reload();
    //         });
    //       } else {
    //         Swal.fire({
    //           title: "เกิดข้อผิดพลาด",
    //           showConfirmButton: false,
    //           icon: "error",
    //           timer: 800,
    //         });
    //       }
    //     },
    //   });
    // });



    $(document).on("click", "#signup", function () {
      var fullname = $('#fullname').val();
      var email = $('#email').val();
      var tel = $('#tel').val();
      var password_1 = $('#password_1').val();
      var password_2 = $('#password_2').val();

      if (fullname.trim() === '' || email.trim() === '' || tel.trim() === '' || password_1.trim() === '' || password_2.trim() === '') {
        Swal.fire({
          title: "กรุณากรอกข้อมูลให้ครบถ้วน!!",
          icon: "error",
          showConfirmButton: false,
          timer: 1200
        });
      } else {
        // alert('Fetching data for student ID: ' + codePass);
        var formdata = new FormData();
        formdata.append("email", email);
        formdata.append("fullname", fullname);
        formdata.append("tel", tel);
        formdata.append("password_1", password_1);
        formdata.append("password_2", password_2);

        $.ajax({
          url: "../backend/signup_db.php",
          type: "POST",
          data: formdata,
          dataType: "json",
          contentType: false,
          processData: false,
          success: function (data) {
            // alert(data)
            // console.log(data)
            if (data == 2) {

              Swal.fire({
                title: "รหัสผ่านไม่ตรงกัน!!",
                showConfirmButton: false,
                icon: "error",
                timer: 800,
              });
            } else if (data == 1) {
              Swal.fire({
                title: "สมัครสมาชิกเรียบร้อย",
                showConfirmButton: false,
                icon: "success",
                timer: 800,
              }).then((result) => {
                window.location.href = "index.php";
              });
            } else {
              Swal.fire({
                title: "E-mail นี้ถูกใช้งานไปแล้วกรุณาเปลี่ยนหรือใช้ E-mail อื่น",
                showConfirmButton: false,
                icon: "error",
                timer: 1000,
              });
            }
          },
        });
      }

    });

    
  // $(document).on("click", "#editProfile", function () {
  //     var idUser = $(this).data("id");
  //     var formdata = new FormData();
  //     formdata.append("idUser", idUser);
  //     $.ajax({
  //       url: "edit_profile.php",
  //       type: "POST",
  //       data: formdata,
  //       dataType: "html",
  //       contentType: false,
  //       processData: false,
  //       success: function (data) {
  //         Swal.fire({
  //           showConfirmButton: false,
  //           html: data,
  //           width: "800px",
  //           customClass: ".swal-back"
  //         });
  //       }
  //     })
  //   });

  //   $(document).on("click", "#UpdateProfile", function () {
  //     var id_user = $('#id_user').val();
  //     var fullname = $('#fullname').val();
  //     var email = $('#email').val();
  //     var tel = $('#tel').val();
  //     var address = $('#address').val();
      
  //     var formdata = new FormData();

  //     formdata.append("id_user", id_user);
  //     formdata.append("fullname", fullname);
  //     formdata.append("email", email);
  //     formdata.append("tel", tel);
  //     formdata.append("address", address);
  //     $.ajax({
  //       url: "../backend/update_profile.php",
  //       type: "POST",
  //       data: formdata,
  //       dataType: "json",
  //       contentType: false,
  //       processData: false,
  //       success: function (data) {
  //         // console.log(data)
  //         if (data == 1) {
  //           Swal.fire({
  //             title: "แก้ไขเสร็จสิ้น",
  //             showConfirmButton: false,
  //             icon: "success",
  //             timer: 800,
  //           }).then((result) => {
  //             window.location.reload();
  //           });
  //         } else {
  //           Swal.fire({
  //             title: "เกิดข้อผิดพลาด",
  //             showConfirmButton: false,
  //             icon: "error",
  //             timer: 800,
  //           });
  //         }
  //       },
  //     });
  //   });
  </script>

</body>

</html>