<?php

	require_once'classes/DB.php';
	require_once'classes/MusicTable.php';

	$errors = array(); //all error messages
	$formdata = array(); //

/*--------------------------------------*/
	if (!isset($_POST['song']) || $_POST['song'] === ""){
		$errors['song'] = "song is a required field.";
	}
	else {
		$song = filter_input(INPUT_POST, 'song', FILTER_SANITIZE_SPECIAL_CHARS);
		if($song != $_POST['song']){
			$errors['song'] = "song contained illegal characters";
		}
		$formdata['song'] = $song;
	}
/*--------------------------------------*/
	if (!isset($_POST['artist']) || $_POST['artist'] === ""){
		$errors['artist'] =  "artist is a required field.";
	}
	else {
		$artist = filter_input(INPUT_POST, 'artist', FILTER_SANITIZE_SPECIAL_CHARS);
		if($artist != $_POST['artist']){
			$errors['artist'] = "artist contained illegal characters.";
		}
		$formdata['artist'] = $artist;
	}
/*--------------------------------------*/
		if (!isset($_POST['album']) || $_POST['album'] === ""){
		$errors['album'] =  "album is a required field.";
	}
	else {
		$album = filter_input(INPUT_POST, 'album', FILTER_SANITIZE_SPECIAL_CHARS);
		if($album != $_POST['album']){
			$errors['album'] = "album contained illegal characters.";
		}
		$formdata['album'] = $album;
	}
	/*--------------------------------------*/
	if (!isset($_POST['year']) || $_POST['year'] === ""){
		$errors['year'] =  "year is a required field.";
	}
	else {
		$year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_SPECIAL_CHARS);
		if($year != $_POST['year']){
			$errors['year'] = "year contained illegal characters.";
		}
		$formdata['year'] = $year;
	}
/*--------------------------------------*/
	if(!isset($_POST['genre'])) {
		$errors['genre'] ="genres is a required field.";
	}
	else {
		$genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
		if(count($genre) < 1 || count($genre) > 3) {
			$errors['genre'] ="Please choose the correct number of genres.";
		}
		else {
			$validGenre = array("pop", "rock", "rap", "indie");
			$validGenres = TRUE;
			foreach ($genre as $genres) {
				if(!in_array($genres, $validGenre)) {
					$validGenres = FALSE;
				}
			}
			if(!$validGenres){
				$errors['genre'] ="At least one genres was invalid.";
			}
			else {
				$formdata['genre'] = $genre;
			}
		}
	}
/*--------------------------------------*/
if (!isset($_POST['runtime']) || $_POST['runtime'] === ""){
		$errors['runtime'] =  "runtime is a required field.";
	}
	else {
		$runtime = filter_input(INPUT_POST, 'runtime', FILTER_SANITIZE_SPECIAL_CHARS);
		if($runtime != $_POST['runtime']){
			$errors['runtime'] = "runtime contained illegal characters.";
		}
		$formdata['runtime'] = $runtime;
	}

    if (empty($errors)) {
    	 try {
            // $formdata['lang'] = $_POST['lang'];
            $conn = DB::getConnection();
            $table = new MusicTable($conn);
            $id = $table->insert($formdata['song'], $formdata['artist'], $formdata['album'], $formdata['year'],  implode(", ", $formdata['genre']), $formdata['runtime']);
            
            header("Location: home.php");
        }
        catch (PDOException $e) {
            $conn = null;
            exit("Connection failed: ".$e->getMessage());
        }
    }
    else {
    	require 'musicForm.php';
    }

?>