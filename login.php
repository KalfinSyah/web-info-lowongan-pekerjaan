<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('./php/logic/Login.php');
    $login = new Login();
    $result = $login->login_user($_POST['role'], $_POST['email'], $_POST['password']);
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
                <label for="">Role</label>
                <select name="role" required>
                    <option value="akun_pencari_kerja">Pencari Kerja</option>
                    <option value="akun_perusahaan">Perusahaan</option>
                    <option value="akun_admin">Admin</option>
                </select>
            </div>
            <div>
                <label for="">Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label for="">Password</label>
                <input type="password" name="password" required>
            </div>
        </section>

        <p>
            <a href="register_pencari_kerja.php">buat akun pencari kerja</a>
            ,
            <a href="register_perusahaan.php">buat akun perusahaan</a>
            ,
            <a href="register_admin.php">buat akun admin</a>
        </p>
        <button type="submit">LOGIN</button>
    </form>
</body>
</html>
