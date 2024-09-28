 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm Điện Thoại</title>
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
        .select{
            text-align: center;
            color: green;
            font-size: 2rem;
        }
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <div class="Luoi50-50">
        <div class="Trai"></div>

        <div class="Giua">
            <h3 class="titleTable">
                    <b>---Thêm dữ liệu điện thoại---</b>
            </h3>
             <form method="POST">
                <table>
                    <tbody>
                        <tr>
                            <td class="menu">Loại sản phẩm</td>
                            <td class="menuContent">
                                <select name="txtloaisp" class="menuInput">
                                    <option value="1">Iphone</option>
                                    <option value="2">Samsung</option>
                                    <option value="3">Oppo</option>
                                    <option value="4">Xiaomi</option>
                                    <option value="5">Nokia</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="menu">Tên sản phẩm</td>
                            <td class="menuContent">
                                <input type="text" name="txttensp" class="menuInput">
                            </td>
                        </tr>

                        <tr>
                            <td class="menu">Giá cũ</td>
                            <td class="menuContent">
                                <input type="number" name="txtgiacu" class="menuInput">
                            </td>
                        </tr>

                        <tr>
                            <td class="menu">Giá mới</td>
                            <td class="menuContent">
                                <input type="number" name="txtgiamoi" class="menuInput">
                            </td>
                        </tr>

                        <tr>
                            <td class="menu">Link ảnh</td>
                            <td class="menuContent">
                                <input type="text" name="txtlinkanh" class="menuInput">
                            </td>
                        </tr>

                        <tr>
                            <td class="menu">Màn hình</td>
                            <td class="menuContent">
                                <input type="text" name="txtmanhinh" class="menuInput">
                            </td>
                        </tr>

                        <tr>
                            <td class="menu">Camera sau</td>
                            <td class="menuContent">
                                <input type="text" name="txtcamsau" class="menuInput">
                            </td>
                        </tr>

                        <tr>
                            <td class="menu">Camera Selfie</td>
                            <td class="menuContent">
                                <input type="text" name="txtcamtruoc" class="menuInput">
                            </td>
                        </tr>

                        <tr>
                            <td class="menu">CPU</td>
                            <td class="menuContent">
                                <input type="text" name="txtcpu" class="menuInput">
                            </td>
                        </tr>

                        <tr>
                            <td class="menu">Bộ nhớ trong</td>
                            <td class="menuContent">
                                <input type="text" name="txtrom" class="menuInput">
                            </td>
                        </tr>

                        <tr>
                            <td class="menu">Trả góp</td>
                            <td class="menuContent">
                                <input type="text" name="txttragop" class="menuInput">
                            </td>
                        </tr>

                        <tr>
                            <td class="menu">Đã bán</td>
                            <td class="menuContent">
                                <input type="number" name="txtdaban" class="menuInput">
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
            <div align="right"> <button> <a href="CSDLdienthoai.php" style="text-decoration: none;color: black;">Quay lại</a></button></button></div>
            
            <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnGhi'])){
                        $Loaisanpham = $_POST['txtloaisp'];
                        $Tensp = $_POST['txttensp'];
                        $Giacu = $_POST['txtgiacu'];
                        $Giamoi = $_POST['txtgiamoi'];
                        $Linkanh = $_POST['txtlinkanh'];
                        $Manhinh = $_POST['txtmanhinh'];
                        $Camsau = $_POST['txtcamsau'];
                        $Camtruoc = $_POST['txtcamtruoc'];
                        $CPU = $_POST['txtcpu'];
                        $ROM = $_POST['txtrom'];
                        $Tragop = $_POST['txttragop'];
                        $Daban = $_POST['txtdaban'];

                        $conn = mysqli_connect('localhost','root','','product');

                        if (!$conn){
                            echo '<div class="error">Kết nối không thành công</div>'.mysqli_connect_error();
                        }
                        else{
                            $query1 = "SELECT * FROM tbl_product  ";
                            $result1 = mysqli_query($conn,$query1);
                            $Id = 1;
                            if(mysqli_num_rows($result1)>0){
                                while ($row1=mysqli_fetch_assoc($result1)){
                                    if($Id = $row1["id"]){
                                        $Id = $Id +1;
                                    }
                                    else{break;}
                                }
                            }
                            $Linksp = "sanpham.php?cha=-2&con=".$Id;
                            
                            $query2 = "INSERT INTO  tbl_product VALUES('".$Id."','".$Loaisanpham."','".$Tensp."','".$Giacu."','".$Giamoi."','".$Linksp."','".$Linkanh."','".$Manhinh."','".$Camsau."','".$Camtruoc."','".$CPU."','".$ROM."','".$Tragop."','".$Daban."') ";
                                $result2 = mysqli_query($conn,$query2);
                                if ($result2 > 0){
                                    echo '<div class="select">Thêm dữ liệu thành công</div>';
                                }
                                else{
                                    echo '<div class="error">Lỗi: </div>'.mysqli_error($conn);
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