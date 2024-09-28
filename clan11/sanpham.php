<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="sanpham.css">
	<title></title>
	<style type="text/css">
		.btn_sosanh_tong{
			display: flex;
			margin-top: 27px;
		}
		.sosanhsp_bangsosanh{
			margin-left: 10px;
		}
	</style>
</head>
<body>


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
									        <button class="dropbtn"><a href="'.$row1['linkmenu'].'" class="menu-text"">'.$row1['name'].'</a></button>
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
	?>





	
	<div  style="background-color: #f8f9fa;">	
		<div class="product-tong-can" align="center">
			<div class="product-tong">
				<?php  
					$Cha = $_GET['cha'];
					$Id = $_GET['id'];
					$conn3 = mysqli_connect('localhost','root','','product');
					if($Cha == -2){$table = "tbl_product";}
					else{if($Cha == -3){$table = "tbl_laptop";}
					else{if($Cha == -4){$table = "tbl_maytinhbang";}}}
					if (!$conn3){
								echo 'Kết nối không thành công'.mysqli_connect_error();
							} 
					else{
						$query3 = "SELECT * FROM $table WHERE id = '"."$Id"."' ";
						$result3 = mysqli_query($conn3,$query3);
						if(mysqli_num_rows($result3)>0){
							while ($row3=mysqli_fetch_assoc($result3)){
								echo '<form action="addToCart.php" method="post">';
									echo '<div class="product">';
									echo '	<div class="product-left">';
									echo '		<h1 class="product-title">'.$row3["tenmay"].'</h1>';
									echo '		<div class="product-left-img">';
												
									echo '			<img src="'.$row3["linkanh"].'" class="product-left-img-chitiet">';
												
									echo '		</div>';
									echo '	</div>	';

									echo '	<div class="product-right">';
									echo '		<h1 class="product-title">THÔNG TIN SẢN PHẨM</h1>';
									echo '		<div class="product-right-thongtin">';
									echo '			<br>';
									if($Cha == -3){
										echo '			<div class="product-right-thongtin-chitiet">Đồ họa: '.$row3["dohoa"].'</div>';
										echo '			<div class="product-right-thongtin-chitiet">Màn hình: '.$row3["manhinh"].'</div>';
										echo '			<div class="product-right-thongtin-chitiet">CPU: '.$row3["cpu"].'</div>';
										echo '			<div class="product-right-thongtin-chitiet">RAM: '.$row3["ram"].'</div>';
										echo '			<div class="product-right-thongtin-chitiet">Ổ cứng: '.$row3["ocung"].'</div>';
									}
									else {
										echo '			<div class="product-right-thongtin-chitiet">Màn hình: '.$row3["manhinh"].'</div>';
										echo '			<div class="product-right-thongtin-chitiet">Camera sau: '.$row3["camerasau"].'</div>';
										echo '			<div class="product-right-thongtin-chitiet">Camera Selfie: '.$row3["cameraselfie"].'</div>';
										echo '			<div class="product-right-thongtin-chitiet">CPU: '.$row3["cpu"].'</div>';
										echo '			<div class="product-right-thongtin-chitiet">Bộ nhớ trong: '.$row3["bonhotrong"].'</div>';
									}
									echo '			<br>';
									echo '		</div>';
									echo '		<div class="product-right-buy">';
									echo '			<div class="product-right-buy-gia">';
									echo '				<div class="product-right-buy-gia-moi">'.$row3["giamoi"].' đ</div>';
									echo '				<div class="product-right-buy-gia-cu">'.$row3["giacu"].' đ</div>';
									echo '			</div>';
									echo '			<div class="product-right-buy-submit">';
									echo '				<input type="hidden" name="id" value="' . $row3["id"] . '">';
									echo '				<input type="hidden" name="tenmay" value="' . $row3["tenmay"] . '">';
									echo '				<input type="hidden" name="giamoi" value="' . $row3["giamoi"] . '">';
									echo '				<button class="product-right-buy-botton" type="submit" name="addToCart" onclick="alert(\'Thêm vào giỏ hàng thành công!\')">MUA HÀNG</button>';
									echo '			</div>';
									echo '		</div>';
									echo '	</div>';
									echo '</div>';
								echo '</form>';
							}
						}
						$query4 = "SELECT * FROM $table GROUP BY daban DESC LIMIT 5 ";
						$result4 = mysqli_query($conn3,$query4);
						echo '<div class="goiy">';
						echo '	<div class="goiy-title">SẢN PHẨM HOT</div>';
						echo '	<div class="product-goiy-can">';
						
						if(mysqli_num_rows($result4)>0){
							while ($row4=mysqli_fetch_assoc($result4)){
								echo '		<div class="product-goiy">';
								echo '			<div class="product-goiy-img">';
								echo '				<a href="'.$row4["linksp"].'">';
								echo '				<img src="'.$row4["linkanh"].'" class="product-goiy-img-chitiet">';
								echo '				</a>';
								echo '			</div>';
								echo '			<div class="product-goiy-thongtin">';
								echo '				<div class="product-goiy-thongtin-ten"><a  class="product-goiy-thongtin-ten-a" href="'.$row4["linksp"].'" >'.$row4["tenmay"].'</a></div>';
								echo '				<div class="product-goiy-thongtin-gia">Giá: '.$row4["giamoi"].'</div>';
								echo '			</div>';
								echo '		</div>';
								
							}
						}
						
						echo '	</div>';
						echo '</div>';
					}
				?>

			</div>
			<!--So sánh-->
			<div class="btn_sosanh_tong">
				<form method="POST">
					<div class="sosanhsp_sosanh">
							<button name="btn_themsosanh">⊕ So sánh</button>
					</div>
				</form>
				<form method="POST" action="ss.php?cha=<?php $Cha = $_GET['cha']; echo urlencode($Cha); ?>">
					<div class="sosanhsp_bangsosanh">		
							<button name="btn_bangsosanh">Bảng so sánh</button>
					</div>		
				</form>
			</div>
			<?php  
				if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btn_themsosanh'])){
					$Cha = $_GET['cha'];
					$Id = $_GET['id'];
					$conn3 = mysqli_connect('localhost','root','','product');
					if($Cha == -2){$table = "tbl_product";}
					else{if($Cha == -3){$table = "tbl_laptop";}
					else{if($Cha == -4){$table = "tbl_maytinhbang";}}}
					if (!$conn3){
								echo 'Kết nối không thành công'.mysqli_connect_error();
							} 
					else{
						if($Cha == -2 || $Cha == -4){
							$query3 = "SELECT * FROM $table WHERE id = '"."$Id"."' ";
							$result3 = mysqli_query($conn3,$query3);
							while ($row3=mysqli_fetch_assoc($result3)){
								$Loaisanpham = $row3["loaimay"];
		                        $Tensp = $row3["tenmay"];
		                        $Gia = $row3["giamoi"];
		                        $Giacu=$row3["giacu"];
		                        $Linkanh = $row3["linkanh"];
		                        $Manhinh = $row3["manhinh"];
		                        $Camsau = $row3["camerasau"];
		                        $Camtruoc = $row3["cameraselfie"];
		                        $CPU = $row3["cpu"];
		                        $ROM = $row3["bonhotrong"];
		                        $Daban = $row3["daban"];
							}
							$conn4 = mysqli_connect('localhost','root','','sosanh');
							$query4 = "SELECT * FROM $table";
							$result4 = mysqli_query($conn4,$query4);
							$Idss = 1;
							while ($row4=mysqli_fetch_assoc($result4)){
								if($Idss == $row4["id"]){
									$Idss = $Idss + 1;
								}
								else{break;}
							}
							$query5 = "INSERT INTO $table VALUES('".$Idss."','".$Loaisanpham."','".$Tensp."','".$Gia."','".$Linkanh."','".$Manhinh."','".$Camsau."','".$Camtruoc."','".$CPU."','".$ROM."','".$Daban."','".$Giacu."')";
							$result5 = mysqli_query($conn4,$query5);
							if ($result5 > 0){
		                        echo '<div class="select">Đã thêm</div>';
		                    }
		                    else{
		                        echo '<div class="error">Lỗi: </div>'.mysqli_error($conn4);
		                    }
						}

						else{
							$query3 = "SELECT * FROM $table WHERE id = '"."$Id"."' ";
							$result3 = mysqli_query($conn3,$query3);
							while ($row3=mysqli_fetch_assoc($result3)){
								$Loaisanpham = $row3["loaimay"];
		                        $Tensp = $row3["tenmay"];
		                        $Gia = $row3["giamoi"];
		                        $Giacu=$row3["giacu"];
		                        $Linkanh = $row3["linkanh"];
		                        $Dohoa = $row3["dohoa"];
		                        $Manhinh = $row3["manhinh"];
		                        $CPU = $row3["cpu"];
		                        $RAM = $row3["ram"];
		                        $Ocung = $row3["ocung"];
		                        $Daban = $row3["daban"];
							}
							$conn4 = mysqli_connect('localhost','root','','sosanh');
							$query4 = "SELECT * FROM $table";
							$result4 = mysqli_query($conn4,$query4);
							$Idss = 1;
							while ($row4=mysqli_fetch_assoc($result4)){
								if($Idss == $row4["id"]){
									$Idss = $Idss + 1;
								}
								else{break;}
							}
							$query5 = "INSERT INTO $table VALUES('".$Idss."','".$Loaisanpham."','".$Tensp."','".$Gia."','".$Linkanh."','".$Dohoa."','".$Manhinh."','".$CPU."','".$RAM."','".$Ocung."','".$Daban."','".$Giacu."')";
							$result5 = mysqli_query($conn4,$query5);
							if ($result5 > 0){
		                        echo '<div class="select">Thêm dữ liệu thành công</div>';
		                    }
		                    else{
		                        echo '<div class="error">Lỗi: </div>'.mysqli_error($conn4);
		                    }
						}	
					}

				}
			?>
		</div>

		
		<!--
		<div class="product-tong-can" align="center">
			<div class="product-tong">

								<div class="product">
									<div class="product-left">
										<h1 class="product-title">SẢN PHẨM</h1>
										<div class="product-left-img">
											
											<img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/10/30/638342502751589917_ip-15-pro-max-dd-bh-2-nam.jpg" class="product-left-img-chitiet">
											
										</div>
									</div>	

									<div class="product-right">
										<h1 class="product-title">THÔNG TIN SẢN PHẨM</h1>
										<div class="product-right-thongtin">
											<br>
											<div class="product-right-thongtin-chitiet">Màn hình: </div>
											<div class="product-right-thongtin-chitiet">Camera sau: </div>
											<div class="product-right-thongtin-chitiet">Camera Selfie: </div>
											<div class="product-right-thongtin-chitiet">CPU: </div>
											<div class="product-right-thongtin-chitiet">Bộ nhớ trong: </div>
											<br>
										</div>
										<div class="product-right-buy">
											<div class="product-right-buy-gia">
												<div class="product-right-buy-gia-moi">12 đ</div>
												<div class="product-right-buy-gia-cu">12 đ</div>
											</div>
											<div class="product-right-buy-submit">
												<button class="product-right-buy-botton">MUA HÀNG</button>
											</div>
										</div>
									</div>
								</div>

								<div class="goiy">
									<div class="goiy-title">SẢN PHẨM HOT</div>
									<div class="product-goiy">
										<div class="product-goiy-img">
											<a href="#">
											<img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/10/30/638342502751589917_ip-15-pro-max-dd-bh-2-nam.jpg" class="product-goiy-img-chitiet">
											</a>
										</div>
										<div class="product-goiy-thongtin">
											<div class="product-goiy-thongtin-ten"><a style="text-decoration: none;color: #383838;" href="#" >SẢN PHẨM</a></div>
											<div class="product-goiy-thongtin-gia">GIÁ</div>
										</div>
									</div>
								</div>
		</div>
	</div>
	-->
	











</div>
</body>
</html>