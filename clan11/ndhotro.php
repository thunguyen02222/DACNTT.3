<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>FPT trợ giúp</title>
  <style type="text/css">
   footer {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

    .menu1{
  display: block;
  background-color: red;
  text-align: center;
  margin-top: 5%;
  color: white;
  padding: 80px ;
}

.menu1-Search{
  display: flex;
  text-align: center;
  margin: auto 10px;
  width: 300px;
    position: relative;
    left: 30%;
    transform: translateX(-30%);
    color: gray;
}

.menu1-Search-txt{
    height: 3.5rem;
    width: 43rem;
    margin-right: 12px;
    font-size: 140%;
}
.menu1-Search-btn{
     background-color: black;
    margin-left: -11px;
    position: absolute;
    height: 100%;
    width: 40%;
}
.menu1-Search-btn-img{
      width: 25px;
      margin: 1px 1px;
      margin-top: 2px;
}
.tttg{
    position: fixed;
    color: orange;
    position: fixed;
    margin-top: 45px;
    margin-left: 300px;
}
.menu1-logofptshopimg{
    position: fixed;
}


.ngang1{

    position: fixed; 
    display: flex;
    align-items: center;
    top: 22px;
    left: 131px;
}
.menu1-logofptshopimg{

    width: 244px;
    margin-left:30px ;
    margin-top: -70px;
}


.boxnoidung{
    display: inline-block;
    max-width: 1000px;
    position: relative;
    left: 30%;
    transform: translateX(-35%);
}
.faq-list-div{
    border: solid 2px gray;
    padding: 10px;
}
.faq-list-a{
    text-decoration: none;

}
.tieudemenu{
   font-size: 40px;
}
h1{

    text-align: center;
    font-weight: 450;
    font-family:system-ui;
}
.linkhotro
{

    width: 20%;
}
.noidung-tongcan{
    display: flex;
    margin-top: 30px;
}

  </style>
  
</head>
<body>
        
<div class="ngang1">
        <div class="logofpt">
                 <a href="trangchu.php"><img src="https://upload.wikimedia.org/wikipedia/commons/1/1b/Logo-FPT-Shop-Black.png" class="menu1-logofptshopimg"></a>
         </div>  
                 <div class="tttg"> |   Trung tâm trợ giúp FPT </div>
        </div>

    <div class="menu1">
            <div tieudemenu>
            
                     <h1>Xin chào, FPT có thể giúp gì cho bạn ?</h1>
            </div>
        <div class="menu1-Search">
            <form method="GET">
            <input placeholder="Nhập từ khóa hoặc nội dung cần tìm" type="text" name="search" class="menu1-Search-txt">
            <button type="submit" class="menu1-Search-btn">
                <img src="https://png.pngtree.com/png-vector/20220706/ourlarge/pngtree-white-icon-of-a-magnifying-glass-or-loupe-vector-png-image_24988452.jpg" class="menu1-Search-btn-img">
            </button>
        </form>
        </div>
        <div class="menu1-Dangnhap">
            
        </div>
    </div>

    <div class="noidung-tongcan">
        <ul class="linkhotro" id="linkhotro">
            <?php  
                $conn1 = mysqli_connect('localhost','root','','hotro');
                if (!$conn1){
                    echo 'Kết nối không thành công'.mysqli_connect_error();
                }
                else{
                    if (isset($_GET['search']) && !empty($_GET['search'])) {
                        $search = $_GET['search'];
                        $search_term = '%' . $search . '%';
                        $query1 = "SELECT * FROM tbl_hotro WHERE tenhotro LIKE '$search_term' OR noidung LIKE '$search_term'";
                    } else {
                        $query1 = "SELECT * FROM tbl_hotro";
                    }

                    $result1 = mysqli_query($conn1,$query1);
                    if(mysqli_num_rows($result1) > 0){
                        while ($row1 = mysqli_fetch_assoc($result1)){
                            echo '<div class="faq-list-div"><a href="'.$row1['linkhotro'].'" class="faq-list-a">'.$row1['tenhotro'].'</a></div><br>';
                        }
                    } else {
                        echo '<div class="faq-list-div">Không tìm thấy kết quả phù hợp.</div><br>';
                    }
                }
            ?>

        </ul>



        <div class="boxnoidung">
            <?php  
                $Id = $_GET['id'];
                $conn1 = mysqli_connect('localhost','root','','hotro');
                if (!$conn1){
                    echo 'Kết nối không thành công'.mysqli_connect_error();
                }
                else{
                    $query1 = "SELECT * FROM tbl_hotro WHERE id = '"."$Id"."' ";
                    $result1 = mysqli_query($conn1,$query1);
                    if(mysqli_num_rows($result1)>0){
                        while ($row1=mysqli_fetch_assoc($result1)){
                            echo '<div class="tieudend">'.$row1['tenhotro'].'</div>';
                            echo '<div class="chitietnd">'.$row1['noidung'].'</div>';
                        }
                    }
                }
            ?>
        </div>
    </div>    
        
        
    
<footer>
    <p>&copy; 2024 Hỗ trợ khách hàng. Bản quyền thuộc về FPT Polytechnic</p>
</footer>

</body>
</html>
