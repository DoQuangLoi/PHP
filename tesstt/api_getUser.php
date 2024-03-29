<?php
include_once("init.php");

// // Lấy id từ request
$id = isset($_GET["id"]) ? $_GET["id"] : null;

// Viết câu lệnh SQL
$sql = "SELECT * FROM nguoidung";

// Nếu có id, thêm điều kiện WHERE
if ($id !== null) {
    $sql .= " WHERE id = ?";

}

// Chuẩn bị câu lệnh
$stmt = $dbConn->prepare($sql);

// Bind dữ liệu (nếu có)
if ($id !== null) {
    $stmt->bind_param("i", $id);
}

// Thực thi câu lệnh
$stmt->execute();

// Lấy kết quả
$result = $stmt->get_result();

// Khởi tạo mảng dữ liệu
$data = array();

// Duyệt qua kết quả
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Trả về dữ liệu JSON
echo json_encode($data);

// Đóng kết nối
$result->close();
$dbConn->close();