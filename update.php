<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require 'connection.php';

$data = json_decode(file_get_contents("php://input"));

if($data){
	$id=$data->id;
	$name=$data->name;
	$email=$data->email;
	
	/*	$id=9;
	$name="bittuSingh";
	$email="bittu";
*/
	$query="update users set user_name='$name', user_email='$email' where id='$id'";

	if(mysqli_query($con, $query)){
		echo json_encode(["success"=>1,"msg"=>"User Updated."]);
	}
	else{
		echo json_encode(["success"=>0, "msg"=>"Record not updated."]);
	}
}
else{
		echo json_encode(["success"=>0, "msg"=>"Record not updated."]);
}