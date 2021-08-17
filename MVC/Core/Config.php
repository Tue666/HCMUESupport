<?php
	$http = 'http://localhost/HCMUESupport/';

	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_HOST', 'localhost');
	define('DB_SERVERNAME', 'database');

	// define('DB_USERNAME', 'id16381694_admin');
	// define('DB_PASSWORD', '1r!72Be0c&Gc7{Vy');
	// define('DB_HOST', 'localhost');
	// define('DB_SERVERNAME', 'id16381694_dotshop');

// User define
	define('BASE_URL', $http);
	define('CSS_URL', $http . 'Public/css');
	define('IMAGE_URL', $http . 'Public/images');
	define('JS_URL', $http . 'Public/js');

// Admin define
	define('ADMIN_BASE_URL', $http . 'Admin/');
	define('ADMIN_CSS_URL', $http . 'Public/admin/css');
	define('ADMIN_IMAGE_URL', $http . 'Public/admin/images');
	define('ADMIN_JS_URL', $http . 'Public/admin/js');
