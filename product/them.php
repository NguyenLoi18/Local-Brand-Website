<?php
include("../connection.php");
?>
<a href="../admin.php">ADMIN's PAGE</a>
<p>Thêm sản phẩm</p>
<table >
 <form method="POST" action="xuly.php" enctype="multipart/form-data">

    <tr>
        <td>Tên sản phẩm</td>
        <td><input type="text" name="prd_name"></td>
        
    </tr>
    <tr>
        <td>Ảnh sản phẩm</td>
        <td><input type="file" name="img"></td>
        
    </tr>
    <tr>
        <td>Giá sản phẩm</td>
        <td><input type="text" name="price"></td>
        
    </tr>
    <tr>
        <td>Số lượng</td>
        <td><input type="text" name="quantity"></td>
        
    </tr>
    

    <tr>
        <td>Brand</td>
        <td>
            <select name="brand">
                <?php
                    $sql_brand = "SELECT * FROM brands ORDER BY brand_id ";
                    $query_brand = mysqli_query($mysqli,$sql_brand);
                    while($row_brand = mysqli_fetch_array($query_brand)){


                ?>

                <option value="<?php echo $row_brand['brand_name'] ?>"><?php echo $row_brand['brand_name'] ?></option>
                <?php
                    }
                ?>
            </select>
        </td>
    </tr>
    
    <tr >
        <td colspan="2"><input type="submit" name="them" value="Thêm sản phẩm"></td>
    </tr>
</form>
</table>