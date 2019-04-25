<?php

	require_once'classes/DB.php';
	require_once'classes/PeopleTable.php';

	$errors = array(); //all error messages
	$formdata = array(); //

/*--------------------------------------*/
	if (!isset($_POST['name']) || $_POST['name'] === ""){
		$errors['name'] = "Name is a required field.";
	}
	else {
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
		if($name != $_POST['name']){
			$errors['name'] = "Name contained illegal characters";
		}
		$formdata['name'] = $name;
	}
/*--------------------------------------*/
	if (!isset($_POST['username']) || $_POST['username'] === ""){
		$errors['username'] =  "Username is a required field.";
	}
	else {
		$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
		if($username != $_POST['username']){
			$errors['username'] = "Username contained illegal characters.";
		}
		$formdata['username'] = $username;
	}

/*--------------------------------------*/
	if(!isset($_POST['email']) || $_POST['email'] === "") {
		$errors['email'] = "Email is a required field.";
	}
	else {
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		if($email != $_POST['email']) {
			$errors['email'] ="Email contained illegal characters.";
		}
		else {
			// echo $email;
			$email = filter_var($email, FILTER_VALIDATE_EMAIL);
			if($email === FALSE) {
				$errors['email'] = "Email is not in a valid email address format.";
			}
		}
		$formdata['email'] = $email;
	}
/*--------------------------------------*/
	if(!isset($_POST['lang'])) {
		$errors['lang'] ="Languages is a required field.";
	}
	else {
		$lang = filter_input(INPUT_POST, 'lang', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
		if(count($lang) < 1 || count($lang) > 3) {
			$errors['lang'] ="Please choose the correct number of programming languages.";
		}
		else {
			$validLang = array("cplusplus", "java", "python", "php");
			$validLanguages = TRUE;
			foreach ($lang as $languages) {
				if(!in_array($languages, $validLang)) {
					$validLanguages = FALSE;
				}
			}
			if(!$validLanguages){
				$errors['lang'] ="At least one programming language was invalid.";
			}
			else {
				$formdata['lang'] = $lang;
			}
		}
	}
/*--------------------------------------*/
		if(!isset($_POST['password']) || $_POST['password'] === "") {
			$errors['password'] = "Password is a required field";
		}
		else{
			$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

			if($password != $_POST['password']){
				$errors['password'] = "Password contained illegal characters";
			}
			else {
				$formdata['password'] = $password;
			}
		}
    if (empty($errors)) {
    	 try {
            // $formdata['lang'] = $_POST['lang'];
            $conn = DB::getConnection();
            $table = new PeopleTable($conn);
            $id = $table->insert($formdata['name'], $formdata['username'], $formdata['email'], $formdata['password'],  implode(", ", $formdata['lang']));
            
            header("Location: index.php");
        }
        catch (PDOException $e) {
            $conn = null;
            exit("Connection failed: ".$e->getMessage());
        }
    }
    else {
    	require 'form.php';
    }

?>