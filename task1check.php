<?php
require_once('databaseinfo.php');

require_once('idprovider.php');



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT 噴水池, 方舟咖啡, 一期一會, 靈性迷宮, 慎行鐘, 牧羊圖, 洗腳禮, 綠映長廊, 生態池, 溜冰場, 烤肉區, 珍古德, 東方三智者, 聖經浮雕 
        FROM 景點 
        WHERE id = $id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // 检查每个列是否都等于 1
    $allColumnsEqualOne = true;
    foreach ($row as $columnName => $value) {
        if ($value != 1) {
            $allColumnsEqualOne = false;
            break;
        }
    }

    if ($allColumnsEqualOne) {
        echo "true";
    } else {
        echo "false";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
