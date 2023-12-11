<?php
require_once('databaseinfo.php');

require_once('idprovider.php');




// 获取 id 为 1 的 point 值
$sql = "SELECT points FROM test WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        $currentPoint = $row["points"];
        // 进行计算
        $newPoint = $currentPoint +100; // 假设这里是对point值进行加倍的计算

        // 更新数据库中的 point 值
        $updateSql = "UPDATE test SET points = $newPoint WHERE id = $id";
        if ($conn->query($updateSql) === TRUE) {
            echo "成功更新 id 为 1 的 points 值为: " . $newPoint;
        } else {
            echo "更新失败: " . $conn->error;
        }
    }
} 
 else {
    // 如果不存在该 ID，则执行插入操作
    $insert_sql = "INSERT INTO `test` (id, points) VALUES ($id,'100')";

    if ($conn->query($insert_sql) == TRUE) {
        echo "New record inserted successfully";
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}

$conn->close();
?>
