<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>login</title>
</head>
<body>
    <nav class="navbar">
        <a href="index.php">Todolist</a>
    </nav>

   <div class="login">
    <form action="P_login.php" method="post">
        <h1>LOGIN</h1>

        <label for="">Username</label><br>
        <input type="text" name="username" id=""><br><br>

        <label for="">Password</label><br>
        <input type="password" name="password" id=""><br><br>

        <button type="submit">login</button><br><br>

        <p>Pengguna baru? <a href="register.php">Sign Up</a></p>
    </form>
    </div>
</body>
</html>