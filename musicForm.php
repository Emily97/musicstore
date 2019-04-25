<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta song="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Javascript -->
    <script type="text/javascript" src="js/myForm.js"></script>
    <script type="text/javascript" src="js/format.js"></script>
    <script type="text/javascript" src="js/valid.js"></script>
    <!-- Style Sheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
 
    <div class = "container">

      <h1>Emily's Form</h1>

        <div class="panel panel-default"><!--Opening class panel-panel-default-->

            <div class="panel-heading">
              <h3 class="panel-title">Music Form</h3>
            </div>
            <div class="panel-body"><!--Opening class panel-body-->


            <form action="musicProcess.php" method="post"><!--Opening Form-->
                <div class="form-group">
                  <label for="song">song</label>
                  <input type="text" class="form-control" id="song" name="song" placeholder="song" value="<?php
                     if (isset($formdata) && isset($formdata['song'])) echo $formdata['song']; 
                  ?>">
                  <p id="songError">
                    <?php if (isset($errors) && isset($errors['song'])) echo $errors['song']; ?>
                  </p>
                </div>
                <div class="form-group">
                  <label for="artist">artist</label>
                  <input type="text" class="form-control" id="artist" name ="artist" placeholder="artist" value = "<?php
                     if (isset($formdata) && isset($formdata['artist'])) echo $formdata['artist']; 
                  ?>">
                  <p id="artistError">
                    <?php if (isset($errors) && isset($errors['artist'])) echo $errors['artist']; ?>
                  </p>
                </div>

                <!-- album: HAPPENS IN PROCESS.PHP FILE: this is sanitized to make sure that no illegal characters are contained within the album address and if it a properly structured address -->
                <div class="form-group">
                  <label for="album">album</label>
                  <input type="text" class="form-control" id="album" name ="album" placeholder="album" value = "<?php
                     if (isset($formdata) && isset($formdata['album'])) echo $formdata['album']; 
                  ?>">
                  <p id="albumError">
                    <?php if (isset($errors) && isset($errors['album'])) echo $errors['album']; ?>
                  </p>
                </div>

                <!-- year input -->
                <div class="form-group">
                  <label for="text">Year</label>
                  <input type="text" class="form-control" id="year" name ="year" placeholder="year" value= "<?php
                     if (isset($formdata) && isset($formdata['year'])) echo $formdata['year']; 
                  ?>">
                  <p id="yearError">
                    <?php if (isset($errors) && isset($errors['year'])) echo $errors['year']; ?>
                  </p>
                </div>


                <!--this div contains checkboxes which requires user input-->
                <div class="form-group" id="genreGroup">
                  <label for="">Genre</label><br>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="genre[]" id="pop" value= "pop" <?php 
					if (isset($formdata) && isset($formdata['genre']) && is_array($formdata['genre']) && in_array("pop", $formdata['genre'])) echo 'checked'; 
					?>>
                    pop
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="genre[]" id="rock" value="rock" <?php 
					if (isset($formdata) && isset($formdata['genre']) && is_array($formdata['genre']) && in_array("rock", $formdata['genre'])) echo 'checked'; 
					?>>
                    rock
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="genre[]" id="rap" value="rap" <?php 
					if (isset($formdata) && isset($formdata['genre']) && is_array($formdata['genre']) && in_array("rap", $formdata['genre'])) echo 'checked'; 
					?>> 
                    rap
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="genre[]" id="indie" value="indie" <?php 
					if (isset($formdata) && isset($formdata['genre']) && is_array($formdata['genre']) && in_array("indie", $formdata['genre'])) echo 'checked'; 
					?>>
                    indie
                  </label>
                  <p class="errorMessage" id="genreError">
                     <?php if (isset($errors) && isset($errors['genre'])) echo $errors['genre']; ?>
                  </p>
                </div>
				
				<div class="form-group">
                  <label for="runtime">runtime</label>
                  <input type="text" class="form-control" id="runtime" name ="runtime" placeholder="runtime" value = "<?php
                     if (isset($formdata) && isset($formdata['runtime'])) echo $formdata['runtime']; 
                  ?>">
                  <p id="runtimeError">
                    <?php if (isset($errors) && isset($errors['runtime'])) echo $errors['runtime']; ?>
                  </p>
                </div>
                
                <button id="submit" class="btn btn-danger btn-lg">Submit</button>

              </form><!--Closing Form-->
          </div><!--Closing class panel-body-->
        </div><!--Closing class panel-panel-default-->


      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>

    </div>

  </body>

</html>