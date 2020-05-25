<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require 'connection.php';
$query = "select * from users";
$users = mysqli_query($con, $query);
if (mysqli_num_rows($users) > 0) {
    $res = mysqli_fetch_all($users, MYSQLI_ASSOC);

    echo json_encode(["success" => 1, "users" => $res]);
} else {
    echo json_encode(["success" => 0]);
}
