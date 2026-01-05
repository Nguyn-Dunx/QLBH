<?php
    include "ketnoi.php";

    $id = $_POST["id"];
    $khachhang_id = $_POST["khachhang_id"];
    $trangthai = $_POST["trangthai"];
    $khuyenmai = $_POST["khuyenmai"];
    $ngayban = $_POST["ngayban"];
    $ngaygiaohang = $_POST["ngaygiaohang"];
    $ghichu = $_POST["ghichu"];

    $suasql = "UPDATE `donhang` SET `khachhang_id`='$khachhang_id',`trangthai`='$trangthai',
    `khuyenmai`='$khuyenmai',`ngayban`='$ngayban',`ngaygiaohang`='$ngaygiaohang',`ghichu`='$ghichu' WHERE `id`='$id'";
    if($conn->query($suasql) === true){
        echo "<script>
        alert('sửa sản phẩm thành công');
        window.location = 'lietke.php';
        </script>";
    }
    else{
        echo "<script>
        alert('LỖI sửa sản phẩm');
        window.location = 'lietke.php';
        </script>";
    }
?>