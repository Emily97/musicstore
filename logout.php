<?php
require_once 'utils/session.php';

if (!is_logged_in()) {
    header("Location: index.php");
}
else {
	session_unset();

	header("Location: index.php");
}
?>
