<?php
    include "ketnoi.php";

    $id = $_GET["sid"];

    $suasql = "DELETE FROM `donhang` WHERE `id`='$id'";
    if($conn->query($suasql) === true){
        echo "<script>
        alert('XOÁ sản phẩm thành công');
        window.location = 'lietke.php';
        </script>";
    }
    else{
        echo "<script>
        alert('LỖI XOÁ sản phẩm');
        window.location = 'lietke.php';
        </script>";
    }
?>