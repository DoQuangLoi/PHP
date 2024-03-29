<?php
include_once("init.php");
//lấy tất cả các cột và sắp xếp theo thứ tự giảm dần
$result = $dbConn->query("SELECT * FROM users
    ORDER BY id DESC");
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<title>Home</title>
<div class="container mt-3 table-responsive">
    <a href="add.php" class="btn btn-primary">Add New Data</a>
    <br><br>
    <table class="table">
        <tr color="#CCCCCC" style="font-weight:bold">
            <td>#</td>
            <td>Name</td>
            <td>Age</td>
            <td>Email</td>
            <td>Option</td>
        </tr>
        <?php
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td><a href=\"edit.php?id=$row[id] \" type='button' class='btn btn-primary'>Edit</a> 
                <a href=\"delete.php?id=$row[id]\" type='button' class='btn btn-danger'
                
                onClick=\" return confirm('Bạn có muốn xóa ko')\"> Delete </td>";




        }
        ?>
    </table>
</div>

