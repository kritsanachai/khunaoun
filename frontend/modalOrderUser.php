<?php
    include("header_user.php");
    include("../backend/connect_db.php");
    $idOrder = $_POST['idOrder'];
    $idUser = $_POST['idUser'];
    $resultUser = $conn->query("SELECT * FROM users WHERE user_id = '$idUser'");
    $user = $resultUser->fetch_assoc();
    $x = 0;
    $total = 0;
?>

<h3 class="d-flex justify-content-center fw-bold mt-5">รายละเอียดการสั่งซื้อ</h3>

<div class="justify-content-center ">
    <div class="d-flex justify-content-around mt-3">

        <div class="mt-2">
            <p>ชื่อ - สกุล : <span>
                    <?php echo $user['fullname']; ?>
                </span></p>
            <p>เบอร์โทร : <span>
                    <?php echo $user['tel']; ?>
                </span></p>
        </div>
        <div>
            <p>อีเมล : <span>
                    <?php echo $user['email']; ?>
                </span></p>
            <p>ที่อยู่ : <span>
                    <?php echo $user['address']; ?>
                </span></p>
        </div>
    </div>

</div>


<table class="table table-hover" style="width: 900px;">
    <thead class="table-secondary">
        <tr>
            <th scope="col">#</th>
            <th scope="col">ชื่อสินค้า</th>
            <th scope="col">จำนวน</th>
            <th scope="col">ราคารวม</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $shipping = 50;
        $stu = $conn->query("SELECT * FROM order_details WHERE id_order = '$idOrder'");
        while ($row = $stu->fetch_assoc()) {
            $idPro = $row['product_id'];
            $rePro = $conn->query("SELECT * FROM products WHERE id_product = '$idPro'");
            $product = $rePro->fetch_assoc();
            $sumPro = $product['price'] * $row['qty'];
            $x++;
            $total += $sumPro;
            ?>
            <tr>
                <td>
                    <?php echo $x; ?>
                </td>
                <td>
                    <?php echo $product['name'] ?>
                </td>
                <td>
                    <?php echo $row['qty']; ?>
                </td>
                <td>
                    <?php echo $sumPro; ?>
                </td>
            </tr>

        <?php } ?>
    </tbody>
    <tfoot>
        <tr class="text-dark fw-bolder">
            <td colspan="3" class="text-center">ราคารวม</td>
            <td>
                <?php echo $total; ?>
            </td>
        </tr>
        <tr class="text-dark fw-bolder">
            <td colspan="3" class="text-center">ค่าจัดส่ง</td>
            <td>
                <?php echo $shipping; ?>
            </td>
        </tr>
        <tr class="table-active fw-bolder">
            <td colspan="3" class="text-center ">ราคาทั้งหมด (รวมค่าจัดส่ง)</td>
            <td>
                <?php echo $total + $shipping; ?>
            </td>
        </tr>
    </tfoot>
</table>

