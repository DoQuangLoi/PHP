<?php
include_once("init.php");
//lấy dữ liệu từ id trên url
$id = $_GET["id"];

//câu lênh truy vấn
$sql = "DELETE FROM users WHERE id=:id";
//chuẩn bị thực thi
$query = $dbConn->prepare($sql);
//thực thi với id truyền vào URL
$query -> execute(array(':id'=>$id));
header("Location: index.php");
?>