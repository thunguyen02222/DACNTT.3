<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="menu_admincss.css">
	<title>CSDL Laptop</title>
	<style type="text/css">
		table,tr,td,th{
			border: solid 1px black;
			border-spacing: 0px;
		}
		th{
			border-bottom: solid 5px black;
			background-color: cyan;
			font-weight: bold;
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
			grid-template-columns: 10% 80% auto;
		}
		.Thaydoi{
			display: grid;
			grid-template-columns: 50% auto;
		}
		.Sua,.Xoa{
			text-decoration: none;
			text-align: center;
			color: black;

		}
		.mau-sua{
			background-color: orange;
			border-radius: 12px;
			font-weight: bold;
		}
		.mau-xoa{
			background-color: red;
			border-radius: 12px;
			font-weight: bold;
		}
		.error{
			border: solid 5px black;
			border-radius: 5px;
			background-color: red;
			color: white;
			text-align: center;
			font-size: 2rem;
			padding: 10px auto;
			width: 100%;
		}
		.them{
			background-color: green;
			border-radius: 12px;

		}
		.anhmay{
			width: 70px;
		}
	</style>
	
</head>
<body>

	<div class="menu1">
		<div class="menu1-logofptshop">
			<img src="\73DCTD22\img\Logo fptshop.png" class="menu1-logofptshopimg">
		</div>
		<div class="menu1-Search">
			<form method="POST">
				<div class="Seacrh" align="right">
					<input placeholder="Nhập từ  khóa" type="text" name="txtSearch" class="menu1-Search-txt">
					<button type="submit" name="btnSearch" id="btnSearch" class="menu1-Search-btn" style="position: relative;top: 8px;">
						<img src="\73DCTD22\img\Search img-01.png" class="menu1-Search-btn-img">
					</button>
				</div>
			</form>
		</div>
		<div class="menu1-Dangnhap">
			
		</div>
	</div>
	<div class="menu">
        <div class="border">
	        <div class="dropdown">
	            <button class="dropbtn">
	                <a href="trangchu_admin.php" class="menu-text">TRANG CHỦ</a>
	            </button>
	        </div>
	        <div class="dropdown">
	            <button class="dropbtn">
	                <a href="CSDLdienthoai.php" class="menu-text">ĐIỆN THOẠI</a>
	            </button>
	        </div>
	        <div class="dropdown" style="background-color: #008e8e;">
	            <button class="dropbtn" style="background-color: #008e8e;">
	                <a href="CSDLlaptop.php" class="menu-text">LAPTOP</a>
	            </button>
	        </div>
	        <div class="dropdown">
	            <button class="dropbtn">
	                <a href="CSDLmaytinhbang.php" class="menu-text">MÁY TÍNH BẢNG</a>
	            </button>
	        </div>
	    </div>
	</div>


	
	<div class="Luoi50-50">
		<div class="Trai">

		</div>
		<div class="Giua">
			
			<br>
			

			<?php
				//ket noi CSDL
				$conn = mysqli_connect('localhost','root','','product');

				if (!$conn){
					echo 'Kết nối không thành công'.mysqli_connect_error();
				}
				else{
					$STT=1;
					$query = "SELECT * FROM tbl_laptop";
					$result = mysqli_query($conn,$query);
					if(mysqli_num_rows($result)>0){
						echo '<table id="tblMain" >
							  <thead>
							  	<th>STT</th>
								<th>Loại sản phẩm</th>
								<th>Tên sản phẩm</th>
								<th>Giá cũ</th>
								<th>Giá mới</th>
								<th>Hình ảnh</th>
								<th>Đồ họa</th>
								<th>Màn hình</th>
								<th>CPU</th>
								<th>RAM</th>
								<th>Ổ cứng</th>
								<th>Trả góp</th>
								<th>Đã bán</th>
								<th>Thay đổi</th>
							</thead>
							<tbody>';
						
								
							
						while ($row=mysqli_fetch_assoc($result)){
							echo '<tr>';
							echo '<td>'.$STT.'</td>';
							echo '<td>';
								if($row['loaimay']==1){echo 'Macbook';}
								else{if($row['loaimay']==2){echo 'Lenovo';}
								else{if($row['loaimay']==3){echo 'Dell';}
								else{if($row['loaimay']==4){echo 'Asus';}
								else{if($row['loaimay']==5){echo 'MSI';}}}}}
							echo '</td>';
							echo '<td>'.$row['tenmay'].'</td>';
							echo '<td>'.$row['giacu'].'</td>';
							echo '<td>'.$row['giamoi'].'</td>';
							echo '<td><img src="'.$row['linkanh'].'" class="anhmay"></td>';
							echo '<td>'.$row['dohoa'].'</td>';
							echo '<td>'.$row['manhinh'].'</td>';
							echo '<td>'.$row['cpu'].'</td>';
							echo '<td>'.$row['ram'].'</td>';
							echo '<td>'.$row['ocung'].'</td>';
							echo '<td>'.$row['tragop'].'</td>';
							echo '<td>'.$row['daban'].'</td>';

							echo '<td class="Thaydoi"> <button class="mau-sua"><a class="Sua" href="sualaptop.php?id='.$row["id"].'">Sửa</a></button>
									  <button class="mau-xoa"><a class="Xoa" href="xoalaptop.php?id='.$row["id"].'">Xóa</a></button> </td>';
							echo '</tr>';
							$STT = $STT + 1;
						}
						echo '</tbody>
						</table>';
					}
					else{
						echo 'Không có dữ liệu';
					}
				}
				mysqli_close($conn);
			?>
			
			<!-- Tìm kiếm -->
			<?php
				if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnSearch'])){
					$MaSVSearch = $_POST['txtSearch'];
					$conn2 = mysqli_connect('localhost','root','','product');

				if (!$conn2){
					echo 'Kết nối không thành công'.mysqli_connect_error();
				}
				else{
					$STT2=1;
					$query2 = "SELECT * FROM tbl_laptop WHERE tenmay LIKE N'%".$MaSVSearch."%'";
					$result2 = mysqli_query($conn2,$query2);
					if(mysqli_num_rows($result2)>0){
						echo '<script type="text/javascript">
								  var x = document.getElementById("tblMain");
								  x.style.display = "none";
								  </script>';
						echo '<table>
							  <thead>
								<th>STT</th>
								<th>Loại sản phẩm</th>
								<th>Tên sản phẩm</th>
								<th>Giá cũ</th>
								<th>Giá mới</th>
								<th>Hình ảnh</th>
								<th>Đồ họa</th>
								<th>Màn hình</th>
								<th>CPU</th>
								<th>RAM</th>
								<th>Ổ cứng</th>
								<th>Trả góp</th>
								<th>Đã bán</th>
								<th>Thay đổi</th>
							</thead>
							<tbody>';
						
								
							
						while ($row2=mysqli_fetch_assoc($result2)){
							echo '<tr>';
							echo '<td>'.$STT2.'</td>';
							echo '<td>';
								if($row['loaimay']=1){echo 'Macbook';}
								else{if($row2['loaimay']=2){echo 'Lenovo';}
								else{if($row2['loaimay']=3){echo 'Dell';}
								else{if($row2['loaimay']=4){echo 'Asus';}
								else{if($row2['loaimay']=5){echo 'MSI';}}}}}
							echo '</td>';
							echo '<td>'.$row2['tenmay'].'</td>';
							echo '<td>'.$row2['giacu'].'</td>';
							echo '<td>'.$row2['giamoi'].'</td>';
							echo '<td><img src="'.$row2['linkanh'].'" class="anhmay"></td>';
							echo '<td>'.$row2['dohoa'].'</td>';
							echo '<td>'.$row2['manhinh'].'</td>';
							echo '<td>'.$row2['cpu'].'</td>';
							echo '<td>'.$row2['ram'].'</td>';
							echo '<td>'.$row2['ocung'].'</td>';
							echo '<td>'.$row2['tragop'].'</td>';
							echo '<td>'.$row2['daban'].'</td>';

							echo '<td class="Thaydoi"> <button class="mau-sua"><a class="Sua" href="sualaptop.php?id='.$row2["id"].'">Sửa</a></button>
									  <button class="mau-xoa"><a class="Xoa" href="xoalaptop.php?id='.$row2["id"].'">Xóa</a></button> </td>';
							echo '</tr>';
							$STT2 = $STT2 + 1;
						}
						echo '</tbody>
						</table>';
					}
					else{
						echo '<script type="text/javascript">
								  var x = document.getElementById("tblMain");
								  x.style.display = "none";
								  </script>';
						echo '<div class="error">Không có dữ liệu</div>';
					}
				}
				mysqli_close($conn2);
				}
			?>

			<br>
		<div align="right"><button align="right" class="them"><a href="themlaptop.php" style="text-decoration: none;color: black; font-weight: bold; ">Thêm dữ liệu</a></button></div>
		</div>
		<div class="Phai">
		
		</div>
	</div>

	
</body>
</html>