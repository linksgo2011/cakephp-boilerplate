<?php
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'port' => 8889,
		'login' => 'root',
		'password' => 'root',
		'database' => 'cakephp-boilerplate',
		// Mac上使用命令行会报错 Error: Database connection "Mysql" is missing, or could not be created.
		'unix_socket' => '/Applications/MAMP/tmp/mysql/mysql.sock'
	);
}
