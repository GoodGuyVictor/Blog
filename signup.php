<?php

    session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Signup</title>
    <style>
        .container {
            width: 30%;
            padding-top: 50px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 align="center">Create your account</h1>
    <div class="error-message"><?php echo $_SESSION["error-message"]; ?></div>
    <br>
    <form action="authentication-script.php" method="post">
        <fieldset class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control">
        </fieldset>

        <fieldset class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control">
        </fieldset>

        <fieldset class="form-group">
            <label for="repeat-password">Re-enter password</label>
            <input type="password" id="repeat-password" name="repeat-password" class="form-control">
        </fieldset>

        <fieldset class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control">
        </fieldset>
        <br>
        <label for="signup" class="sr-only">Signup</label>
        <input type="checkbox" id="signup" class="form-check-input sr-only" name="signup" checked>

        <input type="submit" class="btn btn-success" value="Create">
    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>