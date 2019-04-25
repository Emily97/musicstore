<?php

	class PeopleTable{ 
	//define constants for the name of the table and the titles of the columns
	const TABLE_NAME="people";
	const COLUMN_NAME="name";
	const COLUMN_USERNAME="username";
	const COLUMN_EMAIL="email";
	const COLUMN_PASSWORD="password";
	const COLUMN_LANGUAGES="languages";

	//a PDO object which provides a connection to the database
	private $mConnection;

	public function __construct($connection){
		$this->mConnection=$connection;
	}

	public function __destruct() {
		$this->mConnection = null;
	}

	public function findAll(){

		//construct the SQL SELECT statement
		$sql = "SELECT * FROM ".PeopleTable::TABLE_NAME;

		//prepare the statement for execution and execute it
		$stmt=$this->mConnection->prepare($sql);
		$status=$stmt->execute();

		//if an error occured while executing the query then throw an exception
		if($status!=true){
			$errorInfo = $stmt->errorInfo();
			throw new Exception("Cound not retrieve the people: ".$errorInfo[5]);
		}

		//return the array of containing book table rows
		return $stmt;
	}

	//below is the code that would allow a user to view just one programmer

	// public function getProgrammerById($id){
 //        $sql = "SELECT * FROM people WHERE username = :username";
        
 //        $statement =$this->connection->prepare($sql);
 //        $params = array(
 //            "username" => $id
 //        );
        
 //        $status = $statement->execute($params);
        
 //        if(!$status){
 //            die("could not retrieve users");
 //        }
 //        return $statement;
 //    }
    
	public function insert($fn, $un, $em, $pw, $lg){

		//construct the SQL INSERT statement using named placeholders
		$sql = "INSERT INTO ".
				PeopleTable::TABLE_NAME."(".
				PeopleTable::COLUMN_NAME.",".
				PeopleTable::COLUMN_USERNAME.",".
				PeopleTable::COLUMN_EMAIL.",".
				PeopleTable::COLUMN_PASSWORD.",".
				PeopleTable::COLUMN_LANGUAGES.")".
				" VALUES(:name, :username, :email, :password, :languages)";

		//the values for the named placeholders in the SQL INSERT statement
		$params = array(
			'name' => $fn,
			'username' => $un,
			'email' => $em,
			'password' => $pw,
			'languages' => $lg
		);

		//prepare the statment for execution and execute it
		$stmt = $this->mConnection->prepare($sql);
		$status = $stmt->execute($params);

		//if an error occurred while executing the query then throw an exception
		if($status != true){
			$errorInfo = $stmt->errorInfo();
			throw new Exception("Could not save the Person: ".$errorInfo[5]);
		}

		//retrieve the id assigned to the inserted table row

			$id = $this->mConnection->lastInsertId(PeopleTable::TABLE_NAME);
			return $id;
	}
}

?>