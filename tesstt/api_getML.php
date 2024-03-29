<?php
include_once("init.php");

// // Lấy id từ request
// $maSP = isset($_GET["maSP"]) ? $_GET["maSP"] : null;

// Viết câu lệnh SQL
$sql = "SELECT * FROM loaiSP";

// Nếu có id, thêm điều kiện WHERE
// if ($maSP !== null) {
//     $sql .= " WHERE maSP = ?";

// }

// Chuẩn bị câu lệnh
$stmt = $dbConn->prepare($sql);

// Bind dữ liệu (nếu có)
// if ($maSP !== null) {
//     $stmt->bind_param("s", $maSP);
// }

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
