<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="trangchu.css">
    <title></title>
</head>
<body>


    <form method="POST">
        <div class="menu1">
            <div class="menu1-logofptshop">
                <img src="\73DCTD22\img\Logo fptshop.png" class="menu1-logofptshopimg">
            </div>
            <div class="menu1-Search">
                <input placeholder="Nhập tên điện thoại, máy tính, phụ kiện... cần tìm" type="text" name="txtSearch" class="menu1-Search-txt">
                <button name="btnSearch" class="menu1-Search-btn">
                    <img src="\73DCTD22\img\Search img-01.png" class="menu1-Search-btn-img">
                </button>
            </div>
            <div class="menu1-Dangnhap">
                            <a style="text-decoration: none;
                      color: white;
                      position: relative;
                      top: 40%;
                      font-family: Montserrat,sans-serif;
                      font-weight: bold;
                      background-color: #039f9f;
                      padding: 10px;
                      border-radius: 10px;" 
            href="dangxuat1.php">Đăng xuất</a>
            </div>
        </div>
    </form>




<?php


$conn1 = mysqli_connect('localhost','root','','menu');

if (!$conn1){
    echo 'Kết nối không thành công'.mysqli_connect_error();
}
else{
    $query1 = "SELECT * FROM tblmenu WHERE diachicon='0' ORDER BY diachicha DESC";
    $result1 = mysqli_query($conn1,$query1);
    if(mysqli_num_rows($result1)>0){
        echo '<div class="menu">
                        <div class="border">';
        while ($row1=mysqli_fetch_assoc($result1)){
            $conn2 = mysqli_connect('localhost','root','','menu');
            $query2 = "SELECT * FROM tblmenu WHERE diachicha='".$row1['diachicha']."' and diachicon>'0' ORDER BY diachicon";
            $result2 = mysqli_query($conn2,$query2);
            if(mysqli_num_rows($result2)==0){
                echo     '<div class="dropdown">
                                    <button class="dropbtn">
                                        <a href="'.$row1['linkmenu'].'" class="menu-text">'.$row1['name'].'</a>
                                    </button>
                                </div>';
            }
            else{
                echo    '<div class="dropdown">
                                    <button class="dropbtn"><a href="'.$row1['linkmenu'].'" class="menu-text">'.$row1['name'].'</a></button>
                                 <div class="dropdown-content">';
                if(mysqli_num_rows($result2)>0){
                    while ($row2=mysqli_fetch_assoc($result2)){
                        echo          '<a href="'.$row2['linkmenu'].'">'.$row2['name'].'</a>';
                    }
                    echo          '</div>
                                        </div>';

                }
            }




        }
        echo '</div>
       
        
                      </div>';
    }
}
mysqli_close($conn1);
?>




<div class="background-tong" style="background-color: rgb(255, 225, 225);">

    <div align="center"><img src="https://images.fpt.shop/unsafe/fit-in/filters:quality(80):fill(transparent)/fptshop.com.vn/Uploads/Originals/2024/4/5/638479217991407061_desk-header.png" class="header-img"></div>



            <?php 
                if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnSearch'])){
                    $Search = $_POST['txtSearch'];
                    if($Search != ""){
                        echo '<div class="product-tong-can" align="center">';
                        echo '  <div class="product-tong-can-title"><h2>KẾT QUẢ TÌM KIẾM</h2></div>';
                        echo '  <div class="product-tong">';
                        $conn3 = mysqli_connect('localhost','root','','product');
                        
                        if (!$conn3){
                                    echo 'Kết nối không thành công'.mysqli_connect_error();
                                } 
                        else{ 
                            $query3 = "SELECT * FROM tbl_product WHERE tenmay LIKE N'%".$Search."%'";
                            $query4 = "SELECT * FROM tbl_laptop WHERE tenmay LIKE N'%".$Search."%'";
                            $query5 = "SELECT * FROM tbl_maytinhbang WHERE tenmay LIKE N'%".$Search."%'";
                            $result3 = mysqli_query($conn3,$query3);
                            $result4 = mysqli_query($conn3,$query4);
                            $result5 = mysqli_query($conn3,$query5);
                                while ($row3=mysqli_fetch_assoc($result3)){
                                    
                                    echo '<div class="product">';
                                    echo '  <div class="product-img" >';
                                    echo '      <a href="'.$row3["linksp"].'">';
                                    echo '          <div class="product-img-chitiet">';
                                    echo '              <img src="'.$row3["linkanh"].'" class="product-img-chitiet-img">';
                                    echo '          </div>';
                                    echo '      </a>';
                                    
                                    echo '  </div>';

                                    echo '  <div class="product-thongtin">';
                                    echo '      <div><a href="'.$row3["linksp"].'" class="product-thongtin-ten">'.$row3["tenmay"].'</a></div>';
                                    if($row3["giacu"] == $row3["giamoi"]){
                                            echo '<div class="product-thongtin-gia-cu">'.$row3["giamoi"].' đ</div>';}
                                    else{
                                            echo '<div class="product-thongtin-gia-cu">'.$row3["giacu"].' đ</div>';
                                            echo '<div class="product-thongtin-gia-moi">'.$row3["giamoi"].' đ</div>';}
                                            echo '<div class="product-thongtin-daban">Đã bán:'.$row3["daban"].'</div>';
                                    echo '  </div>';
                                    echo '<br>';
                                    echo '<br>';
                                    echo '<br>';
                                    echo '<form action="addToCart.php" method="post">
                                            <input type="hidden" name="id" value="' . $row3["id"] . '">'; // Input ẩn chứa ID của sản phẩm
                                    echo '  <input type="hidden" name="tenmay" value="' . $row3["tenmay"] . '">'; // Input ẩn chứa tên của sản phẩm
                                    echo '  <input type="hidden" name="giamoi" value="' . $row3["giamoi"] . '">'; // Input ẩn chứa giá mới của sản phẩm
                                    echo '  <button type="submit" name="addToCart" onclick="alert(\'Thêm vào giỏ hàng thành công!\')">Thêm vào giỏ hàng</button>'; // Nút submit để thêm sản phẩm vào giỏ hàng
                                    echo '</form>';
                                    echo '      <div class="product-img-tragop_giam">';
                                    if($row3["tragop"]>=0){
                                        echo '      <div class="product-img-tragop">Trả góp '.$row3["tragop"].'%</div>';}
                                    if($row3["giacu"]-$row3["giamoi"]>0){
                                        echo '      <div class="product-img-giam">Giảm '.$row3["giacu"]-$row3["giamoi"].' đ</div>';
                                    }
                                    echo '      </div>';

                                    echo '</div>';
                                }
                                while ($row3=mysqli_fetch_assoc($result4)){
                                    
                                    echo '<div class="product">';
                                    echo '  <div class="product-img" >';
                                    echo '      <a href="'.$row3["linksp"].'">';
                                    echo '          <div class="product-img-chitiet">';
                                    echo '              <img src="'.$row3["linkanh"].'" class="product-img-chitiet-img">';
                                    echo '          </div>';
                                    echo '      </a>';
                                    
                                    echo '  </div>';

                                    echo '  <div class="product-thongtin">';
                                    echo '      <div><a href="'.$row3["linksp"].'" class="product-thongtin-ten">'.$row3["tenmay"].'</a></div>';
                                    if($row3["giacu"] == $row3["giamoi"]){
                                            echo '<div class="product-thongtin-gia-cu">'.$row3["giamoi"].' đ</div>';}
                                    else{
                                            echo '<div class="product-thongtin-gia-cu">'.$row3["giacu"].' đ</div>';
                                            echo '<div class="product-thongtin-gia-moi">'.$row3["giamoi"].' đ</div>';}
                                            echo '<div class="product-thongtin-daban">Đã bán:'.$row3["daban"].'</div>';
                                    echo '  </div>';
                                    echo '<br>';
                                    echo '<br>';
                                    echo '<br>';
                                    echo '<form action="addToCart.php" method="post">
                                            <input type="hidden" name="id" value="' . $row3["id"] . '">'; // Input ẩn chứa ID của sản phẩm
                                    echo '  <input type="hidden" name="tenmay" value="' . $row3["tenmay"] . '">'; // Input ẩn chứa tên của sản phẩm
                                    echo '  <input type="hidden" name="giamoi" value="' . $row3["giamoi"] . '">'; // Input ẩn chứa giá mới của sản phẩm
                                    echo '  <button type="submit" name="addToCart" onclick="alert(\'Thêm vào giỏ hàng thành công!\')">Thêm vào giỏ hàng</button>'; // Nút submit để thêm sản phẩm vào giỏ hàng
                                    echo '</form>';
                                    echo '      <div class="product-img-tragop_giam">';
                                    if($row3["tragop"]>=0){
                                        echo '      <div class="product-img-tragop">Trả góp '.$row3["tragop"].'%</div>';}
                                    if($row3["giacu"]-$row3["giamoi"]>0){
                                        echo '      <div class="product-img-giam">Giảm '.$row3["giacu"]-$row3["giamoi"].' đ</div>';
                                    }
                                    echo '      </div>';

                                    echo '</div>';
                                }
                                while ($row3=mysqli_fetch_assoc($result5)){
                                    
                                    echo '<div class="product">';
                                    echo '  <div class="product-img" >';
                                    echo '      <a href="'.$row3["linksp"].'">';
                                    echo '          <div class="product-img-chitiet">';
                                    echo '              <img src="'.$row3["linkanh"].'" class="product-img-chitiet-img">';
                                    echo '          </div>';
                                    echo '      </a>';
                                    
                                    echo '  </div>';

                                    echo '  <div class="product-thongtin">';
                                    echo '      <div><a href="'.$row3["linksp"].'" class="product-thongtin-ten">'.$row3["tenmay"].'</a></div>';
                                    if($row3["giacu"] == $row3["giamoi"]){
                                            echo '<div class="product-thongtin-gia-cu">'.$row3["giamoi"].' đ</div>';}
                                    else{
                                            echo '<div class="product-thongtin-gia-cu">'.$row3["giacu"].' đ</div>';
                                            echo '<div class="product-thongtin-gia-moi">'.$row3["giamoi"].' đ</div>';}
                                            echo '<div class="product-thongtin-daban">Đã bán:'.$row3["daban"].'</div>';
                                    echo '  </div>';
                                    echo '<br>';
                                    echo '<br>';
                                    echo '<br>';
                                    echo '<form action="addToCart.php" method="post">
                                            <input type="hidden" name="id" value="' . $row3["id"] . '">'; // Input ẩn chứa ID của sản phẩm
                                    echo '  <input type="hidden" name="tenmay" value="' . $row3["tenmay"] . '">'; // Input ẩn chứa tên của sản phẩm
                                    echo '  <input type="hidden" name="giamoi" value="' . $row3["giamoi"] . '">'; // Input ẩn chứa giá mới của sản phẩm
                                    echo '  <button type="submit" name="addToCart" onclick="alert(\'Thêm vào giỏ hàng thành công!\')">Thêm vào giỏ hàng</button>'; // Nút submit để thêm sản phẩm vào giỏ hàng
                                    echo '</form>';
                                    echo '      <div class="product-img-tragop_giam">';
                                    if($row3["tragop"]>=0){
                                        echo '      <div class="product-img-tragop">Trả góp '.$row3["tragop"].'%</div>';}
                                    if($row3["giacu"]-$row3["giamoi"]>0){
                                        echo '      <div class="product-img-giam">Giảm '.$row3["giacu"]-$row3["giamoi"].' đ</div>';
                                    }
                                    echo '      </div>';
                                    echo '</div>';
                                }
                        }
                        mysqli_close($conn3);
                        echo '  </div>';
                        echo '</div>';
                    }
                }   
             ?>


    <div class="product-tong-can" align="center">
        <div class="product-tong-can-title"><h2>ĐIỆN THOẠI NỔI BẬT</h2></div>
        <div class="product-tong">
            <?php
            $conn3 = mysqli_connect('localhost','root','','product');

            if (!$conn3){
                echo 'Kết nối không thành công'.mysqli_connect_error();
            }
            else{
                $query3 = "SELECT * FROM tbl_product ORDER BY daban DESC limit 4";
                $result3 = mysqli_query($conn3,$query3);
                if(mysqli_num_rows($result3)>0){
                    while ($row3=mysqli_fetch_assoc($result3)){

                        echo '<div class="product">';
                        echo '    <div class="product-img" >';
                        echo '        <a href="'.$row3["linksp"].'">';
                        echo '            <div class="product-img-chitiet">';
                        echo '                <img src="'.$row3["linkanh"].'" class="product-img-chitiet-img">';
                        echo '            </div>';
                        echo '        </a>';
                       
                        echo '    </div>';

                        echo '    <div class="product-thongtin">';
                        echo '        <div><a href="'.$row3["linksp"].'" class="product-thongtin-ten">'.$row3["tenmay"].'</a></div>';
                        if($row3["giacu"] == $row3["giamoi"]){
                            echo '<div class="product-thongtin-gia-cu">'.$row3["giamoi"].' đ</div>';}
                        else{
                            echo '<div class="product-thongtin-gia-cu">'.$row3["giacu"].' đ</div>';
                            echo '<div class="product-thongtin-gia-moi">'.$row3["giamoi"].' đ</div>';}
                        echo '<div class="product-thongtin-daban">Đã bán:'.$row3["daban"].'</div>';
                        echo '    </div>';
                        echo '<br>';
                        echo '<br>';
                        echo '<br>';
                        echo '<form action="addToCart.php" method="post">
                                <input type="hidden" name="id" value="' . $row3["id"] . '">'; // Input ẩn chứa ID của sản phẩm
                        echo '  <input type="hidden" name="tenmay" value="' . $row3["tenmay"] . '">'; // Input ẩn chứa tên của sản phẩm
                        echo '  <input type="hidden" name="giamoi" value="' . $row3["giamoi"] . '">'; // Input ẩn chứa giá mới của sản phẩm
                        echo '  <button type="submit" name="addToCart" onclick="alert(\'Thêm vào giỏ hàng thành công!\')">Thêm vào giỏ hàng</button>'; // Nút submit để thêm sản phẩm vào giỏ hàng
                        echo '</form>';

                         echo '        <div class="product-img-tragop_giam">';
                        if($row3["tragop"]>=0){
                            echo '        <div class="product-img-tragop">Trả góp '.$row3["tragop"].'%</div>';}
                        if($row3["giacu"]-$row3["giamoi"]>0){
                            echo '        <div class="product-img-giam">Giảm '.($row3["giacu"]-$row3["giamoi"]).' đ</div>';
                        }
                        echo '        </div>';

                        echo '</div>';
                    }
                }
            }
            mysqli_close($conn3);
            ?>
        </div>
    </div>


    





    <div class="product-tong-can" align="center">
        <div class="product-tong-can-title"><h2>LAPTOP BÁN CHẠY</h2></div>
        <div class="product-tong">
            <?php
            $conn3 = mysqli_connect('localhost','root','','product');

            if (!$conn3){
                echo 'Kết nối không thành công'.mysqli_connect_error();
            }
            else{
                $query3 = "SELECT * FROM tbl_laptop ORDER BY daban DESC limit 4";
                $result3 = mysqli_query($conn3,$query3);
                if(mysqli_num_rows($result3)>0){
                    while ($row3=mysqli_fetch_assoc($result3)){

                        echo '<div class="product">';
                        echo '    <div class="product-img" >';
                        echo '        <a href="'.$row3["linksp"].'">';
                        echo '            <div class="product-img-chitiet">';
                        echo '                <img src="'.$row3["linkanh"].'" class="product-img-chitiet-img">';
                        echo '            </div>';
                        echo '        </a>';
                        
                        echo '    </div>';

                        echo '    <div class="product-thongtin">';
                        echo '        <div><a href="'.$row3["linksp"].'" class="product-thongtin-ten">'.$row3["tenmay"].'</a></div>';
                        if($row3["giacu"] == $row3["giamoi"]){
                            echo '<div class="product-thongtin-gia-cu">'.$row3["giamoi"].' đ</div>';}
                        else{
                            echo '<div class="product-thongtin-gia-cu">'.$row3["giacu"].' đ</div>';
                            echo '<div class="product-thongtin-gia-moi">'.$row3["giamoi"].' đ</div>';}
                        echo '<div class="product-thongtin-daban">Đã bán:'.$row3["daban"].'</div>';
                        echo '    </div>';
                        echo '<br>';
                        echo '<br>';
                        echo '<br>';
                        echo '<form action="addToCart.php" method="post">
                                <input type="hidden" name="id" value="' . $row3["id"] . '">'; // Input ẩn chứa ID của sản phẩm
                        echo '  <input type="hidden" name="tenmay" value="' . $row3["tenmay"] . '">'; // Input ẩn chứa tên của sản phẩm
                        echo '  <input type="hidden" name="giamoi" value="' . $row3["giamoi"] . '">'; // Input ẩn chứa giá mới của sản phẩm
                        echo '  <button type="submit" name="addToCart" onclick="alert(\'Thêm vào giỏ hàng thành công!\')">Thêm vào giỏ hàng</button>'; // Nút submit để thêm sản phẩm vào giỏ hàng
                        echo '</form>';
                        echo '        <div class="product-img-tragop_giam">';
                        if($row3["tragop"]>=0){
                            echo '        <div class="product-img-tragop">Trả góp '.$row3["tragop"].'%</div>';}
                        if($row3["giacu"]-$row3["giamoi"]>0){
                            echo '        <div class="product-img-giam">Giảm '.($row3["giacu"]-$row3["giamoi"]).' đ</div>';
                        }
                        echo '        </div>';
                        echo '</div>';
                    }
                }
            }
            mysqli_close($conn3);
            ?>
        </div>
    </div>




    <div class="product-tong-can" align="center">
        <div class="product-tong-can-title"><h2>MÁY TÍNH BẢNG BÁN CHẠY</h2></div>
        <div class="product-tong">
            <?php
            $conn3 = mysqli_connect('localhost','root','','product');

            if (!$conn3){
                echo 'Kết nối không thành công'.mysqli_connect_error();
            }
            else{
                $query3 = "SELECT * FROM tbl_maytinhbang ORDER BY daban DESC limit 4";
                $result3 = mysqli_query($conn3,$query3);
                if(mysqli_num_rows($result3)>0){
                    while ($row3=mysqli_fetch_assoc($result3)){

                        echo '<div class="product">';
                        echo '    <div class="product-img" >';
                        echo '        <a href="'.$row3["linksp"].'">';
                        echo '            <div class="product-img-chitiet">';
                        echo '                <img src="'.$row3["linkanh"].'" class="product-img-chitiet-img">';
                        echo '            </div>';
                        echo '        </a>';
                        
                        echo '    </div>';

                        echo '    <div class="product-thongtin">';
                        echo '        <div><a href="'.$row3["linksp"].'" class="product-thongtin-ten">'.$row3["tenmay"].'</a></div>';
                        if($row3["giacu"] == $row3["giamoi"]){
                            echo '<div class="product-thongtin-gia-cu">'.$row3["giamoi"].' đ</div>';}
                        else{
                            echo '<div class="product-thongtin-gia-cu">'.$row3["giacu"].' đ</div>';
                            echo '<div class="product-thongtin-gia-moi">'.$row3["giamoi"].' đ</div>';}
                        echo '<div class="product-thongtin-daban">Đã bán:'.$row3["daban"].'</div>';
                        echo '    </div>';
                        echo '<br>';
                        echo '<br>';
                        echo '<br>';
                        echo '<form action="addToCart.php" method="post">
                                <input type="hidden" name="id" value="' . $row3["id"] . '">'; // Input ẩn chứa ID của sản phẩm
                        echo '  <input type="hidden" name="tenmay" value="' . $row3["tenmay"] . '">'; // Input ẩn chứa tên của sản phẩm
                        echo '  <input type="hidden" name="giamoi" value="' . $row3["giamoi"] . '">'; // Input ẩn chứa giá mới của sản phẩm
                        echo '  <button type="submit" name="addToCart" onclick="alert(\'Thêm vào giỏ hàng thành công!\')">Thêm vào giỏ hàng</button>'; // Nút submit để thêm sản phẩm vào giỏ hàng
                        echo '</form>';
                        echo '        <div class="product-img-tragop_giam">';
                        if($row3["tragop"]>=0){
                            echo '        <div class="product-img-tragop">Trả góp '.$row3["tragop"].'%</div>';}
                        if($row3["giacu"]-$row3["giamoi"]>0){
                            echo '        <div class="product-img-giam">Giảm '.($row3["giacu"]-$row3["giamoi"]).' đ</div>';
                        }
                        echo '        </div>';
                        echo '</div>';
                    }
                }
            }
            mysqli_close($conn3);
            ?>
        </div>
    </div>




    <!--

    <div class="product-tong-can" align="center">
        <div class="product-tong">

                    <div class="product">
                        <div class="product-img" >
                            <a href="#">
                                <div class="product-img-chitiet">
                                    <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/10/30/638342502751589917_ip-15-pro-max-dd-bh-2-nam.jpg" class="product-img-chitiet-img">
                                </div>
                            </a>
                            <div class="product-img-tragop_giam">
                                <div class="product-img-tragop">Trả góp</div>
                                <div class="product-img-giam">Giảm</div>
                            </div>
                        </div>

                        <div class="product-thongtin">
                            <div><a href="#" class="product-thongtin-ten">iPhone 15 Pro Max 256GB</a></div>
                            <div class="product-thongtin-gia-cu">34.990.000 đ</div>
                            <div class="product-thongtin-gia-moi">30.690.000 đ</div>
                            <div class="product-thongtin-daban">Đã bán:</div>
                        </div>

                    </div>

        </div>
    </div>

    -->











</div>
</body>
</html>
