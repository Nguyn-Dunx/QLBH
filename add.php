<?php
    include "ketnoi.php";

    $id = $_POST["id"];
    $khachhang_id = $_POST["khachhang_id"];
    $trangthai = $_POST["trangthai"];
    $khuyenmai = $_POST["khuyenmai"];
    $ngayban = $_POST["ngayban"];
    $ngaygiaohang = $_POST["ngaygiaohang"];
    $ghichu = $_POST["ghichu"];

    $themsql = "INSERT INTO `donhang`(`id`, `khachhang_id`, `trangthai`, `khuyenmai`, `ngayban`, `ngaygiaohang`, `ghichu`) 
    VALUES ('$id','$khachhang_id','$trangthai','$khuyenmai','$ngayban','$ngaygiaohang','$ghichu')";
    if($conn->query($themsql) === true){
        echo "<script>
        alert('thêm sản phẩm thành công');
        window.location = 'lietke.php';
        </script>";
    }
    else{
        echo "<script>
        alert('LỖI thêm sản phẩm');
        window.location = 'lietke.php';
        </script>";
    }
?>