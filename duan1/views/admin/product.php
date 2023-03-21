<?php
session_start();
require_once "../../models/connect.php";
if (empty($_POST["search"])){
    $sanpham = "SELECT * FROM `products`";
}else{
    $search = $_POST["search"];
    $sanpham = "SELECT * FROM `products` WHERE `name` LIKE '%$search%'";
}
$list = getall($sanpham);
// $MK = $_SESSION["Ma_Khach_Hang"];
// $query = "SELECT * FROM `khach_hang` WHERE `Ma_Khach_Hang` = '$MK'";
// $userlist = getone($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="./css/style.css">
<style>
    .management-product .red {
        margin-left: 26px;
    }
    .search {
    border: none;
    width: 132px;
    height: 39px;
    background: #38A169;
    border-radius: 5px;
    font-family: 'Nunito', sans-serif;
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 19px;
    color: #FFFFFF;
}
.title input{
    margin-right: 0px;
}
</style>

<body>
    <div class="container">
        <div class="menu">
            <img src="../../image/image-1.png" alt="">
            <ul>
                <li><img src="../../image/Vector (4).png" alt=""><a href="./index.php">Trở về trang chủ</a></li>
                <li><img src="../../image/Vector (2).png" alt=""><a href="./product-managment.php">Quản lý Sản Phẩm </a></li>
                <li><img src="../../image/Vector (2).png" alt=""><a href="./product-type.php">Quản lý loại hàng</a></li>
                <li><img src="../../image/Vector (2).png" alt=""><a href="./user-managment.php">Quản lý user</a></li>
                <li><img src="../../image/Vector (1).png" alt=""><a href="./comment.php">Bình luận</a></li>
                <li><img src="../../image/Vector.png" alt=""><a href="">Thống kê</a></li>
            </ul>
        </div>
        <div class="content">
        <!-- <div class="welcome" style="margin-top: 20px; margin-bottom: 55px;">
                <p style="line-height:50px; margin-right: 15px">Xin chào <span><?php echo $userlist["Ma_Khach_Hang"] ?></span></p>
                <img src="../../image/images-user/<?php echo $userlist["Hinh"] ?>" alt="" width="50px" height="50px">
                <a href="../../controller/log-uot.php"><button style="height:30px; margin-left: 10px;margin-top: 10px; border: none; border-radius: 5px; background-color: tomato; color: white; ">Log out</button></a>
            </div> -->
            <div class="background-product" style="background-image: url(../../image/Rectangle\ 152\ \(1\).png);">
                <p>Quản lý Hàng hóa</p>
            </div>
            <div class="title">
                <h2>Danh sách sản phẩm</h2>
                <div class="text-search">
                    <form action="./product.php" method="POST" style="display: flex;">
                    <input style="border:1px solid black ; border-radius: 10px;" type="text" placeholder="Tìm sản phẩm" name="search">
                    <button style="background: transparent; width: 50px;height: 50px;"><svg style="width:20px ; color: #0066B2;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg></button>
                    </form>
                </div>
            </div>
            <a href="./add-product.php"><button class="search">Thêm mới hàng hóa</button></a>
            <div class="management-product">
                <table>
                    <thead>
                        <tr>
                            <th>Mã hàng hóa</th>
                            <th>Tên hàng hóa</th>
                            <th>Đơn giá</th>                      
                            <th>Hình ảnh</th>                          
                            <th>Mô tả</th>                          
                            <th>Mã loại</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $list) : ?>
                            <tr>
                                <td><?php echo $list["id_p"] ?></td>
                                <td><?php echo $list["name"] ?></td>
                                <td><?php echo $list["price"] ?></td>                            
                                <td><img height="100px" src="../../img/<?php echo $list["image"] ?>" alt=""></td>                             
                                <td><?php echo $list["describe"] ?></td>
                                <td>
                                    <?php
                                    $id = $list["id_type"];
                                    $loai = "SELECT * FROM `type` WHERE id_t = $id";
                                    $tenloai = getone($loai);
                                    echo $tenloai["name"];
                                    ?>
                                </td>
                                <td>
                                    <a href="./update-product.php?id=<?php echo $list['id_p'] ?>"><button class="blue">Cập nhật</button></a>
                                    <a href="../../controller/delete-product.php?id=<?php echo $list['id_p'] ?>" onclick="return confirm('Bạn có chắc muốn xóa')"><button class="red">Xóa</button></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>

</html>