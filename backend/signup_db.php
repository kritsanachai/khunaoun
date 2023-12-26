<?php
include("connect_db.php");
session_start();

    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $tel = $_POST['tel'];
    $password_1 = $_POST["password_1"];
    $password_2 = $_POST["password_2"];
    $status = "user";

    // if (empty($fullname) || empty($email) || empty($tel) || empty($password_1) || empty($password_2)) {
    //     echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน'); window.location = '../index.php'</script>";
    // } 
    if ($password_1 != $password_2) {
        echo json_encode(2);
        exit();
        // echo "<script>alert('รหัสผ่านไม่ตรงกัน กรุณากรอกใหม่อีกครั้ง'); window.location = '../frontend/index.php'</script>";
    } else {
        $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
        if ($result->num_rows > 0) {
            // $row = $result->num_rows;
            // echo $row;
            echo json_encode(0);
            // echo "<script>alert('E-mail นี้ถูกใช้งานไปแล้วกรุณาเปลี่ยนหรือใช้ E-mail อื่น'); window.location = '../frontend/index.php'</script>";
        } else {
            $newpassword = md5($password_1);
            $result = $conn->query("INSERT INTO users (fullname, email, tel, password, status) VALUES ('$fullname', '$email', '$tel', '$newpassword', '$status')");
            // $query = $conn->query($sql);
            if ($result) {
                echo json_encode(1);
                // echo "<script>alert('ลงทะเบียนเรียบร้อย'); window.location = '../frontend/index.php'</script>";
            } else {
                echo "Error: " . $conn->error;
            }
        }
    }

?>