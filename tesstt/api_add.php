<?php
include_once("init.php");

// Lấy dữ liệu từ request
$name = $_POST['useName'];
$pass = $_POST['pass'];
$SDT = $_POST['SDT'];
$email = $_POST['email'];
$role = $_POST['role'];

// Viết câu truy vấn SQL
$sql = "INSERT INTO nguoidung (useName, pass,SDT, email, role) VALUES (?, ?, ?,?, ?)";

// Chuẩn bị câu lệnh
$stmt = $dbConn->prepare($sql);

// Tạo ràng buộc dữ liệu
$stmt->bind_param("sssss", $name, $pass, $SDT, $email, $role);

// Thực thi câu lệnh
$stmt->execute();

// Kiểm tra kết quả
if ($stmt->affected_rows > 0) {
    echo "true";
} else {
    echo "false";
}

// Đóng kết nối
$stmt->close();
$dbConn->close();
