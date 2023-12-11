<?php
$currentDate = date("Y-m-d"); // 获取当前日期，格式为 YYYY-MM-DD
$currentTime = date("H:i:s"); // 获取当前时间，格式为 HH:MM:SS

// 连接到 MySQL 数据库
require_once('databaseinfo.php');
require_once('objectNameprovider.php');
require_once('idprovider.php');
$latitude =$_POST['latitude'];
$longitude =$_POST['longitude'];

 //检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 准备 SQL 查询语句，将日期和时间插入到数据库表中
$sql = "INSERT INTO 打卡時間 (id,打卡地點,日期,時間,latitude,longitude) VALUES ('$id','$objectName','$currentDate', '$currentTime','$latitude','$longitude')";

if ($conn->query($sql) === TRUE) {

} else {
}
// 关闭数据库连接
$conn->close();
?>