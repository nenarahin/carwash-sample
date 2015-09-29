$query4= "UPDATE `car` SET `score`=score+1 WHERE `car_no`='$num'";
$result4=$db->query($query4);
$row4=$result4->fetch_object();
print_r($row2);