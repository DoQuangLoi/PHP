<?php
include_once("init.php");

// Lấy dữ liệu id từ URL
$maSP = $_GET["maSP"];

// Tạo câu truy vấn
$sql = "DELETE FROM sanpham WHERE maSP = ?";

// Chuẩn bị thực thi
$query = $dbConn->prepare($sql);

// Tạo ràng buộc
$query->bind_param("s", $maSP);

// Thực thi câu lệnh
$query->execute();

// Kiểm tra kết quả
if ($query->affected_rows > 0) {
    echo json_encode(array("status" => true, "message" => "Successfully Deleted"));
} else {
    echo json_encode(array("status" => false, "message" => "Failed Deleted"));
}

// Đóng kết nối
$query->close();
$dbConn->close();