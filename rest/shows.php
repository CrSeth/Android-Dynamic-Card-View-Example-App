<?php

include_once('config.php');

$qur = mysql_query("select * from ParkActivities
                    where Category= 'SHOW' ");
$result = array();

while($r = mysql_fetch_array($qur)){
  extract($r);
  $Name = utf8_encode($Name);
  $Description = utf8_encode($Description);
  $Schedule = utf8_encode($Schedule);
  $Location = utf8_encode($Location);
  $result[] = array("name" => $Name, "location" => $Location,
  "schedule" => $Schedule, "imgurl"=> $ImgUrl);
}

$json = array("info" => $result);

@mysql_close($conn);

/*Output*/
header('Content-type: application/json');
echo json_encode($json);
