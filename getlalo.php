<?php

function splitdate($first, $last) {
    $first = explode(":", $first["time"]);
    $last = explode(":", $last["time"]);
    $h = abs($first[0]-$last[0]);
    $m = abs($first[1]-$last[1]);
    $s = abs($first[2]-$last[2]);
    return $h.','.$m.','.$s;
}
function calculateDistance($lat1, $lon1, $lat2, $lon2, $unit = "km") {
    $earthRadius = ($unit == "km") ? 6371 : 3959; // 地球半径（单位：km 或 英里）
    

    $lat1 = deg2rad($lat1);
    $lon1 = deg2rad($lon1);
    $lat2 = deg2rad($lat2);
    $lon2 = deg2rad($lon2);

    $latDifference = $lat2 - $lat1;
    $lonDifference = $lon2 - $lon1;

    $a = sin($latDifference / 2) * sin($latDifference / 2) +
         cos($lat1) * cos($lat2) * sin($lonDifference / 2) * sin($lonDifference / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    $distance = $earthRadius * $c;

    return $distance;
}


require_once('databaseinfo.php');
// 创建连接
require_once('idprovider.php');
$currentDate = date("Y-m-d");

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败：" . $conn->connect_error);
}

$sql = "SELECT * FROM 打卡時間 WHERE id = $id AND 日期 = '$currentDate'"; 
$result = $conn->query($sql);
// 从数据库获取数据
$locations = array(); // 存储从数据库获取的点的数组

// 假设 $result 是您从 MySQL 数据库获取的结果集
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $time = $row['時間'];
        $latitude = $row['latitude'];
        $longitude = $row['longitude'];

        $locations[] = array('time' => $time, 'latitude' => $latitude, 'longitude' => $longitude);
    }
    
    

}


$locations_json = json_encode($locations);

$locations_array = json_decode($locations_json, true);

$first_record = reset($locations_array);
$last_record = end($locations_array);

$compute = splitdate($first_record,$last_record);
$totalDistance = 0;

// 计算两两点之间的距离并加总
for ($i = 0; $i < count($locations)-1; $i++) {
        $distance = calculateDistance(
            $locations[$i]['latitude'],
            $locations[$i]['longitude'],
            $locations[$i+1]['latitude'],
            $locations[$i+1]['longitude']
        );
       /* echo $locations[$i]['latitude'].'    '.$locations[$i]['longitude'].'<br>';
        echo $locations[$j]['latitude'].'    '.$locations[$j]['longitude'].'<br>';*/
        $totalDistance += $distance;
}
$totalDistance = number_format($totalDistance, 4, '.', '');
$walk = $totalDistance/0.0007;
$walk = number_format($walk, 0, '.', '');
$totaltime = explode(",",$compute);
$data=array( 'totaldistance' => $totalDistance, 'walk' => $walk,'hour' => $totaltime[0],'minute' => $totaltime[1],'second' => $totaltime[2]);
$data_json = json_encode($data);
echo $data['totaldistance']."<br>";
echo $data['walk']."<br>";
echo $data['hour']."<br>";
echo $data['minute']."<br>";
echo $data['second']."<br>";
// 关闭连接
$conn->close();
?>
