<?php
include_once("init.php");

// Lấy dữ liệu từ request
$maSP = $_POST['maSP'];
$tenSP = $_POST['tenSP'];
$giaSP = $_POST['giaSP'];
$soLuong = $_POST['soLuong'];
$FK_maLoai = $_POST['FK_maLoai'];

// Viết câu truy vấn SQL
$sql = "INSERT INTO sanpham (maSP, tenSP,giaSP, soLuong, FK_maLoai) VALUES (?, ?, ?, ?, ?)";

// Chuẩn bị câu lệnh
$stmt = $dbConn->prepare($sql);

// Tạo ràng buộc dữ liệu
$stmt->bind_param("ssiis", $maSP, $tenSP, $giaSP, $soLuong, $FK_maLoai);

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