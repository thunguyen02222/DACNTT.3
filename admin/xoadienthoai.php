<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xóa Điện Thoại</title>
    <style type="text/css">
        .Luoi50-50{
            display: grid;
            grid-template-columns: 35% 30% auto;
        }
        .titleTable{
            font-size: 2rem;
            text-align: center;
        }
        .delete{
            text-align: center;
            color: green;
            font-size: 2rem;
        }
    </style>
</head>
<body>       
    <div class="Luoi50-50">
        <div class="Trai"></div>

        <div class="Giua">
            <h3 class="titleTable">
                    <b>---Xóa dữ liệu điện thoại---</b>
            </h3>
            <?php
                $Id = $_GET['id'];
                    $conn = mysqli_connect('localhost','root','','product');

                    if (!$conn){
                        echo 'Kết nối không thành công'.mysqli_connect_error();
                    }
                    else{
                        $query = "DELETE FROM tbl_product WHERE id='".$Id."'";
                        $result = mysqli_query($conn,$query);
                        if ($result > 0){
                            echo '<div class="delete">Xóa dữ liệu thành công</div>';
                        }
                        else{
                            echo 'Lỗi: '.mysqli_error($conn);
                        }
                    }
                mysqli_close($conn);
            ?>
            <br>
            <div align="right"> <button> <a href="CSDLdienthoai.php" style="text-decoration: none;color: black;">Quay lại</a></button></button></div>
        </div>

        <div class="Phai"></div>
    </div>
            
</body>
</html>