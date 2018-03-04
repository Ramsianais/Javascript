<?php

$app->get('/choix/user', function($request, $response) {
	if(!isset($_SESSION['login_info'])) {
		return $response->withStatus(403);
	}
	
	$query = utf8_decode($request->getParam('q'));
	$limit = 10;

	$result = [];
	$count = 0;

	foreach($_SESSION['user_list'] as $u) {
		$format = utf8_decode($u["firstname"]." ".$u["lastname"]." (".$u["login"].")");
		$pos = strpos(strtolower($format), strtolower($query));
		if($pos !== false && (!$limit || $count < $limit)) {
			array_push($result, $u);
			$count++;
		}
	}

	return $response->withJson($result, 200);
});

$app->get('/choix/user/all', function($request, $response) {
	if(!isset($_SESSION['login_info'])) {
		return $response->withStatus(403);
	}
	
	return $response->withJson($_SESSION['user_list'], 200);
});


$app->get('/choix/user/{id}', function($request, $response) {
	if(!isset($_SESSION['login_info'])) {
		return $response->withStatus(403);
	}
	
	$id = $request->getAttribute('id');

	foreach($_SESSION['user_list'] as $u) {
		if($u['id'] == $id)
			return $response->withJson($u, 200);
	}

	return $response->withStatus(404);
});

$app->get('/choix/etud', function($request, $response) {
	if(!isset($_SESSION['login_info'])) {
		return $response->withStatus(403);
	}

	$query = utf8_decode($request->getParam('q'));
	$limit = 10;

	$result = [];
	$count = 0;

	foreach($_SESSION['etud_list'] as $u) {
		$format = utf8_decode($u["firstname"]." ".$u["lastname"]." (".$u["login"].")");
		$pos = strpos(strtolower($format), strtolower($query));
		if($pos !== false && (!$limit || $count < $limit)) {
			array_push($result, $u);
			$count++;
		}
	}

	return $response->withJson($result, 200);
});

$app->get('/choix/etud/all', function($request, $response) {
	if(!isset($_SESSION['login_info'])) {
		return $response->withStatus(403);
	}

	return $response->withJson($_SESSION['etud_list'], 200);
});


$app->get('/choix/etud/{id}', function($request, $response) {
	if(!isset($_SESSION['login_info'])) {
		return $response->withStatus(403);
	}
	
	$id = $request->getAttribute('id');

	foreach($_SESSION['etud_list'] as $u) {
		if($u['id'] == $id)
			return $response->withJson($u, 200);
	}

	return $response->withStatus(404);
});
