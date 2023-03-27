<?php
    include("../connection.php");
    $sql_lietke_brand = "SELECT * FROM brands ";
    $query_lietke_brand = mysqli_query($mysqli,$sql_lietke_brand);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../style2.css">
</head>
<body>
<table>
  <tr>
    <th>ID</th>
    <th>Tên Brand</th>
    <th>Quản lý</th>
</tr>
<?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_brand)){
        $i++;
?>

  <tr>
    <td><?php echo $i ?> </t>
    <td><?php echo $row['brand_name'] ?></td>
    <td>
        <a href="xuly.php?brand_id=<?php echo $row['brand_id'] ?>">Xóa</a> 
    </td>
  </tr>
  
<?php
    }  
?>
 
</table>
</body>