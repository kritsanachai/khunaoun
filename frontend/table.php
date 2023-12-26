<?php 
    include("header_admin.php");
    include("../backend/connect_db.php");
    $x = 0;
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<table id="myTable">
<thead>
        <tr>
            <th>ชื่อ
            </th>
            <th>ชื่อ
            </th>
            <th>ชื่อ
            </th>
            <th>ชื่อ
            </th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $proRe = $conn->query("SELECT * FROM products");
            while($pro = $proRe->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $pro['name'];?>
            </td>
            
        </tr>
        <?php } ?>
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
        $('#myTable').DataTable();
    });
    </script>
