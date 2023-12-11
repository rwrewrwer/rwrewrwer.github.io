<?php
require_once('databaseinfo.php');
// 创建连接
require_once('idprovider.php');


// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败：" . $conn->connect_error);
}

$sql = "SELECT * FROM 景點 WHERE id=$id"; // 假设您的景点表为 attractions
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        // 输出每行的数据
        foreach ($row as $key => $value) {
            echo "$key<br>"; // 输出每列的键值对
        }
        echo "<br>";
    }
} else {
    echo "未找到匹配的记录";
}


// 关闭连接
$conn->close();
?>
