<?php
include_once("init.php");
// Lấy dữ liệu từ request
$maSP = $_POST['maSP'];
$tenSP = $_POST['tenSP'];
$giaSP = $_POST['giaSP'];
$soLuong = $_POST['soLuong'];
$FK_maLoai = $_POST['FK_maLoai'];

// Kiểm tra dữ liệu
if (empty($maSP) || empty($tenSP) || empty($giaSP) || empty($soLuong)) {
    echo json_encode(array("status" => "error", "message" => "Please fill your information!!!"));
    exit();
}

// Cập nhật thông tin người dùng
$sql = "UPDATE sanPham SET maSP = ?, tenSP = ?, giaSP = ?, soLuong = ?, FK_maLoai= ? WHERE maSP = ?";

// Chuẩn bị câu lệnh
$stmt = $dbConn->prepare($sql);

// Tạo ràng buộc dữ liệu
$stmt->bind_param("ssssss", $maSP, $tenSP, $giaSP, $soLuong, $FK_maLoai,$maSP);

// Thực thi câu lệnh
$stmt->execute();

// Kiểm tra kết quả
if ($stmt->affected_rows > 0) {
    echo json_encode(array("status" => "success", "message" => "Successfully Updated"));
} else {
    echo json_encode(array("status" => "error", "message" => "Failed Updated"));
}

// Đóng kết nối
$stmt->close();
$dbConn->close();
