<?php
 class DB {
// 	const HOST ="daneel";
// 	const DATABASE = "n00150623";
// 	const USERNAME = "N00150623";
// 	const PASSWORD = "N00150623";

 	const HOST ="localhost";
 	const DATABASE = "music";
 	const USERNAME = "root";
 	const PASSWORD = "";

	public static function getConnection(){

		$dsn = 'mysql:host='. DB::HOST.';dbname='. DB::DATABASE;

		$connection = new PDO($dsn,DB::USERNAME,DB::PASSWORD);
		//dsn = data source name, tells us where the database server is and which database on the server we wish to connect to

		$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		return $connection;
	}
}
?>