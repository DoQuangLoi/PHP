<?php
include_once("init.php");

$useName = $_POST["useName"];
$pass = $_POST["pass"];

$sql = "SELECT * FROM nguoidung WHERE useName = ? AND pass = ?";

$stmt = $dbConn ->prepare($sql);

$stmt -> bind_param("ss", $useName, $pass);

$stmt -> execute();

$result = $stmt -> get_result();

if ($result->num_rows > 0) {
$data = $result->fetch_assoc(); // Lấy dữ liệu của user
  echo json_encode(["success" => true, "data" => $data]);
} else {
  echo json_encode(["success" => false, "error" => "Đăng nhập thất bại"]);
}

// Trả về dữ liệu JSON


// Đóng kết nối
$result->close();
$dbConn->close();