<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>register</title>
</head>
<body>
    <nav class="navbar">
        <a href="index.php">Todolist</a>
    </nav>

    <div class="register">
    <form action="P_register.php" method="POST">
        <h1>Daftar Pengguna Baru</h1>

        <label for="">Nama Lengkap</label><br>
        <input type="text" name="name" ><br><br>

        <label for="">Email</label><br>
        <input type="text" name="email" ><br><br>

        <label for="">Username</label><br>
        <input type="text" name="username" ><br><br>

        <label for="">Password</label><br>
        <input type="password" name="password" ><br><br>

        <label for="">Tanggal Lahir</label><br>
        <input type="date" name="birth_date" ><br><br>

        <button type="submit">Daftar</button><br><br>

        <p>sudah punya akun? <a href="login.php">Login di sini</a></p>
    </form>
    </div>
</body>
</html>