<?php
$currentDate = date("m-d"); // 获取当前日期，格式为MM-DD
require_once('databaseinfo.php'); // 包含数据库连接信息

// 创建连接


// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

//$scannedResult = "12-09"; // 你的扫描结果数据
$scannedResult = $_POST['scanned_result'];
if($currentDate == $scannedResult)
{
  echo "true";
}
else
{
  echo "false";
}