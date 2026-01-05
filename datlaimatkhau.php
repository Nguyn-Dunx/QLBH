<?php
session_start();
require_once("ketnoi.php");

if(!isset($_SESSION["reset_user"])){
    die("Không có quyền truy cập!");
}

$username = $_SESSION["reset_user"];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $pass = trim($_POST["matkhau"]);
    $sql = "UPDATE user SET matkhau = '$pass' WHERE username = '$username'";
    $conn->query($sql);

    unset($_SESSION["reset_user"]);
    echo "<script>alert('Đổi mật khẩu thành công!');window.location='login.php';</script>";
}
?>

<?php include "header.php";?>
    
<body>
    <div class="row justify-content-center">
        <h2 class="mt-4" style="text-align: center;">Đặt lại mật khẩu mới : </h2>
        <div class="col-md-4">
            <form method="post">
                <div class="mb-3 mt-3">
                    <label for="matkhau" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="matkhau" placeholder="Enter matkhau" name="matkhau">
                </div>
                
                <button type="submit" class="btn btn-success w-100">Xác nhận</button>
            </form>
        </div>
    </div>
</body>
<?php include "footer.php";?>
</html>