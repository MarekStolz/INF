<?php
require 'login.php';

$q = "SELECT * FROM flight WHERE from_dttm > NOW() ORDER BY from_dttm LIMIT 8";
$result = mysqli_query($con, $q);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

mysqli_close($con);

$json = json_encode($data, JSON_PRETTY_PRINT);
file_put_contents('../JSON/flights.json', $json);
