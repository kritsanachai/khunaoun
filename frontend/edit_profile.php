<?php
include("../backend/connect_db.php");
$id_user = $_POST['idUser'];
$sqlUser = $conn->query("SELECT * FROM users WHERE user_id = '$id_user'");
$user = $sqlUser->fetch_assoc();
?>
<div class="container rounded bg-white">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                    width="200px" src="upload/user.png"><span class="font-weight-bold">ลูกค้า</span><span
                    class="text-black-50">
                    <?php echo $user['email']; ?>
                </span><span> </span></div>
        </div>
        <div class="col-md-8 border-right ">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">ข้อมูลส่วนตัว</h4>
                </div>
                <!-- <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">ชื่อ - นามสกุล</label><input type="text" class="form-control" placeholder="ชื่อ - นามสกุล" value=""></div>
                    <div class="col-md-6"><label class="labels">E-mail</label><input type="text" class="form-control" value="" placeholder="surname"></div>
                </div> -->
                <div class="row mt-3">
                    <input type="hidden" id="id_user" value="<?php echo $id_user ?>">
                    <div class="col-md-12 mt-2">
                        <label class="labels">ชื่อ - นามสกุล</label>
                        <input type="text" class="form-control" id="fullname1" placeholder="ชื่อ - นามสกุล"
                            value="<?php echo $user['fullname']; ?>">
                    </div>
                    <div class="col-md-12 mt-2"><label class="labels">E-mail</label>
                    <input type="text"
                            class="form-control" id="email1" placeholder="E-mail" value="<?php echo $user['email']; ?>">
                    </div>
                    <div class="col-md-12 mt-2" required><label class="labels">เบอร์โทร</label><input type="text"
                            class="form-control" id="tel1" placeholder="เบอร์โทร" value="<?php echo $user['tel']; ?>">
                    </div>
                    <div class="col-md-12 mt-2"><label class="labels">ที่อยู่การจัดส่ง</label><textarea type="textarea"
                            class="form-control" id="address1" placeholder="ที่อยู่ในการจัดส่ง"
                            required><?php echo $user['address']; ?></textarea></div>
                </div>

                <hr>
                <!-- <p class="text-right mt-3 text-danger">เปลี่ยนรหัสผ่าน</p>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">รหัสผ่านใหม่</label><input type="text" class="form-control" placeholder="รหัสผ่านใหม่" value=""></div>
                    <div class="col-md-6"><label class="labels">ยืนยันรหัสผ่าน</label><input type="text" class="form-control" value="" placeholder="ยืนยันรหัสผ่าน"></div>
                </div> -->

                <div class="mt-3 text-center"><button class="btn btn-danger profile-button" id="UpdateProfile1">Save
                        Profile</button>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>