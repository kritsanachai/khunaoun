<?php
    include("connect_db.php");
    $id_user = $_POST['id_user'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];


    // echo json_encode($id_user . $fullname . $email . $tel . $address);
    $upUser = $conn->query("UPDATE users SET fullname = '$fullname', email = '$email', tel = '$tel', address = '$address' WHERE user_id = '$id_user'");
    // $UpdatePro = $conn->query("UPDATE users SET fullname = '$fullname', email = '$email', tel = '$tel', address = '$address' WHERE user_id = '$user_id'");
    if ($upUser) {
        echo json_decode(1);
    } else {
        echo json_decode(0);
    }
?>