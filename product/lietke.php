<?php
include("../connection.php");
$sql_show_prd = "SELECT * from products";
$query_show_prd = mysqli_query($mysqli,$sql_show_prd);


?>


<html lang="en">
<head>
<link rel="stylesheet" href="../style2.css">
</head>
<body>
        <p>Danh sách sản phẩm</p>  
    
        <table >
            <tr>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh sản phẩm </th>
                <th>Giá sản phẩm </th>
                <th>Số lượng</th>
                <th>Brand</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
                while($row = mysqli_fetch_assoc($query_show_prd)){ ?>
                    <form method="POST" action="sua.php?prd_id=<?php echo $row['prd_id']?>">
                        <tr>
                        <td><?php echo $i++; ?></td>
                        <td><input type="text" name="ten_sp" value="<?php echo $row['prd_name'] ?>"></td>
                        <td>
                            <img src="../img/<?php echo $row['img']?>" width="80px">
                            <input type="file" name="file-img">
                        </td>
                        <td><input type="text" name = "gia_sp"value="<?php echo $row['price'] ?> "></td>
                        <td><input type="text" name ="soluong_sp" value="<?php echo $row['quantity'] ?> "> </td>
                        <td><input type="text" name="brand_name" value="<?php echo $row['brand_name'] ?> "> </td>
                        <td>
                        <input type="hidden" value="<?php echo $row['prd_id']?>">
                        <button name="sua">Sửa</button></td>
                        <td>
                        <button><a style="text-decoration: none; color: black" href="xoa.php?prd_id=<?php echo $row['prd_id'] ?>">Xóa</button>
                        </td>
                        </tr>
                    </form>
                        
                <?php
                }
            ?> 
        </tbody>
    </table>
</div>
</div>


</div>
</body>