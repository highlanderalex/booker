<?php
	
	require_once ('libs/func/func.php');
	session_start();
	
	$view = empty($_GET['view']) ? 'login' : $_GET['view'];
	
	$page = new PageController();
	(method_exists($page, $view)) ? $page->$view() : $page->error();
	

