
<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
        exit();
    }
?>
<?php include("header.php"); ?>

<body>
    <div class="container mt-3">
        <h2>Danh sach ban hang</h2>
        <button type="button" class="btn btn-outline-success mb-3" data-bs-toggle="modal" data-bs-target="#myModal">
            Thêm sản phẩm
        </button>
        <form action="timkiem.php" method="get" class="d-flex-mb-3">
            <input type="search" name="keyword" placeholder="Nhập từ khoá cần tìm kiếm ..." class="form-control me-2" required>
            <button type="submit" class="btn btn-success mt-2 mb-2">Tìm kiếm</button>
        </form>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Id khach hang</th>
                <th>Trang thai</th>
                <th>Khuyen mai</th>
                <th>Ngay ban</th>
                <th>Ngay giao hang</th>
                <th>Ghi chu</th>
                <th>Chuc nang</th>
            </tr>
            </thead>
            <tbody>
                
                <?php
                    include "ketnoi.php";
                    $lietke = "SELECT `id`, `khachhang_id`, `trangthai`, `khuyenmai`, `ngayban`, `ngaygiaohang`, `ghichu`,
                        CASE 
                            WHEN trangthai = 1 THEN 'Giao hàng thành công'
                            WHEN trangthai = 0 THEN 'Đang giao hàng'
                            ELSE 'KO RÕ'
                        END as trang_thai
                        FROM `donhang`  order by id ";
                    $result = $conn->query("$lietke");
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row["id"]."</td>";
                        echo "<td>".$row["khachhang_id"]."</td>";
                        echo "<td>".$row["trang_thai"]."</td>";
                        echo "<td>".$row["khuyenmai"]."</td>";
                        echo "<td>".$row["ngayban"]."</td>";
                        echo "<td>".$row["ngaygiaohang"]."</td>";
                        echo "<td>".$row["ghichu"]."</td>";
                    
                ?>
                <td>
                    <a href="formSua.php?sid=<?php echo $row["id"]?>" class='btn btn-outline-warning'>Sửa</a>
                    <a href="xoa.php?sid=<?php echo $row["id"]?>" class='btn btn-outline-danger' onclick = "return confirm('bạn có chắc muốn xoá ? ')">Xoá</a>
                </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>



<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Them don hang</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
       <?php
            $rand = "DH".rand(00000,99999);
       ?>
      <div class="modal-body">
        <div class="container">
            <h2>FORM THÊM ĐƠN HÀNG</h2>
            <form action="add.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label" for="id">Id:</label>
                    <input type="text" id="id" name="id" placeholder="Nhập ma don hang" class="form-control" 
                    value="<?php echo $rand ?>" readonly style = "background: #eeee;">
                </div>
                <div class="mb-3">
                    <label for="khachhang_id" class="form-label">Id khách hàng:</label>
                    <input type="number" class="form-control" id="khachhang_id" placeholder="Enter khachhang id" name="khachhang_id" required>
                </div>
                <div class="mb-3">
                    <label for="trangthai" class="form-label">Trạng thái:</label>
                    <select name="trangthai" id="trangthai">
                        <option value="1">Giao hàng thành công</option>
                        <option value="0">Đang giao hàng</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="khuyenmai" class="form-label">Khuyến mãi:</label>
                    <input type="number" class="form-control" id="khuyenmai" placeholder="Enter khuyen mai " name="khuyenmai" required>
                </div>
                <div class="mb-3">
                    <label for="ngayban" class="form-label">Ngày bán:</label>
                    <input type="date" class="form-control" id="ngayban" placeholder="Enter ngay ban " name="ngayban" required>
                </div>
                <div class="mb-3">
                    <label for="ngaygiaohang" class="form-label">Ngày giao hàng:</label>
                    <input type="date" class="form-control" id="ngaygiaohang" placeholder="Enter ngay giao hang " name="ngaygiaohang" required>
                </div>
                <div class="mb-3">
                    <label for="ghichu" class="form-label">Ghi chú:</label>
                    <input type="text" class="form-control" id="ghichu" placeholder="Enter ghi chu " name="ghichu" required>
                </div>
                <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

</body>

<?php include("footer.php"); ?>
</html>