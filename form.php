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
              <h3 class="panel-title">Bootstrap Form</h3>
            </div>
            <div class="panel-body"><!--Opening class panel-body-->


            <form action="process.php" method="post"><!--Opening Form-->
                <div class="form-group">
                  <label for="username">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php
                     if (isset($formdata) && isset($formdata['name'])) echo $formdata['name']; 
                  ?>">
                  <p id="nameError">
                    <?php if (isset($errors) && isset($errors['name'])) echo $errors['name']; ?>
                  </p>
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name ="username" placeholder="Username" value = "<?php
                     if (isset($formdata) && isset($formdata['username'])) echo $formdata['username']; 
                  ?>">
                  <p id="usernameError">
                    <?php if (isset($errors) && isset($errors['username'])) echo $errors['username']; ?>
                  </p>
                </div>

                <!-- email: HAPPENS IN PROCESS.PHP FILE: this is sanitized to make sure that no illegal characters are contained within the email address and if it a properly structured address -->
                <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="text" class="form-control" id="email" name ="email" placeholder="Email" value = "<?php
                     if (isset($formdata) && isset($formdata['email'])) echo $formdata['email']; 
                  ?>">
                  <p id="emailError">
                    <?php if (isset($errors) && isset($errors['email'])) echo $errors['email']; ?>
                  </p>
                </div>

                <!-- password input -->
                <div class="form-group">
                  <label for="text">Password</label>
                  <input type="password" class="form-control" id="password" name ="password" placeholder="Password" value= "<?php
                     if (isset($formdata) && isset($formdata['password'])) echo $formdata['password']; 
                  ?>">
                  <p id="passwordError">
                    <?php if (isset($errors) && isset($errors['password'])) echo $errors['password']; ?>
                  </p>
                </div>


                <!--this div contains checkboxes which requires user input-->
                <div class="form-group" id="langGroup">
                  <label for="">Languages</label><br>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="lang[]" id="cplusplus" value= "cplusplus" <?php 
					if (isset($formdata) && isset($formdata['lang']) && is_array($formdata['lang']) && in_array("cplusplus", $formdata['lang'])) echo 'checked'; 
					?>>
                    C++
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="lang[]" id="java" value="java" <?php 
					if (isset($formdata) && isset($formdata['lang']) && is_array($formdata['lang']) && in_array("java", $formdata['lang'])) echo 'checked'; 
					?>>
                    Java
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="lang[]" id="python" value="python" <?php 
					if (isset($formdata) && isset($formdata['lang']) && is_array($formdata['lang']) && in_array("python", $formdata['lang'])) echo 'checked'; 
					?>> 
                    Python
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="lang[]" id="php" value="php" <?php 
					if (isset($formdata) && isset($formdata['lang']) && is_array($formdata['lang']) && in_array("php", $formdata['lang'])) echo 'checked'; 
					?>>
                    PHP
                  </label>
                  <p class="errorMessage" id="langError">
                     <?php if (isset($errors) && isset($errors['lang'])) echo $errors['lang']; ?>
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