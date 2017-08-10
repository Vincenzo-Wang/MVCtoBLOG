<?php
include "boot/Psr4Autoloader.php";

class Router
{
	protected static $autoloader;
	public static function init()
	{
		$config = include('config/namespace.php');
		self::$autoloader = new Psr4Autoloader($config);
		session_start();
	}

	public static function run()
	{
		//简单路由
		$_GET['m'] = empty($_GET['m'])?'index': $_GET['m'];
		$_GET['c'] = empty($_GET['c'])?'index': $_GET['c'];
		$_GET['a'] = empty($_GET['a'])?'index': $_GET['a'];

		//index\\controller\IndexController
		$c = $_GET['m'] . '\\controller\\'.ucfirst($_GET['c']).'Controller';
		// var_dump($c);
		call_user_func([new $c(),$_GET['a']]);
	}
}