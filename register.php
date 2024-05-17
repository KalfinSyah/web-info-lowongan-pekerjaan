<?php
require_once('./php/template/StructureHTML.php');
$structureHTML = new StructureHTML();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('./php/logic/Register.php');
    $register = new Register();
    $register->registerUser($_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirmpassword'], $_POST['role']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <title>Register</title>
</head>
<body>
    <form action="register.php" method="post">
        <section>
            <div>
                <label for="">Username</label>
                <input type="text" name="username" required>
            </div>
            <div>
                <label for="">Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label for="">Password</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <label for="">Confirm Password</label>
                <input type="password" name="confirmpassword" required>
            </div>
            <div>
                <label for="">Role</label>
                <select name="user_type" required>
                    <option value="pencarikerja">Pencari Kerja</option>
                    <option value="perusahaan">Perusahaan</option>
                </select>
            </div>
        </section>

        <p>Sudah mempunyai akun? <a href="login.php">klik disini</a></p>

        <button type="submit">REGISTER</button>
    </form>
</body>
</html>
