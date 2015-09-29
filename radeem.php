<?php include "header_radeem.php"; ?>

<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>


<?php

$db = new mysqli("localhost", "root", "", "car");

if (isset($_POST["submit"])) {
    $num = $_POST['num'];

    $query2 = "SELECT*FROM `carwash` WHERE `car_no`='$num'";
    $result = $db->query($query2);
    $row = $result->fetch_object();

    if (!$row) {
        ?> <p class="bg-danger" align="center"><?php
            echo "not registerd";


            ?> </p> <?php
    } elseif ($row->score > 100) {
        $query4 = "UPDATE `carwash` SET `score`=score-100 WHERE `car_no`='$num'";
        $result4 = $db->query($query4);
        ?> <p class="bg-success" align="center"><?php
            echo "you won prize";
            ?> </p> <?php
    } else {
        ?> <p class="bg-danger" align="center"><?php
            echo "your score is " . $row->score;
            ?> </p> <?php
    }
}
?>


</body>
</html>