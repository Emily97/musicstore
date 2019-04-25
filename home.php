<?php

require_once'classes/DB.php';
require_once'classes/MusicTable.php';

try{
	$conn = DB::getConnection();
	$table = new MusicTable($conn);
	$people = $table->findAll();
}

catch(PDOException $e){
	$conr = null;
	exit("Connectionfailed:".$e->getMessage());
} 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<!-- 
    <script type="text/javascript" src="js/myForm.js"></script>
    <script type="text/javascript" src="js/format.js"></script>
    <script type="text/javascript" src="js/valid.js"></script>
 -->
    <link rel="stylesheet" type="text/css" href="css/style.css"><!--Linking to css file-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
 
    <div class = "container">
    	<div class="col-lg-12">


<?php

			echo '<table class="table table-striped text-center">';
			echo '<tr>';
			echo '<th class="text-center">Song</th>';
			echo '<th class="text-center">Artist</th>';
			echo '<th class="text-center">Album</th>';
			echo '<th class="text-center">Year</th>';
			echo '<th class="text-center">Genre</th>';
			echo '<th class="text-center">Runtime</th>';
			echo '<th></th>';
			echo '</tr>';

			$row = $people->fetch();
			// die(print_r($row,true));
			while($row != null) {
				echo'<tr>';
					echo'<td>'.$row[MusicTable::COLUMN_SONG].'</td>';
					echo'<td>'.$row[MusicTable::COLUMN_ARTIST].'</td>';
					echo'<td>'.$row[MusicTable::COLUMN_ALBUM].'</td>';
					echo'<td>'.$row[MusicTable::COLUMN_YEAR].'</td>';
					echo'<td>'.$row[MusicTable::COLUMN_GENRE].'</td>';
					echo'<td>'.$row[MusicTable::COLUMN_RUNTIME].'</td>';
					echo'<td>
					<a class="update" href="classes/UpdateMusic.php?id=' . $row[MusicTable::COLUMN_ID] . '"><button type="button" class="btn btn-danger btn-xs">Update</button></a>
					<a class="delete" href="classes/DeleteMusic.php?id=' . $row[MusicTable::COLUMN_ID] . '"><button type="button" class="btn btn-danger btn-xs">Delete</button></a>
					</td>';
					echo'</tr>';
					$row = $people->fetch();
			}

			echo'</table>';
			
			
?>
<div class="col-lg-12 text-center">
	<button type="button" class="btn btn-danger btn-md" onclick="window.location.href='musicForm.php'">Add new music</button>
	<a href="logout.php"><button type="button" class="btn btn-danger btn-md">Logout</button></a>

	</div>
</div>
</div>

  </body>

</html>