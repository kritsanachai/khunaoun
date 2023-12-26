<?php 
    session_start();
    include("../backend/connect_db.php");

    if(isset($_POST["signin"])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $newpassword = md5($password);

        
            $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
            $row = $result->fetch_array();
            // echo $row;
            if($result->num_rows > 0){
                if($email == $row['email']){
                    if($newpassword == $row['password']){
                        if($row['status'] == 'admin'){
                            $_SESSION['admin_login'] = $row['user_id'];
                            header('location: ../frontend/all_product.php');
                        }else{
                            $_SESSION['user_login'] = $row['user_id'];
                            header('location: ../frontend/index_user.php');
                        }
                    }else{
                        echo "<script>alert('รหัสผ่านผิด'); window.location = '../frontend/index.php'</script>";
                    }
                }else{
                    echo "<script>alert('อีเมลผิด'); window.location = '../frontend/index.php'</script>";
                }
            }else{
                echo "<script>alert('ไม่มีข้อมูลในระบบ'); window.location = '../frontend/index.php'</script>";
            }
        
    }
?>