<?php

$app->post('/user/list', function($request, $response) {
	
	$username = $request->getParam('username'); 
	$password = $request->getParam('password');

	include_once('dbconnect.php'); 

	$stmt = $mysqli->prepare("SELECT id FROM admin WHERE userName=? AND password=?");
	$stmt->bind_param("ss", $username, $password);
	$stmt->execute();
    	$stmt->store_result();
	$stmt->fetch();

	if($stmt->num_rows != 1) {
		return $response->withJson(array("Denied"), 503);
	}

	$stmt = $mysqli->prepare("SELECT * FROM user"); 
	$stmt->execute(); 
	$result = $stmt->get_result(); 
	$r = array(); 

	while($row = $result->fetch_array()) { 
		$data = array(); 
		$data['id'] = $row['id'];
		$data['firstName'] = $row['firstName'];
		$data['lastName'] = $row['lastName'];
		$data['email'] = $row['email'];
		$data['phone'] = $row['phone'];

		array_push($r, $data); 
	}

	return $response->withJson($r, 200);
});


$app->post('/user/add', function($request, $response) {
	include_once('dbconnect.php');

	$firstName = $request->getParam('firstName'); 
	$lastName = $request->getParam('lastName');
	$email = $request->getParam('email'); 
	$phone = $request->getParam('phone');

	if(!$firstName || !$lastName || !$phone || !$email) { 
		return $response->withStatus(400);
	}

	$stmt = $mysqli->prepare("INSERT INTO user (firstName, lastName, email, phone) VALUES (?,?,?,?)"); 
	$stmt->bind_param("ssss", $firstName, $lastName, $email, $phone); 
	$stmt->execute(); 

	if($stmt->error)
		return $response->withStatus(500);
	else
		return $response->withStatus(200);
});

