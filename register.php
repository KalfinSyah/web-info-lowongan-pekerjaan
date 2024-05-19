<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('./php/logic/Register.php');
    $register = new Register();
    $result = $register->register_user($_POST['nama'], $_POST['email'], $_POST['password'], $_POST['konfirmasi_password'], $_POST['role']);
    echo $result;
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
                <label for="">Role</label>
                <select name="role" required>
                    <option value="pencari_kerja">Pencari Kerja</option>
                    <option value="perusahaan">Perusahaan</option>
                </select>
            </div>
            <div>
                <label for="">Nama</label>
                <input type="text" name="nama" required>
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
                <label for="">Konfirmasi Password</label>
                <input type="password" name="konfirmasi_password" required>
            </div>
        </section>

        <p>Sudah mempunyai akun? <a href="login.php">klik disini</a></p>

        <button type="submit">REGISTER</button>
    </form>
</body>
</html>
