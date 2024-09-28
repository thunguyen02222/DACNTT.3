<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xóa So Sánh</title>
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
                    <b>---Xóa dữ liệu bảng so sánh---</b>
            </h3>
            <?php
                $Cha = $_GET['cha'];
                $Id = $_GET['id'];
			    if($Cha == -2){$table = "tbl_product";}
			    else{if($Cha == -3){$table = "tbl_laptop";}
			    else{if($Cha == -4){$table = "tbl_maytinhbang";}}}
			    $conn = mysqli_connect('localhost','root','','sosanh');
			    if (!$conn){
			      echo 'Kết nối không thành công'.mysqli_connect_error();
			    }
			    else{
			    	if($Cha == -2 || $Cha == -4){
			    		$query = "DELETE FROM $table WHERE id='".$Id."'";
	                    $result = mysqli_query($conn,$query);
	                    if ($result > 0){
	                        echo '<div class="delete">Xóa dữ liệu thành công</div>';
	                    }
	                    else{
	                        echo 'Lỗi: '.mysqli_error($conn);
	                    }
			    	}
	                else{
	                	$query = "DELETE FROM $table WHERE id='".$Id."'";
	                    $result = mysqli_query($conn,$query);
	                    if ($result > 0){
	                        echo '<div class="delete">Xóa dữ liệu thành công</div>';
	                    }
	                    else{
	                        echo 'Lỗi: '.mysqli_error($conn);
	                    }
	                }    
                }
                mysqli_close($conn);
            ?>
            <br>
            <div align="right"> <button> <a href="ss.php?cha=<?php $Cha = $_GET['cha']; echo urlencode($Cha); ?>" style="text-decoration: none;color: black;">Quay lại</a></button></button></div>
        </div>

        <div class="Phai"></div>
    </div>
            
</body>
</html>