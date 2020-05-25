<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require 'connection.php';
$data = json_decode(file_get_contents("php://input"));

if ($data) {
    $name = $data->name;
    $email = $data->email;
    //$name = mysqli_real_escape_string($con, trim($data->name));
    //$email = mysqli_real_escape_string($con, trim($data->email));

    $query = "select * from users where user_email='$email'";
    $res = mysqli_query($con, $query);
    if (mysqli_num_rows($res) > 0) {
        echo json_encode(["success" => 0, "msg" => "Email already exist."]);
    } else {
        $query = "insert into users(user_name,user_email) value('$name','$email')";
        if (mysqli_query($con, $query)) {
            echo json_encode(["success" => 1, "msg" => "User Inserted."]);
        } else {
            echo json_encode(["success" => 0, "msg" => "User not Inserted."]);
        }
    }

}
