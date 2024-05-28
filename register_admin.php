<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('./php/logic/Register.php');
    $register = new Register();
    $result = $register->register_admin(
        $_POST['nama'], 
        $_POST['email'], 
        $_POST['password'], 
        $_POST['konfirmasi_password']
    );
    echo $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <title>Register Admin</title>
</head>
<body>
    <form action="register_admin.php" method="post">
        <section>
            <div>
                <label for="nama">Nama</label>
                <input type="text" name="nama" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <label for="konfirmasi_password">Konfirmasi Password</label>
                <input type="password" name="konfirmasi_password" required>
            </div>
        </section>

        <p>Sudah mempunyai akun? <a href="login.php">klik disini</a></p>

        <button type="submit">REGISTER</button>
    </form>
</body>
</html>
