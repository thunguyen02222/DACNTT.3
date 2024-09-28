<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="sssp2.css">
	<title></title>
	<style type="text/css">
		.Xoa{
			text-decoration: none;
		    font-size: 1.5rem;
		    color: white;
		    font-weight: bold;
		}
		.mau-xoa{
			background-color: red;
		    position: relative;
		    left: 1px;
		    bottom: 362px;
		    border-radius: 5px;
		}
		.product-right-buy-botton{
			width: 75%;
			margin-bottom: 10px;
			margin-left: 37px;
		}
		.product-left-img-chitiet{
			height: 47%;
		}
	</style>
</head>
<body>


	<div class="menu1">
		<div class="menu1-logofptshop">
			<a href="trangchu.php"><img src="https://upload.wikimedia.org/wikipedia/commons/1/1b/Logo-FPT-Shop-Black.png" class="menu1-logofptshopimg"></a>
		</div>
		<div class="menu1-Dangnhap">
			
		</div>
	</div>
	<div style="text-align: center; background-color: black;color: white;padding: 18px;font-size: 2rem;font-family: sans-serif;font-weight: bold;">
		SO SÁNH SẢN PHẨM
	</div>

		<div class="product-tong-can" align="center">
			<div class="product-tong">
					<?php
					    //ket noi CSDL

					    $conn = mysqli_connect('localhost','root','','sosanh');
					    // Lấy giá trị tham số cha từ URL
					    $Cha = $_GET['cha'];
					    // Xác định bảng sản phẩm cần hiển thị dựa trên giá trị tham số cha
					    if($Cha == -2){$table = "tbl_product";}
					    else{if($Cha == -3){$table = "tbl_laptop";}
					    else{if($Cha == -4){$table = "tbl_maytinhbang";}}}
					    if (!$conn){
					      echo 'Kết nối không thành công'.mysqli_connect_error();
					    } 
					else{

						$query = "SELECT * FROM $table ";
						$result = mysqli_query($conn,$query);
						if(mysqli_num_rows($result)>0){
							while ($row3=mysqli_fetch_assoc($result)){

								echo '<div class="product">';
								echo '	<div class="product-left">';
								echo '		<h1 class="product-title">'.$row3["tenmay"].'</h1>';
								echo '		<div class="product-left-img">';
											
								echo '			<img src="'.$row3["linkanh"].'" class="product-left-img-chitiet">';
								echo '			<div class="product-right-buy-gia">';
								echo '				<div class="product-right-buy-gia-moi">'.$row3["giamoi"].' đ</div>';
								echo '				<div class="product-right-buy-gia-cu">'.$row3["giacu"].' đ</div>';
								echo '			</div>';
								echo '			<div class="product-right-buy-submit">';
								echo '				<button class="product-right-buy-botton" >MUA HÀNG</button>';
								echo '				<button class="mau-xoa"><a class="Xoa" href="xoasosanhsanpham.php?cha='.$Cha.'&id='.$row3["id"].'">X</a></button> ';
								echo '			</div>';
								
											
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
								

								echo '		</div>';
								echo '	</div>';
								echo '</div>';
							

							}
						}
						
							
							
						}
						
						
					
				?>

			</div>
</body>
</html>