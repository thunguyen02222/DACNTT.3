<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="hotrocss.css">
    <title>FPT Trợ Giúp</title>
</head>
<body>
        
<div class="ngang1">
    <div class="logofpt">
        <a href="trangchu.php"><img src="https://upload.wikimedia.org/wikipedia/commons/1/1b/Logo-FPT-Shop-Black.png" class="menu1-logofptshopimg"></a>
    </div>  
    <div class="tttg"> | Trung tâm trợ giúp FPT </div>
</div>

<div class="menu1">
    <div tieudemenu>
        <h1 >Xin chào, FPT có thể giúp gì cho bạn ? </h1>
    </div>
    <div class="menu1-Search" align="center">
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

<div class="linknoidung">
    <ul class="faq-list" id="faqList">
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
</div>

<footer>
    <p>&copy; 2024 Hỗ trợ khách hàng. Bản quyền thuộc về...</p>
</footer>

</body>
</html>
