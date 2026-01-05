<?php
require_once("ketnoi.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = trim($_POST["username"]);
    $tendaydu = trim($_POST["tendaydu"]);

    $sql = "SELECT * FROM user WHERE username = '$username' AND tendaydu = '$tendaydu'";
    $res = $conn->query($sql);

    if(mysqli_num_rows($res) == 1){
        session_start();
        $_SESSION["reset_user"] = $username;
        header("Location: datlaimatkhau.php");
        exit();
    }else{
        $err = "Sai thông tin xác minh!";
    }
}
?>
<?php include "header.php";?>
    
<body>
    <div class="row justify-content-center">
        <h2 class="mt-4" style="text-align: center;">Nhập username và tên đầy đủ để lấy lại mật khẩu</h2>
        <div class="col-md-4">
            <?php if(!empty($err)) echo "<div class='alert alert-danger'>$err</div>";?>

            <form method="post">
                <div class="mb-3 mt-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                </div>
                <div class="mb-3">
                    <label for="tendaydu" class="form-label">Tên đầy đủ:</label>
                    <input type="text" class="form-control" id="tendaydu" placeholder="Enter tendaydu" name="tendaydu">
                </div>
                
                <button type="submit" class="btn btn-success w-100">Xác nhận</button>
                <a href="login.php" class="btn btn-outline-danger mt-3 w-100">Quay lại</a>
            </form>
        </div>
    </div>
</body>
<?php include "footer.php";?>
</html>