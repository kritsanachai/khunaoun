<?php 
    include("../backend/connect_db.php");

    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $price = $_POST['price'];
    $img = $_FILES['img'];


    $allow = array('jpg', 'jpeg', 'png'); //นามสกุลที่สามารถ Upload ได้
    $extension = explode(".", $img['name'] ); //แยกชื่อจาก
    $fileActExt = strtolower(end($extension)); // ตัวพิมพ์เล็ก
    $fileNew = rand() . "." . $fileActExt;
    $filePath = "../frontend/upload/".$fileNew;

    

    if (in_array($fileActExt, $allow)) {
        if($img['size'] > 0 && $img['error'] == 0){
            if(move_uploaded_file($img['tmp_name'], $filePath)){
                $result = $conn->query("INSERT INTO products (name,detail,price,img) VALUES ('$name','$detail','$price','$fileNew')");
                if($result) {
                    echo json_encode(1);
                }else{
                    echo json_encode(0);
                }
            }
        }
    }

    
?>