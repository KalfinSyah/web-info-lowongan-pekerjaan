<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('./php/logic/Login.php');
    $login = new Login();
    $result = $login->login_user($_POST['email'], $_POST['password']);
    echo $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="post">
        <section>
            <div>
                <label for="">Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label for="">Password</label>
                <input type="password" name="password" required>
            </div>
        </section>

        <p>Belum mempunyai akun? <a href="register.php">klik disini</a></p>

        <button type="submit">LOGIN</button>
    </form>
</body>
</html>
