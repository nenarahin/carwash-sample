<?php include "header_form.php"; ?>


<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
<?php

$db = new mysqli("localhost", "root", "", "car");

if (isset($_POST["submit"])) {
    $num = $_POST['num'];

    $query2 = "SELECT `car_no` FROM `carwash` WHERE `car_no`='$num'";
    $result = $db->query($query2);
    $row = $result->fetch_object();

    if (!$row) {

        $query1 = "INSERT INTO `carwash`(`car_no`,`score`) VALUES ('$num',10)";

        if ($db->query($query1)) {
            ?> <p class="bg-success" align="center"><?php
                echo "registered";
                ?> </p> <?php
        } else
            echo "failed";
    } else {
        $query3 = "SELECT*FROM `carwash` WHERE `car_no`='$num'";
        $result3 = $db->query($query3);
        $row3 = $result3->fetch_object();

        if ($row3->score == 100) {
            $query4 = "UPDATE `carwash` SET `score`=score-100 WHERE `car_no`='$num'";
            $result4 = $db->query($query4);
            ?> <p class="bg-success" align="center"><?php
                echo "you won prize";
                ?> </p> <?php
        } else {
            $query4 = "UPDATE `carwash` SET `score`=score+10 WHERE `car_no`='$num'";
            $result4 = $db->query($query4);
            ?> <p class="bg-success" align="center"><?php
                echo "your score has incremented by 10";
                ?> </p> <?php

        }
    }
}
?>

</body>
</html>