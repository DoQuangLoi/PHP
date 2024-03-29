<?php
include_once("init.php");
if (isset($_POST['submit'])) { // bắt sự kiện click button submit
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    if (empty($name) || empty($age) || empty($email)) {
        //In ra thông báo
        echo 'Please fill infomation';
    } else {
        //Tạo câu truy vấn
        $sql = "INSERT INTO  users (name, age, email) VALUES (:name, :age, :email)";
        //Chuẩn bị thực thi câu truy vấn
        $query = $dbConn->prepare($sql);
        //tạo ràng buộc
        $query->bind_param(":name", $name);
        $query->bind_param(":age", $age);
        $query->bind_param(":email", $email);
        //Thực thi câu truy vấn
        $query->execute();
        header("Location: index.php");
    }
   
}
?>
<title>
    Add
</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="container">
<form action="add.php" method="post">
<div class="mt-3">
    <label for="" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" aria-describedby="passwordHelpBlock">
</div>
<div class="mt-3">
    <label for="" class="form-label">Age</label>
    <input type="bumber" name="age" class="form-control" aria-describedby="passwordHelpBlock">
</div>
<div class="mt-3">
    <label for="" class="form-label">Password</label>
    <input type="text" name="email" class="form-control" aria-describedby="passwordHelpBlock">
</div>
<button type="submit" name="submit" class="mt-3 btn btn-primary">Submit</button>
</form>
</div>
