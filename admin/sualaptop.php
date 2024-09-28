<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sửa Laptop</title>
    <style type="text/css">
        table,tr,td,th{
            border: solid 1px black;
            border-spacing: 0px;
        }
        th{
            border-bottom: solid 5px black;
            background-color: cyan;
        }
        td,th{
            padding: 4px 8px;
        }
        table{
            border: solid 5px black;
            border-radius: 5px;
            width: 100%;
        }
        .titleTable{
            font-size: 2rem;
            text-align: center;
        }
        .Luoi50-50{
            display: grid;
            grid-template-columns: 15% 70% auto;
        }
        .menu{
            background-color: cyan;
            font-weight: bold;
            border-right: solid 5px black;
            width: 30%;
        }
        .Xacnhan{
            border-top: solid 5px black;
        }
        .menuInput{
            width: 98%;
        }
        .updata{
            text-align: center;
            color: green;
            font-size: 2rem;
        }
    </style>
</head>
<body>
    <?php
            $Id = $_GET['id'];

            $conn = mysqli_connect('localhost','root','','product');

            if (!$conn){
                echo 'Kết nối không thành công'.mysqli_connect_error();
            }
            else{
                $query = "SELECT * FROM tbl_laptop WHERE id='".$Id."'";
                $result = mysqli_query($conn,$query);
                if(mysqli_num_rows($result)>0){
                    while ($row=mysqli_fetch_assoc($result)){
                        $Loaisanpham = $row['loaimay'];
                        $Tensp = $row['tenmay'];
                        $Giacu = $row['giacu'];
                        $Giamoi = $row['giamoi'];
                        $Linkanh = $row['linkanh'];
                        $Dohoa = $row['dohoa'];
                        $Manhinh = $row['manhinh'];
                        $CPU = $row['cpu'];
                        $RAM = $row['ram'];
                        $Ocung = $row['ocung'];
                        $Tragop = $row['tragop'];
                        $Daban = $row['daban'];
                    }
                }
                else{
                    echo 'Không có dữ liệu';
                }
            }
    ?>
    <div class="Luoi50-50">
        <div class="Trai"></div>

        <div class="Giua">
            <h3 class="titleTable">
                    <b>---Sửa dữ liệu laptop---</b>
            </h3>
            <form method="POST">
                <table>
                    <tbody>
                        <tr>
                            <td class="menu">Loại sản phẩm</td>
                            <td class="menuContent">
                                <select name="txtloaisp" class="menuInput">
                                    <option value="1" <?php echo $Loaisanpham==1 ? "selected" : ""; ?>>Macbook</option>
                                    <option value="2" <?php echo $Loaisanpham==2 ? "selected" : ""; ?>>Lenovo</option>
                                    <option value="3" <?php echo $Loaisanpham==3 ? "selected" : ""; ?>>Dell</option>
                                    <option value="4" <?php echo $Loaisanpham==4 ? "selected" : ""; ?>>Asus</option>
                                    <option value="5" <?php echo $Loaisanpham==5 ? "selected" : ""; ?>>MSI</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="menu">Tên sản phẩm</td>
                            <td class="menuContent">
                                <input type="text" name="txttensp" class="menuInput" value="<?php echo("$Tensp") ?>">
                            </td>
                        </tr>

                        <tr>
                            <td class="menu">Giá cũ</td>
                            <td class="menuContent">
                                <input type="number" name="txtgiacu" class="menuInput" value="<?php echo("$Giacu") ?>">
                            </td>
                        </tr>

                        <tr>
                            <td class="menu">Giá mới</td>
                            <td class="menuContent">
                                <input type="number" name="txtgiamoi" class="menuInput" value="<?php echo("$Giamoi") ?>">
                            </td>
                        </tr>

                        <tr>
                            <td class="menu">Link ảnh</td>
                            <td class="menuContent">
                                <input type="text" name="txtlinkanh" class="menuInput" value="<?php echo("$Linkanh") ?>">
                            </td>
                        </tr>

                        <tr>
                            <td class="menu">Đồ họa</td>
                            <td class="menuContent">
                                <input type="text" name="txtdohoa" class="menuInput" value="<?php echo("$Dohoa") ?>">
                            </td>
                        </tr>

                        <tr>
                            <td class="menu">Màn hình</td>
                            <td class="menuContent">
                                <input type="text" name="txtmanhinh" class="menuInput" value="<?php echo("$Manhinh") ?>">
                            </td>
                        </tr>

                        <tr>
                            <td class="menu">CPU</td>
                            <td class="menuContent">
                                <input type="text" name="txtcpu" class="menuInput" value="<?php echo("$CPU") ?>">
                            </td>
                        </tr>

                        <tr>
                            <td class="menu">RAM</td>
                            <td class="menuContent">
                                <input type="text" name="txtram" class="menuInput" value="<?php echo("$RAM") ?>">
                            </td>
                        </tr>

                        <tr>
                            <td class="menu">Ổ cứng</td>
                            <td class="menuContent">
                                <input type="text" name="txtocung" class="menuInput" value="<?php echo("$Ocung") ?>">
                            </td>
                        </tr>

                        <tr>
                            <td class="menu">Trả góp</td>
                            <td class="menuContent">
                                <input type="text" name="txttragop" class="menuInput" value="<?php echo("$Tragop") ?>">
                            </td>
                        </tr>

                        <tr>
                            <td class="menu">Đã bán</td>
                            <td class="menuContent">
                                <input type="number" name="txtdaban" class="menuInput" value="<?php echo("$Daban") ?>">
                            </td>
                        </tr>
                        

                        <tr>
                            <td colspan="2" align="center" class="Xacnhan">
                                <button type="submit" name="btnGhi">Xác Nhận</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <br>
        <div align="right"> <button> <a href="CSDLlaptop.php" style="text-decoration: none;color: black;">Quay lại</a></button></button></div>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnGhi'])){
                    $Loaisanpham = $_POST['txtloaisp'];
                    $Tensp = $_POST['txttensp'];
                    $Giacu = $_POST['txtgiacu'];
                    $Giamoi = $_POST['txtgiamoi'];
                    $Linkanh = $_POST['txtlinkanh'];
                    $Dohoa = $_POST['txtdohoa'];
                    $Manhinh = $_POST['txtmanhinh'];
                    $CPU = $_POST['txtcpu'];
                    $RAM = $_POST['txtram'];
                    $Ocung = $_POST['txtocung'];
                    $Tragop = $_POST['txttragop'];
                    $Daban = $_POST['txtdaban'];
                    $Id = $_GET['id'];
                    $Linksp = "sanpham.php?cha=-3&con=".$Id;

                    $conn = mysqli_connect('localhost','root','','product');

                    if (!$conn){
                        echo 'Kết nối không thành công'.mysqli_connect_error();
                    }
                    else{
                        $query = "UPDATE tbl_laptop SET id='".$Id."',loaimay='".$Loaisanpham."',tenmay='".$Tensp."',giacu='".$Giacu."',giamoi='".$Giamoi."',linksp='".$Linksp."',linkanh='".$Linkanh."',dohoa='".$Dohoa."',manhinh='".$Manhinh."',cpu='".$CPU."',ram='".$RAM."',ocung='".$Ocung."',tragop='".$Tragop."',daban='".$Daban."' WHERE id = '".$Id."' ";
                        $result = mysqli_query($conn,$query);
                        if ($result > 0){
                            echo '<div class="updata">Sửa dữ liệu thành công</div>';
                        }
                        else{
                            echo 'Lỗi: '.mysqli_error($conn);
                        }
                    }
                    mysqli_close($conn);
                }
                    
            ?>
        </div>

        <div class="Phai"></div>
    </div>
            
</body>
</html>