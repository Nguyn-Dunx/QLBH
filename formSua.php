<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
        exit();
    }
?>
<?php
    include "ketnoi.php";
    $id = $_GET["sid"];
    $sql = "SELECT * FROM `donhang` WHERE id = '$id'";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   
   include "header.php";
?>

<body>
    <div class="container">
        <h2>FORM SỬA DƠN HÀNG</h2>
        <form action="sua.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="form-label" for="id">Id:</label>
                <input type="text" id="id" name="id" placeholder="Nhập ma don hang" class="form-control" 
                value="<?php echo $id ?>" readonly style = "background: #eeee;">
            </div>
            <div class="mb-3">
                <label for="khachhang_id" class="form-label">Id khách hàng:</label>
                <input type="number" class="form-control" id="khachhang_id" placeholder="Enter khachhang id" name="khachhang_id" 
                value="<?php echo $row["khachhang_id"] ?>" required>
            </div>
            <div class="mb-3">
                <label for="trangthai" class="form-label">Trạng thái:</label>
                <select name="trangthai" id="trangthai">
                    <option <?php if($row["trangthai"] == 1) echo "selected"?> value="1">Giao hàng thành công</option>
                    <option <?php if($row["trangthai"] == 0) echo "selected"?> value="0">Đang giao hàng</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="khuyenmai" class="form-label">Khuyến mãi:</label>
                <input type="number" class="form-control" id="khuyenmai" placeholder="Enter khuyen mai " name="khuyenmai" 
                value="<?php echo $row["khuyenmai"] ?>" required>
            </div>
            <div class="mb-3">
                <label for="ngayban" class="form-label">Ngày bán:</label>
                <input type="date" class="form-control" id="ngayban" placeholder="Enter ngay ban " name="ngayban" 
                value="<?php echo date('Y-m-d',strtotime($row["ngayban"])) ?>" required>
            </div>
            <div class="mb-3">
                <label for="ngaygiaohang" class="form-label">Ngày giao hàng:</label>
                <input type="date" class="form-control" id="ngaygiaohang" placeholder="Enter ngay giao hang " name="ngaygiaohang" 
                value="<?php echo date('Y-m-d',strtotime($row["ngaygiaohang"])) ?>" required>
            </div>
            <div class="mb-3">
                <label for="ghichu" class="form-label">Ghi chú:</label>
                <input type="text" class="form-control" id="ghichu" placeholder="Enter ghi chu " name="ghichu" 
                value="<?php echo $row["ghichu"] ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Sửa đơn hàng</button>
    </div>
</body>
<?php  
    include "footer.php";
?>
</html>