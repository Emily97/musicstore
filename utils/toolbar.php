<nav class="navbar navbar-default">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
        <?php
        require_once 'utils/session.php';

        if (!is_logged_in()) {
            echo '<li class="centreLi"><a href="register_form.php">Register</a></li>';
            echo '<li class="centreLi"><a href="index.php">Login</a></li>';
        }
        else {
            echo '<li><a href="home.php">Home</a></li>';
            echo '<li><a href="viewManagers.php">Managers</a></li>';
            echo '<li><a href="viewProgrammers.php">Programmers</a></li>';
            echo '<li><a href="viewProjects.php">Projects</a></li>';
            echo '<li><a href="logout.php">Logout</a></li>';
        }
        ?>
        </ul>
        <h1 class="header1">music database</h1>
    </div><!-- /.navbar-collapse -->
</nav>
