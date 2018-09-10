<?php session_start(); $_SESSION['page-title'] = 'Sign up'; ?>

<?php require 'header.php'; ?>

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

<?php require 'footer.php'; ?>