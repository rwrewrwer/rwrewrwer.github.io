<?php
require_once('databaseinfo.php');

require_once('idprovider.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "UPDATE `景點` SET 噴水池='0', 方舟咖啡='0', 一期一會='0', 靈性迷宮='0', 慎行鐘='0', 牧羊圖='0', 洗腳禮='0', 綠映長廊='0', 生態池='0', 溜冰場='0', 烤肉區='0', 珍古德='0', 東方三智者='0', 聖經浮雕='0' WHERE id = $id";

  if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $conn->error;
  }

$conn->close();




?>