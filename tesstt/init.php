<?php
//khai báo
$dbHost = "localhost";
$dbName = "mb_md18201";
$dbUsername ="root";
$dbPass = "";

//Kết nối Database
$dbConn =  new mysqli($dbHost, $dbUsername, $dbPass, $dbName);

//Kiểm tra kết nối
if($dbConn -> connect_error) {
    die("kết nối thất bại". $dbConn -> connect_error);
}
