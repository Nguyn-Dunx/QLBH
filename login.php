<?php
    session_start();
    require_once("ketnoi.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = trim($_POST["username"]);
        $matkhau = trim($_POST["matkhau"]);

        $sql = "SELECT * FROM user Where username = '$username' AND matkhau = '$matkhau'";
        $res = $conn->query($sql);
        if(mysqli_num_rows($res) == 1){
            $user = mysqli_fetch_array($res);
            $_SESSION["username"] = $user["username"];
            $_SESSION["quyenhan"] = $user["quyenhan"];
            $_SESSION["tendaydu"] = $user["tendaydu"];
            header("Location: lietke.php");
            exit();
        }else{
            $err ="Sai tên đăng nhập hoặc mật khẩu!";
        }
    }
?>

<?php include "header.php";?>


<body>
    <div class="row justify-content-center">
        <h2 class="mt-4" style="text-align: center;">Đăng nhập hệ thống</h2>
        <div class="col-md-4">
            <?php if(!empty($err)) echo "<div class='alert alert-danger'>$err</div>";?>
            <form method="post">
                <div class="mb-3 mt-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                </div>
                <div class="mb-3">
                    <label for="matkhau" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="matkhau" placeholder="Enter password" name="matkhau">
                </div>
                <div class="form-check mb-3">
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                    </label>
                </div>

                <button type="submit" class="btn btn-success w-100">Đăng nhập</button>
                <a href="quenmatkhau.php" class="btn btn-outline-danger mt-3 w-100">Quen mat khau</a>
            </form>
        </div>
    </div>
</body>
<?php include "footer.php";?>
</html>