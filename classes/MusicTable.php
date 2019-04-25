<?php

	class MusicTable{ 
	//define constants for the name of the table and the titles of the columns
	const TABLE_NAME="music";
	const COLUMN_ID="id";
	const COLUMN_SONG="song";
	const COLUMN_ARTIST="artist";
	const COLUMN_ALBUM="album";
	const COLUMN_YEAR="year";
	const COLUMN_GENRE="genre";
	const COLUMN_RUNTIME="runtime";

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
		$sql = "SELECT * FROM ".MusicTable::TABLE_NAME;

		//prepare the statement for execution and execute it
		$stmt=$this->mConnection->prepare($sql);
		$status=$stmt->execute();

		//if an error occured while executing the query then throw an exception
		if($status!=true){
			$errorInfo = $stmt->errorInfo();
			throw new Exception("Cound not retrieve the music: ".$errorInfo[6]);
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
    
	public function insert($sn, $at, $ab, $yr, $gr, $rt){

		//construct the SQL INSERT statement using named placeholders
		$sql = "INSERT INTO ".
				MusicTable::TABLE_NAME."(".
				MusicTable::COLUMN_SONG.",".
				MusicTable::COLUMN_ARTIST.",".
				MusicTable::COLUMN_ALBUM.",".
				MusicTable::COLUMN_YEAR.",".
				MusicTable::COLUMN_GENRE.",".
				MusicTable::COLUMN_RUNTIME.")".
				" VALUES(:song, :artist, :album, :year, :genre, :runtime)";

		//the values for the named placeholders in the SQL INSERT statement
		$params = array(
			'song' => $sn,
			'artist' => $at,
			'album' => $ab,
			'year' => $yr,
			'genre' => $gr,
			'runtime' => $rt
		);

		//prepare the statment for execution and execute it
		$stmt = $this->mConnection->prepare($sql);
		$status = $stmt->execute($params);

		//if an error occurred while executing the query then throw an exception
		if($status != true){
			$errorInfo = $stmt->errorInfo();
			throw new Exception("Could not save the Music: ".$errorInfo[6]);
		}

		//retrieve the id assigned to the inserted table row

			$id = $this->mConnection->lastInsertId(MusicTable::TABLE_NAME);
			return $id;
	}

	public function delete($id) {
         $sql = "DELETE FROM music WHERE id = :id";
         
          $params = array(
            "id"         => $id);
          $statement =$this->mConnection->prepare($sql);
          $status = $statement->execute($params);
          
          if (!$status){
            die("couldn't delete user");
        }
        return $statement->rowCount();

	}
}

?>