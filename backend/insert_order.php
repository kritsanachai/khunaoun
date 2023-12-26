<?php 
    include("connect_db.php");
    // echo json_encode(2);
    session_start();
    $id_user = $_SESSION['user_login'];
    $cartResult = $conn->query("SELECT * FROM cart WHERE id_user = '$id_user'");
    // $cartRow = $cartResult->num_rows;
    // if($cartRow == 0){
    //     echo json_encode(2);
    //     exit();
    // }
    
    $total = $_POST['total'];
    date_default_timezone_set('Asia/Bangkok');
    $date = date('d-m-Y H:i:s');
    $slipMoneyName = $_FILES['slipMoney']['name'];
    $slipMoneyType = $_FILES['slipMoney']['tmp_name'];
    $folder = '../frontend/slipMoney/';
    $location = $folder . $slipMoneyName;
    move_uploaded_file($slipMoneyType , $location);

    // echo json_encode($date);
    $inOrder = $conn->query("INSERT INTO orders (order_date,id_user,total,slipMoney) VALUES ('$date','$id_user','$total','$slipMoneyName')");
    $idOrder = mysqli_insert_id($conn);

    
    while($data = $cartResult->fetch_assoc()){
        $idPro = $data['id_product'];
        $qty = $data['qty'];
        $inOrderDetail = $conn->query("INSERT INTO order_details (id_order,product_id,qty) VALUES ('$idOrder','$idPro','$qty')");
    }

    $cartDel = $conn->query("DELETE FROM cart WHERE id_user = '$id_user'");
    echo json_encode(1);


    
    
?>