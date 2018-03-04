<?php
// Slim PHP

require 'vendor/autoload.php';

$app = new \Slim\App;

session_start();

require_once('app/user.php');

$app->run();
