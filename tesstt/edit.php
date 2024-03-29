<?php
include_once("init.php");

if (isset($_POST['update'])) { // bắt sự kiện click button Update
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    if (empty($name) || empty($age) || empty($email)) {
       // In ra thông báo
       echo 'Please fill your information';
    }else {
        // Tạo câu truy vấn
        $sql = "UPDATE users SET name=:name, age=:age, email = :email WHERE id = :id";

        // Chuẩn bị thực thi câu truy vấn
        $query = $dbConn->prepare($sql);

        // Tạo ràng buộc
        $query->bindParam(":id", $id);
        $query->bindParam(":name", $name);
        $query->bindParam(":age", $age);
        $query->bindParam(":email", $email);

        // Thực thi câu truy vấn
        $query->execute();
    }
    header("Location: index.php");
}
?>

<?php
    // Lấy giá trị id từ URL
    $id = $_GET['id'];

    // Lấy thông tin user có id tương ứng
    $sql = 'SELECT * FROM users WHERE id = :id';
    $query = $dbConn->prepare($sql);

    // Truy vấn thực thi với giá trị id truyền vào tương ứng
    $query->execute(array(':id'=> $id));

    // Lặp để lấy dữ liệu theo id tương ứng
    while($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $name = $row['name'];
        $age = $row['age'];
        $email = $row['email'];
    }
?>

<title>Edit</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="container">
    <form action="edit.php" method="post">
        <div class="mt-3">
            <label for="" class="form-label">Name</label>
            <input type="text" value="<?php echo $name; ?>" name="name" class="form-control" placeholder="Enter name">
        </div>
        <div class="mt-3">
            <label for="" class="form-label">Age</label>
            <input type="number" value="<?php echo $age; ?>" name="age" class="form-control" placeholder="Enter age">
        </div>
        <div class="mt-3">
            <label for="" class="form-label">Email</label>
            <input type="text" value="<?php echo $email; ?>" name="email" class="form-control" placeholder="Enter email">
        </div>
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <button type="submit" name="update" class="mt-3 btn btn-primary">Submit</button>
    </form>
</div>