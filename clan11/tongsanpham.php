<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="tongsanpham2.css">
	<title></title>
</head>
<body>

	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?cha=<?php $Cha = $_GET['cha']; echo urlencode($Cha); ?>&con=<?php $Con = $_GET['con']; echo urlencode($Con); ?>">
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
				<?php
                 session_start();

                  // Kiểm tra trạng thái đăng nhập
                 if (!isset($_SESSION["email"])) {
                 header("Location: dangnhap1.php"); // Chuyển hướng đến trang đăng nhập
                 exit();
                }
            ?>
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
			$query1 = "SELECT * FROM tblmenu WHERE diachicon='"."0"."' ORDER BY diachicha DESC";
			$result1 = mysqli_query($conn1,$query1);
			if(mysqli_num_rows($result1)>0){
				echo '<div class="menu">
				        <div class="border">';
				while ($row1=mysqli_fetch_assoc($result1)){
					$conn2 = mysqli_connect('localhost','root','','menu');
					$query2 = "SELECT * FROM tblmenu WHERE diachicha='"."$row1[diachicha]"."' and diachicon>'"."0"."' ORDER BY diachicon";
					$result2 = mysqli_query($conn2,$query2);
				
					        	if(mysqli_num_rows($result2)==0){
									echo     '<div class="dropdown">
									            <button class="dropbtn">
									                <a href="'.$row1['linkmenu'].'" class="menu-text">'.$row1['name'].'</a>
									            </button>
									        </div>';
								}
							    else{
							echo	'<div class="dropdown">
									        <button class="dropbtn"><a href="'.$row1['linkmenu'].'" class="menu-text">'.$row1['name'].'</a></button>
									 <div class="dropdown-content">';
							    	if(mysqli_num_rows($result2)>0){
										while ($row2=mysqli_fetch_assoc($result2)){
							echo    	  '<a href="'.$row2['linkmenu'].'">'.$row2['name'].'</a>';
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
		mysqli_close($conn2);
	?>
	<div class="background-tong" style="background-color: #f8f9fa;">
	<div align="center"><img src="https://images.fpt.shop/unsafe/fit-in/filters:quality(80):fill(transparent)/fptshop.com.vn/Uploads/Originals/2024/4/5/638479217991407061_desk-header.png" class="header-img"></div>







	<div class="bodysp">
		<div class="bodysp-trai"> 
			<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnGhi'])){ ?>
				<form method="POST"  id="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?cha=<?php $Cha = $_GET['cha']; echo urlencode($Cha); ?>&con=<?php $Con = $_GET['con']; echo urlencode($Con); ?>">
					<div class="hangsx">
						<div class="hangsx-title">HÃNG SẢN XUẤT</div>
						<div class="hangsx-checkbox">
							<?php 
								$Cha = $_GET['cha'];
								$hang0 = isset($_POST['hang0']) ? "checked" : "";
								$hang1 = isset($_POST['hang1']) ? "checked" : "";
								$hang2 = isset($_POST['hang2']) ? "checked" : "";
								$hang3 = isset($_POST['hang3']) ? "checked" : "";
								$hang4 = isset($_POST['hang4']) ? "checked" : "";
								$hang5 = isset($_POST['hang5']) ? "checked" : ""; 
								$gia0 = isset($_POST['gia0']) ? "checked" : "";
								$gia1 = isset($_POST['gia1']) ? "checked" : "";
								$gia2 = isset($_POST['gia2']) ? "checked" : "";
								$gia3 = isset($_POST['gia3']) ? "checked" : "";
								$gia4 = isset($_POST['gia4']) ? "checked" : "";
								$gia5 = isset($_POST['gia5']) ? "checked" : "";
								$conn = mysqli_connect('localhost','root','','menu');
								if (!$conn){
									echo 'Kết nối không thành công'.mysqli_connect_error();
								}
								else{
									$query = "SELECT * FROM tblmenu WHERE diachicha='"."$Cha"."' ORDER BY diachicon";
									$result = mysqli_query($conn,$query);
									if(mysqli_num_rows($result)>0){
										while ($row=mysqli_fetch_assoc($result)){
											if($row['diachicon'] == 0){
												echo '<div class="hangsx-checkbox-con">';
												echo '	<input type="checkbox" name="hang'.$row['diachicon'].'" value="'.$row['diachicon'].'" '.$hang0.'>';
												echo '	<label for='.$row['diachicon'].'>Tất cả</label>';
												echo '</div>';										
											}
											if($row['diachicon'] == 1){
												echo '<div class="hangsx-checkbox-con">';
												echo '	<input type="checkbox" name="hang'.$row['diachicon'].'" value="'.$row['diachicon'].'" '.$hang1.'>';
												echo '	<label for='.$row['diachicon'].'>'.$row['name'].'</label>';
												echo '</div>';										
											}
											if($row['diachicon'] == 2){
												echo '<div class="hangsx-checkbox-con">';
												echo '	<input type="checkbox" name="hang'.$row['diachicon'].'" value="'.$row['diachicon'].'" '.$hang2.'>';
												echo '	<label for='.$row['diachicon'].'>'.$row['name'].'</label>';
												echo '</div>';										
											}
											if($row['diachicon'] == 3){
												echo '<div class="hangsx-checkbox-con">';
												echo '	<input type="checkbox" name="hang'.$row['diachicon'].'" value="'.$row['diachicon'].'" '.$hang3.'>';
												echo '	<label for='.$row['diachicon'].'>'.$row['name'].'</label>';
												echo '</div>';										
											}
											if($row['diachicon'] == 4){
												echo '<div class="hangsx-checkbox-con">';
												echo '	<input type="checkbox" name="hang'.$row['diachicon'].'" value="'.$row['diachicon'].'" '.$hang4.'>';
												echo '	<label for='.$row['diachicon'].'>'.$row['name'].'</label>';
												echo '</div>';										
											}
											if($row['diachicon'] == 5){
												echo '<div class="hangsx-checkbox-con">';
												echo '	<input type="checkbox" name="hang'.$row['diachicon'].'" value="'.$row['diachicon'].'" '.$hang5.'>';
												echo '	<label for='.$row['diachicon'].'>'.$row['name'].'</label>';
												echo '</div>';										
											}
										}
									}
								}
								mysqli_close($conn);
							?>
						</div>
					</div>

					<div class="hangsx">
						<div class="hangsx-title">MỨC GIÁ</div>
						<div class="hangsx-checkbox">
							
							
								<div class="hangsx-checkbox-con">
									<input id="gia0" type="checkbox" name="gia0" value="0" <?php echo ("$gia0") ?>>
									<label for="0">Tất cả</label>
								</div>
								<div class="hangsx-checkbox-con">
									<input id="gia1" type="checkbox" name="gia1" value="1" <?php echo ("$gia1") ?>>
									<label for="1">Dưới 2 triệu</label>
								</div>
								<div class="hangsx-checkbox-con">
									<input id="gia2" type="checkbox" name="gia2" value="2" <?php echo ("$gia2") ?>>
									<label for="2">Từ 2 - 4 triệu</label>
								</div>
								<div class="hangsx-checkbox-con">
									<input id="gia3" type="checkbox" name="gia3" value="3" <?php echo ("$gia3") ?>>
									<label for="3">Từ 4 - 7 triệu</label>
								</div>
								<div class="hangsx-checkbox-con">
									<input id="gia4" type="checkbox" name="gia4" value="4" <?php echo ("$gia4") ?>>
									<label for="4">Từ 7 - 13 triệu</label>
								</div>
								<div class="hangsx-checkbox-con">
									<input id="gia5" type="checkbox" name="gia5" value="5" <?php echo ("$gia5") ?>>
									<label for="5">Trên 13 triệu</label>
								</div>
								<br><br>
								<button type="submit" name="btnGhi" onclick="submitForm()">Xác Nhận</button>
							
						</div>
					</div>  
				</form>

			<?php } else{ ?>
				<form method="POST"  id="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?cha=<?php $Cha = $_GET['cha']; echo urlencode($Cha); ?>&con=<?php $Con = $_GET['con']; echo urlencode($Con); ?>">

					<div class="hangsx">
						<div class="hangsx-title">HÃNG SẢN XUẤT</div>
						<div class="hangsx-checkbox">
							<?php 
								$Cha = $_GET['cha'];
								$Con = $_GET['con'];
								$conn = mysqli_connect('localhost','root','','menu');
								
								if (!$conn){
									echo 'Kết nối không thành công'.mysqli_connect_error();
								}
								else{
									$query = "SELECT * FROM tblmenu WHERE diachicha='"."$Cha"."' ORDER BY diachicon";
									$result = mysqli_query($conn,$query);
									if(mysqli_num_rows($result)>0){
										while ($row=mysqli_fetch_assoc($result)){
											if($row['diachicon'] == 0){
												if($row['diachicon'] == $Con){
													echo '<div class="hangsx-checkbox-con">';
													echo '	<input type="checkbox" name="hang'.$row['diachicon'].'" value="'.$row['diachicon'].'" checked>';
													echo '	<label for='.$row['diachicon'].'>Tất cả</label>';
													echo '</div>';
												}
												else{
													echo '<div class="hangsx-checkbox-con">';
													echo '	<input type="checkbox" name="hang'.$row['diachicon'].'" value="'.$row['diachicon'].'">';
													echo '	<label for="'.$row['diachicon'].'">Tất cả</label>';
													echo '</div>';
												}
											}
											else{
												if($row['diachicon'] == $Con){
													echo '<div class="hangsx-checkbox-con">';
													echo '	<input type="checkbox" name="hang'.$row['diachicon'].'" value="'.$row['diachicon'].'" checked>';
													echo '	<label for="'.$row['diachicon'].'">'.$row['name'].'</label>';
													echo '</div>';
												}
												else{
													echo '<div class="hangsx-checkbox-con">';
													echo '	<input type="checkbox" name="hang'.$row['diachicon'].'" value="'.$row['diachicon'].'">';
													echo '	<label for="'.$row['diachicon'].'">'.$row['name'].'</label>';
													echo '</div>';
												}
											}
												
										}
									}
								}
								mysqli_close($conn);
							?>
							<br><br>
						</div>
					</div>
					
					<div class="hangsx">
						<div class="hangsx-title">MỨC GIÁ</div>
						<div class="hangsx-checkbox">
							
							
								<div class="hangsx-checkbox-con">
									<input id="gia0" type="checkbox" name="gia0" value="0" checked>
									<label for="0">Tất cả</label>
								</div>
								<div class="hangsx-checkbox-con">
									<input id="gia1" type="checkbox" name="gia1" value="1">
									<label for="1">Dưới 2 triệu</label>
								</div>
								<div class="hangsx-checkbox-con">
									<input id="gia2" type="checkbox" name="gia2" value="2">
									<label for="2">Từ 2 - 4 triệu</label>
								</div>
								<div class="hangsx-checkbox-con">
									<input id="gia3" type="checkbox" name="gia3" value="3">
									<label for="3">Từ 4 - 7 triệu</label>
								</div>
								<div class="hangsx-checkbox-con">
									<input id="gia4" type="checkbox" name="gia4" value="4">
									<label for="4">Từ 7 - 13 triệu</label>
								</div>
								<div class="hangsx-checkbox-con">
									<input id="gia5" type="checkbox" name="gia5" value="5">
									<label for="5">Trên 13 triệu</label>
								</div>
								<br><br>
								<button type="submit" name="btnGhi" onclick="submitForm()">Xác Nhận</button>
							
						</div>
					</div>  
				</form>	
			<?php } ?>
		</div>

		<div class="bodysp-phai" align="right">
			<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnSearch'])){ ?>
				<div class="product-tong-can" align="center">
					<div class="product-tong-can-title"><h2>KẾT QUẢ TÌM KIẾM</h2></div>
					<div class="product-tong">
						<?php  
							$Search = $_POST['txtSearch'];
							$Cha = $_GET['cha'];
							$Con = $_GET['con'];
							if($Search != ""){
								$conn3 = mysqli_connect('localhost','root','','product');
								if($Cha == -2){$table = "tbl_product";}
								else{if($Cha == -3){$table = "tbl_laptop";}
								else{if($Cha == -4){$table = "tbl_maytinhbang";}}}
								if (!$conn3){
											echo 'Kết nối không thành công'.mysqli_connect_error();
										} 
								else{
									if($Con == 0){ $query3 = "SELECT * FROM $table WHERE tenmay LIKE N'%".$Search."%'  "; }
									else{ $query3 = "SELECT * FROM $table WHERE tenmay LIKE N'%".$Search."%' AND loaimay = '"."$Con"."' "; }
									$result3 = mysqli_query($conn3,$query3);
									while ($row3=mysqli_fetch_assoc($result3)){
										
										echo '<div class="product">';
										echo '	<div class="product-img" >';
										echo '		<a href="'.$row3["linksp"].'">';
										echo '			<div class="product-img-chitiet">';
										echo '				<img src="'.$row3["linkanh"].'" class="product-img-chitiet-img">';
										echo '			</div>';
										echo '		</a>';
										
										echo '	</div>';

										echo '	<div class="product-thongtin">';
										echo '		<div><a href="'.$row3["linksp"].'" class="product-thongtin-ten">'.$row3["tenmay"].'</a></div>';
										if($row3["giacu"] == $row3["giamoi"]){
										    	echo '<div class="product-thongtin-gia-cu">'.$row3["giamoi"].' đ</div>';}
										else{
										    	echo '<div class="product-thongtin-gia-cu">'.$row3["giacu"].' đ</div>';
										    	echo '<div class="product-thongtin-gia-moi">'.$row3["giamoi"].' đ</div>';}
												echo '<div class="product-thongtin-daban">Đã bán:'.$row3["daban"].'</div>';
										echo '	</div>';
										echo '<br>';
				                        echo '<br>';
				                        echo '<br>';
				                        echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '?cha='.urlencode($Cha).'&con='. urlencode($Con).'" method="post">
				                                <input type="hidden" name="id" value="' . $row3["id"] . '">'; // Input ẩn chứa ID của sản phẩm
				                        echo '  <input type="hidden" name="tenmay" value="' . $row3["tenmay"] . '">'; // Input ẩn chứa tên của sản phẩm
				                        echo '  <input type="hidden" name="giamoi" value="' . $row3["giamoi"] . '">'; // Input ẩn chứa giá mới của sản phẩm
				                        echo '  <button type="submit" name="addToCart" onclick="alert(\'Thêm vào giỏ hàng thành công!\')">Thêm vào giỏ hàng</button>'; // Nút submit để thêm sản phẩm vào giỏ hàng
				                        echo '</form>';
										echo '		<div class="product-img-tragop_giam">';
										if($row3["tragop"]>=0){
											echo '		<div class="product-img-tragop">Trả góp '.$row3["tragop"].'%</div>';}
										if($row3["giacu"]-$row3["giamoi"]>0){
											echo '		<div class="product-img-giam">Giảm '.$row3["giacu"]-$row3["giamoi"].' đ</div>';
										}
										echo '		</div>';
										echo '</div>';
									}
								}
							}
						?>
					</div>
				</div>
			<?php } else{ ?>	
				<div class="product-tong-can" align="center">
					<div class="product-tong-can-title"><h2>KẾT QUẢ</h2></div>


					<div class="product-tong">
						<?php
							$Cha = $_GET['cha'];
							$Con = $_GET['con'];
							if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnGhi'])){
								$Hang0 = isset($_POST['hang0']) ? $_POST['hang0'] : "-1";   $Gia0   = isset($_POST['gia0']) ? $_POST['gia0'] : "-1";
								$Hang1 = isset($_POST['hang1']) ? $_POST['hang1'] : "-2";   $Gia1   = isset($_POST['gia1']) ? "2000000" : "-1";
								$Hang2 = isset($_POST['hang2']) ? $_POST['hang2'] : "-3";   $Gia2_1 = isset($_POST['gia2']) ? "2000000" : "-2";   $Gia2_2 = isset($_POST['gia2']) ? "4000000" : "-1";
								$Hang3 = isset($_POST['hang3']) ? $_POST['hang3'] : "-4";   $Gia3_1 = isset($_POST['gia3']) ? "4000000" : "-2";   $Gia3_2 = isset($_POST['gia3']) ? "7000000" : "-1";
								$Hang4 = isset($_POST['hang4']) ? $_POST['hang4'] : "-5";   $Gia4_1 = isset($_POST['gia4']) ? "7000000" : "-2";   $Gia4_2 = isset($_POST['gia4']) ? "13000000" : "-1";
								$Hang5 = isset($_POST['hang5']) ? $_POST['hang5'] : "-6";   $Gia5   = isset($_POST['gia5']) ? "13000000" : "10000000000000";

								
								$conn3 = mysqli_connect('localhost','root','','product');
								if($Cha == -2){$table = "tbl_product";}
								else{if($Cha == -3){$table = "tbl_laptop";}
								else{if($Cha == -4){$table = "tbl_maytinhbang";}}}
								if (!$conn3){
											echo 'Kết nối không thành công'.mysqli_connect_error();
										} 
								else{
									if($Hang0==0){
										if($Gia0==0){
											$query3 = "SELECT * FROM $table ";
										}
										else{
											$query3 = "SELECT * FROM $table       
											           WHERE (giamoi<'"."$Gia1"."') OR (giamoi>='"."$Gia2_1"."' AND giamoi<'"."$Gia2_2"."') OR (giamoi>='"."$Gia3_1"."' AND giamoi<'"."$Gia3_2"."') OR (giamoi>='"."$Gia4_1 "."'AND giamoi<'"."$Gia4_2"."') OR (giamoi>='"."$Gia5"."')";
										}
									}
									else{
										if($Gia0==0){
											$query3 = "SELECT * FROM $table WHERE loaimay IN ('"."$Hang1"."','"."$Hang2"."','"."$Hang3"."','"."$Hang4"."','"."$Hang5"."')";
										}
										else{
											$query3 = "SELECT * FROM $table 
											           WHERE (loaimay IN ('"."$Hang1"."','"."$Hang2"."','"."$Hang3"."','"."$Hang4"."','"."$Hang5"."')) AND 
											                  ((giamoi<'"."$Gia1"."') OR (giamoi>='"."$Gia2_1"."' AND giamoi<'"."$Gia2_2"."') OR (giamoi>='"."$Gia3_1"."' AND giamoi<'"."$Gia3_2"."') OR (giamoi>='"."$Gia4_1"."' AND giamoi<'"."$Gia4_2"."') OR (giamoi>='"."$Gia5"."'))";
										}
									}
									
									$result3 = mysqli_query($conn3,$query3);
									if(mysqli_num_rows($result3)>0){
										while ($row3=mysqli_fetch_assoc($result3)){
											
											echo '<div class="product">';
											echo '	<div class="product-img" >';
											echo '		<a href="'.$row3["linksp"].'">';
											echo '			<div class="product-img-chitiet">';
											echo '				<img src="'.$row3["linkanh"].'" class="product-img-chitiet-img">';
											echo '			</div>';
											echo '		</a>';
											
											echo '	</div>';

											echo '	<div class="product-thongtin">';
											echo '		<div><a href="'.$row3["linksp"].'" class="product-thongtin-ten">'.$row3["tenmay"].'</a></div>';
											if($row3["giacu"] == $row3["giamoi"]){
											    	echo '<div class="product-thongtin-gia-cu">'.$row3["giamoi"].' đ</div>';}
											else{
											    	echo '<div class="product-thongtin-gia-cu">'.$row3["giacu"].' đ</div>';
											    	echo '<div class="product-thongtin-gia-moi">'.$row3["giamoi"].' đ</div>';}
													echo '<div class="product-thongtin-daban">Đã bán:'.$row3["daban"].'</div>';
											echo '	</div>';
											echo '<br>';
					                        echo '<br>';
					                        echo '<br>';
					                        echo '<form action="addToCart.php" method="post">
					                                <input type="hidden" name="id" value="' . $row3["id"] . '">'; // Input ẩn chứa ID của sản phẩm
					                        echo '  <input type="hidden" name="tenmay" value="' . $row3["tenmay"] . '">'; // Input ẩn chứa tên của sản phẩm
					                        echo '  <input type="hidden" name="giamoi" value="' . $row3["giamoi"] . '">'; // Input ẩn chứa giá mới của sản phẩm
					                        echo '  <button type="submit" name="addToCart" onclick="alert(\'Thêm vào giỏ hàng thành công!\')">Thêm vào giỏ hàng</button>'; // Nút submit để thêm sản phẩm vào giỏ hàng
					                        echo '</form>';
											echo '		<div class="product-img-tragop_giam">';
											if($row3["tragop"]>=0){
												echo '		<div class="product-img-tragop">Trả góp '.$row3["tragop"].'%</div>';}
											if($row3["giacu"]-$row3["giamoi"]>0){
												echo '		<div class="product-img-giam">Giảm '.$row3["giacu"]-$row3["giamoi"].' đ</div>';
											}
											echo '		</div>';
											echo '</div>';
										}
									}
								}
								mysqli_close($conn3);
							}
							else{
								$Con = $_GET['con'];
								$conn3 = mysqli_connect('localhost','root','','product');
								if($Cha == -2){$table = "tbl_product";}
								else{if($Cha == -3){$table = "tbl_laptop";}
								else{if($Cha == -4){$table = "tbl_maytinhbang";}}}
								if (!$conn3){
											echo 'Kết nối không thành công'.mysqli_connect_error();
										} 
								else{
									if($Con==0){
										$query3 = "SELECT * FROM $table ";
									}
									else{
										$query3 = "SELECT * FROM $table WHERE loaimay='"."$Con"."' ";
									}
									$result3 = mysqli_query($conn3,$query3);
									if(mysqli_num_rows($result3)>0){
										while ($row3=mysqli_fetch_assoc($result3)){
											
											echo '<div class="product">';
											echo '	<div class="product-img" >';
											echo '		<a href="'.$row3["linksp"].'">';
											echo '			<div class="product-img-chitiet">';
											echo '				<img src="'.$row3["linkanh"].'" class="product-img-chitiet-img">';
											echo '			</div>';
											echo '		</a>';
											
											echo '	</div>';

											echo '	<div class="product-thongtin">';
											echo '		<div><a href="'.$row3["linksp"].'" class="product-thongtin-ten">'.$row3["tenmay"].'</a></div>';
											if($row3["giacu"] == $row3["giamoi"]){
											    	echo '<div class="product-thongtin-gia-cu">'.$row3["giamoi"].' đ</div>';}
											else{
											    	echo '<div class="product-thongtin-gia-cu">'.$row3["giacu"].' đ</div>';
											    	echo '<div class="product-thongtin-gia-moi">'.$row3["giamoi"].' đ</div>';}
													echo '<div class="product-thongtin-daban">Đã bán:'.$row3["daban"].'</div>';
											echo '	</div>';
											echo '<br>';
					                        echo '<br>';
					                        echo '<br>';
					                        echo '<form action="addToCart.php" method="post">
					                                <input type="hidden" name="id" value="' . $row3["id"] . '">'; // Input ẩn chứa ID của sản phẩm
					                        echo '  <input type="hidden" name="tenmay" value="' . $row3["tenmay"] . '">'; // Input ẩn chứa tên của sản phẩm
					                        echo '  <input type="hidden" name="giamoi" value="' . $row3["giamoi"] . '">'; // Input ẩn chứa giá mới của sản phẩm
					                        echo '  <button type="submit" name="addToCart" onclick="alert(\'Thêm vào giỏ hàng thành công!\')">Thêm vào giỏ hàng</button>'; // Nút submit để thêm sản phẩm vào giỏ hàng
					                        echo '</form>';
											echo '		<div class="product-img-tragop_giam">';
											if($row3["tragop"]>=0){
												echo '		<div class="product-img-tragop">Trả góp '.$row3["tragop"].'%</div>';}
											if($row3["giacu"]-$row3["giamoi"]>0){
												echo '		<div class="product-img-giam">Giảm '.$row3["giacu"]-$row3["giamoi"].' đ</div>';
											}
											echo '		</div>';
											echo '</div>';
										}
									}
								}
								mysqli_close($conn3);
							}
						?> 
					</div>
	

					<!--
					<div class="product-tong">
							<?php 
								$Cha = $_GET['cha'];
								$Con = $_GET['con'];
								$conn3 = mysqli_connect('localhost','root','','product');
								if($Cha == -2){$table = "tbl_product";}
								else{if($Cha == -3){$table = "tbl_laptop";}
								else{if($Cha == -4){$table = "tbl_maytinhbang";}}}
								
								if (!$conn3){
											echo 'Kết nối không thành công'.mysqli_connect_error();
										} 
								else{
									$query3 = "SELECT * FROM $table ";
									$result3 = mysqli_query($conn3,$query3);
									if(mysqli_num_rows($result3)>0){
										while ($row3=mysqli_fetch_assoc($result3)){
											
											echo '<div class="product">';
											echo '	<div class="product-img" >';
											echo '		<a href="'.$row3["linksp"].'">';
											echo '			<div class="product-img-chitiet">';
											echo '				<img src="'.$row3["linkanh"].'" class="product-img-chitiet-img">';
											echo '			</div>';
											echo '		</a>';
											
											echo '	</div>';

											echo '	<div class="product-thongtin">';
											echo '		<div><a href="'.$row3["linksp"].'" class="product-thongtin-ten">'.$row3["tenmay"].'</a></div>';
											if($row3["giacu"] == $row3["giamoi"]){
											    	echo '<div class="product-thongtin-gia-cu">'.$row3["giamoi"].' đ</div>';}
											else{
											    	echo '<div class="product-thongtin-gia-cu">'.$row3["giacu"].' đ</div>';
											    	echo '<div class="product-thongtin-gia-moi">'.$row3["giamoi"].' đ</div>';}
													echo '<div class="product-thongtin-daban">Đã bán:'.$row3["daban"].'</div>';
											echo '	</div>';
											echo '<br>';
					                        echo '<br>';
					                        echo '<br>';
					                        echo '<form action="addToCart.php" method="post">
					                                <input type="hidden" name="id" value="' . $row3["id"] . '">'; // Input ẩn chứa ID của sản phẩm
					                        echo '  <input type="hidden" name="tenmay" value="' . $row3["tenmay"] . '">'; // Input ẩn chứa tên của sản phẩm
					                        echo '  <input type="hidden" name="giamoi" value="' . $row3["giamoi"] . '">'; // Input ẩn chứa giá mới của sản phẩm
					                        echo '  <button type="submit" name="addToCart" onclick="alert(\'Thêm vào giỏ hàng thành công!\')">Thêm vào giỏ hàng</button>'; // Nút submit để thêm sản phẩm vào giỏ hàng
					                        echo '</form>';
											echo '		<div class="product-img-tragop_giam">';
											if($row3["tragop"]>=0){
												echo '		<div class="product-img-tragop">Trả góp '.$row3["tragop"].'%</div>';}
											if($row3["giacu"]-$row3["giamoi"]>0){
												echo '		<div class="product-img-giam">Giảm '.$row3["giacu"]-$row3["giamoi"].' đ</div>';
											}
											echo '		</div>';
											echo '</div>';
										}
									}
								}
								mysqli_close($conn3);
							 ?>
					</div>
					-->

				</div>
			<?php } ?>
		</div>
	</div>
	
 
	












</div>
</body>
</html>