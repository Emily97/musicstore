<!DOCTYPE>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
    </head>
    <body>
    <div class="row">
                <div class="col-lg-12">
                    <?php require 'utils/toolbar.php'; ?>
                </div>
            </div>
        <div class="container">
           
            
            <div class="row">
                <div class="col-lg-12">
                    <h1>Register Form</h1>
                    <div class="panel panel-default">
                    <div class="panel-body panel-background">
                    <?php
                    if (isset($errorMessage))
                        echo '<p class="error">'.$errorMessage.'</p>';
                    ?>
                    <form action="register.php" method="POST" role="form" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-3 form-label">
                                <label for="email" class="form-control-label">Email: </label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text"
                                       id="email"
                                       class="form-control"
                                       name="email"
                                       value="<?php if (isset($email)) echo $email; ?>"
                                       />
                            </div>
                            <div class="col-lg-3">
                                <span class="error">
                                    <?php if (isset($errors['email'])) echo $errors['email']; ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3 form-label">
                                <label for="password">Password: </label>
                            </div>
                            <div class="col-lg-6">
                                <input type="password"
                                       id="password"
                                       class="form-control"
                                       name="password"
                                       value=""
                                       />
                            </div>
                            <div class="col-lg-3">
                                <span class="error">
                                    <?php if (isset($errors['password'])) echo $errors['password']; ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3 form-label">
                                <label for="cpassword">Confirm Password: </label>
                            </div>
                            <div class="col-lg-6">
                                <input type="password"
                                       id="cpassword"
                                       class="form-control"
                                       name="cpassword"
                                       value=""
                                       />
                            </div>
                            <div class="col-lg-3">
                                <span class="error">
                                    <?php if (isset($errors['cpassword'])) echo $errors['cpassword']; ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3">
                            </div>
                            <div class="col-lg-6">
                                <input type="submit"
                                       class="form-control btn btn-default"
                                       value="Register"
                                       />
                                <!-- <p><a href="login_form.php" class="btn btn-link">Login</a></p> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php require 'utils/footer.php'; ?>
                </div>
            </div>
        </div>
    </body>
</html>
