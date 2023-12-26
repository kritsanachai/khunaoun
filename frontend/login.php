<div class="box">
  <div class="container1" id="container">
    <div class="form-container sign-up">
      <div style="background-color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 40px;
    height: 100%;">
        <h1>สร้างบัญชี</h1>
        <br>
        <input type="text" placeholder="ชื่อ - นามสกุล" id="fullname">
        <input type="email" placeholder="Email" id="email">
        <input type="text" placeholder="เบอร์โทร" id="tel" >
        <input type="password" placeholder="รหัสผ่าน" id="password_1" >
        <input type="password" placeholder="ยืนยันรหัสผ่าน" id="password_2" >
        <button id="signup">Sign Up</button>
      </div>
    </div>
    <div class="form-container sign-in">
      <form action="../backend/signin_db.php" method="post">
        <i class="fa-duotone fa-lighthouse"></i>
        <h1>เข้าสู่ระบบ</h1>
        <br>
        <input type="email" placeholder="Email" name="email" required>
        <input type="password" placeholder="Password" name="password" required>
        <!-- <a href="#">Forget Your Password?</a> -->
        <button name="signin">Sign In</button>
      </form>
    </div>
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1>มาเป็นสมาชิกกับเรา</h1>
          <p>มีบัญชีอยู่แล้วใช่หรือไม่ คลิ๊กด้านล่างเพื่อเข้าสู่ระบบ</p>
          <button class="hidden" id="login">Sign In</button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1>ยินดีต้อนรับ</h1>
          <p>ไม่ได้เป็นสมาชิกใช่หรือไม่ คลิ๊กด้านล่างเพื่อสู่ระบบ</p>
          <button class="hidden" id="register">Sign Up</button>
        </div>
      </div>
    </div>
  </div>
</div>