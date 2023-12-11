<?php
require_once('databaseinfo.php');

require_once('idprovider.php');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id,噴水池 ,方舟咖啡, 一期一會 ,靈性迷宮 ,慎行鐘 ,牧羊圖 ,洗腳禮 ,綠映長廊, 生態池, 溜冰場 ,烤肉區 ,珍古德 ,東方三智者 ,聖經浮雕 FROM 景點 WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"].'<br>'.$row["噴水池"].'<br>' . $row["方舟咖啡"].'<br>'.$row["一期一會"].'<br>'.$row["靈性迷宮"].'<br>'.$row["慎行鐘"].'<br>'.$row["牧羊圖"].
    '<br>'.$row["洗腳禮"].'<br>'.$row["綠映長廊"].'<br>'.$row["生態池"].'<br>'.$row["溜冰場"]."<br>".$row["烤肉區"]."<br>".$row["珍古德"]."<br>".$row["東方三智者"]."<br>".$row["聖經浮雕"]."<br>";
  }
} else {
  echo "0 results";
}

$conn->close();

?>