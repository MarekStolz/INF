<?php
$con = @mysqli_connect("localhost", "root", "", "lety", "3306");
if ($con === false) {
    die("D8 error");
}
mb_internal_encoding('UTF-8');
mysqli_query($con, "SET CHARACTER SET UTF8");
$current_time = date('Y-m-d H:i:s');
date_default_timezone_set('Europe/Prague');

?>