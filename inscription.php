<!DOCTYPE html>
<meta charset="UTF-8">

<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="rstyle.css">
</head>

<body>
    <?php if ($error_message): ?>
        <div class="alert alert-danger">
            <?php echo ($error_message) ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <div>
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>
        <div>
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <input type="submit" value="Login">
    </form>
</body>

</html>