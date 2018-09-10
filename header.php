<?php session_start(); ?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Css File -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto+Condensed" rel="stylesheet">
    <title><?php echo $_SESSION['page-title']; ?></title>
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background:#3b3b3b; border-bottom:4px solid black;">
        <a class="navbar-brand" href="index.php">Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu p-0" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider p-0 m-0"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>

            <div class="login-profile-btn">
                <?php if($_SESSION["logged_in"]): ?>
                    <div class="dropdown" id="profile-dropdown">
                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION["username"]; ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">My profile</a>
                            <a class="dropdown-item" href="new-post.php">New post</a>
                            <a class="dropdown-item" href="logout.php">Log out</a>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="#" class="nav-link btn" data-toggle="modal" data-target="#loginIn" style="background:#FFC107; color:black;">Log in</a>
                <?php endif ?>
            </div>
        </div>
    </nav>
    
    <!-- Form Login in-->
    
   <div class="modal fade" id="loginIn" tabindex="-1" role="dialog" aria-labelledby="loginIn" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="loginInLabel">Авторизация</h5>
                   <button class="close" type="button" data-dismiss="modal" aria-label="close"><span aria-hidden="true">X</span></button>
               </div>
               <div class="modal-body">
                   <div class="container-fluid">
                       <form action="authentication-script.php" method="post">
                           <label for="username" class="sr-only">Username</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">

                            <label for="login" class="sr-only">Login</label>
                            <input type="checkbox" id="login" class="form-check-input sr-only" name="login" checked>
                            <input type="submit" class="btn btn-success w-100" value="Log In">     
                        </form>
                   </div>
               </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <b>Don't have account?!</b><a href="signup.php" class="btn btn-link text-center">Create Now!</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>