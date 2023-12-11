<?php
require_once('databaseinfo.php');
require_once('objectNameprovider.php');
require_once('idprovider.php');




if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 检查是否存在指定 ID 的记录
$check_sql = "SELECT id FROM `景點` WHERE id = $id";
$check_result = $conn->query($check_sql);

if ($check_result->num_rows > 0) {
    // 如果存在该 ID，则执行更新操作
    $update_sql = "UPDATE `景點` SET $objectName = '1' WHERE id = $id";

    if ($conn->query($update_sql) == TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    // 如果不存在该 ID，则执行插入操作
    $insert_sql = "INSERT INTO `景點` (id, $objectName) VALUES ($id, '1')";

    if ($conn->query($insert_sql) == TRUE) {
        echo "New record inserted successfully";
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}

$conn->close();
?>
