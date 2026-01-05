<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quan ly ban hang</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        header{
            background-color: #aad9dbff;
            color: white;
            padding: 15px 0;
            text-align: center;
        }
        header img{
            height: 50px;
            margin-right: 10px;
        }
        footer{
            background-color: #145457ff;
            color: white;
            padding: 15px 0;
            text-align: center;
            font-weight: 500;
            border-top: 1px solid #ddd;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <header class="d-flex justify-content-between align-items-center px-4">
        <div class="d-flex align-items-center">
            <img src="./database/TinySharkDecal.jfif" alt="logo" height="50">
            <h2>ỨNG DỤNG QUẢN LÝ BÁN HÀNG</h2>
        </div>
        
        <?php
            if(isset($_SESSION["tendaydu"])):            
        ?>
        <div>
            <span>Xin chào <?php echo $_SESSION['tendaydu'] ?></span>
            <a href="logout.php" class="btn btn-light btn-sm">Đăng xuất</a>
        </div>
        <?php
            endif;
        ?>
    </header>
</body>
</html>