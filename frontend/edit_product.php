<?php
include("header_admin.php");
  include("../backend/connect_db.php");

  $productId = $_POST['id'];
  $num = $_POST['num'];
  $result = $conn->query("SELECT * FROM products WHERE id_product='$productId'");
  $data = $result->fetch_array();

?>


<body>
    <input type="hidden" id="id" value="<?php echo $data['id_product']; ?>">
    <input type="text" readonly class="form-control my-4" value="<?php echo $num; ?>" required>
    <input type="text" class="form-control  my-4" id="name" value="<?php echo $data['name']; ?>" required>
    <!-- <input type="hidden" class="form-control  my-4" id="img2" value="<?php echo $data['img']; ?>" required> -->
    <input type="text" class="form-control  my-4" id="detail" value="<?php echo $data['detail']; ?>" required>
    <input type="text" class="form-control  my-4" id="price" value="<?php echo $data['price']; ?>" required>
    <input type="file" class="form-control  my-4" id="img">
    <img width="100%" src="upload/<?php echo $data['img']; ?>" id="previewImg" alt="">
    <button id="UpdateProduct" class="btn btn-warning form-control my-4">อัพเดต</button>

 
</body>

