<?php
//檢查poi在資料表中是否為1
require_once('databaseinfo.php');
//$objectName =$_POST['objectName'];
$objectName="噴水池";
// 建立連接

$sql = "SELECT $objectName FROM 景點";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo $row[$objectName];
    }
  } else {
    echo "0 results";
  }


// 在這裡可以執行你的資料庫操作

// 關閉連接
$conn->close();
?>
