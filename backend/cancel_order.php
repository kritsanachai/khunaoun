<?php 
    include("connect_db.php");
    $idOrder = $_POST['idOrder'];
    $cancel = "ยกเลิก";

    $reOrder = $conn->query("UPDATE orders SET status = '$cancel' WHERE id_order = '$idOrder'");
    if($reOrder){
        echo json_encode(1);
    }else{  
        echo json_encode(0);
    }
?>