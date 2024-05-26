<?php
    require_once('./php/logic/SessionChecker.php');
    $sessionChecker = new SessionChecker();
    $foto_profil =  $_SESSION['foto_profil'];
    $nama =  $_SESSION['nama'];

    if ($_SESSION['role'] == 'akun_pencari_kerja')  {
        $gender =  $_SESSION['gender'];
        $tanggal_lahir = $_SESSION['tanggal_lahir'];
        $usia =  $_SESSION['usia'];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_profil"])) {
        require_once('./php/logic/UpdateProfile.php');
        $updateProfile = new UpdateProfile();
        if  ($_SESSION['role'] == 'akun_pencari_kerja') {
            if (!empty($_FILES['foto_profil_user']['name'])) {
                $updateProfile->update_pencari_kerja_profile_with__foto_profile(
                    $_POST['nama'],
                    $_POST['tanggal_lahir'],
                    $_POST['gender'],
                    $_FILES['foto_profil_user'], 
                    $_POST['id_pencari_kerja']
                );
            } else {
                $updateProfile->update_pencari_kerja_profile_without__foto_profile(
                    $_POST['nama'],
                    $_POST['tanggal_lahir'],
                    $_POST['gender'],
                    $_POST['id_pencari_kerja']
                );
            }
        } elseif ($_SESSION['role'] == 'akun_perusahaan') {
            if (!empty($_FILES['foto_profil_user']['name'])) {
                $updateProfile->update_perusahaan_profile_with__foto_profile(
                    $_POST['nama'],
                    $_FILES['foto_profil_user'], 
                    $_POST['id_pencari_kerja']
                );
            } else {
                $updateProfile->update_perusahaan_profile_without__foto_profile(
                    $_POST['nama'],
                    $_POST['id_pencari_kerja']
                );
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_pencari_kerja" value="<?php echo $_SESSION['id']; ?>">

        <img src="./uploads/foto_profil/<?php echo $_SESSION['role']; ?>/<?php echo $foto_profil; ?>" alt=""> <br><br>
        <label>(png, max 5mb)</label>
        <input type="file" name="foto_profil_user" accept=".png"> <br><br>

        <label for="">Nama</label>
        <input type="text" name="nama" id="" value="<?php echo $nama; ?>" required> <br><br>

        <?php if ($_SESSION['role'] == 'akun_pencari_kerja') : ?>
            <label for="gender">Gender</label>
            <select name="gender" required>
                <option value="Pria" <?php if ($gender == 'Pria') echo 'selected'; ?>>Pria</option>
                <option value="Wanita" <?php if ($gender == 'Wanita') echo 'selected'; ?>>Wanita</option>
            </select> <br><br>

            <label for="">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="" value="<?php echo $tanggal_lahir ?>" required> <br>

            <p>Usia <?php echo $usia; ?></p>
        <?php endif; ?>

        <button type="submit" name="update_profil">Submit Perubahan</button> <br><br>
    </form>
    <a href="index.php">Kembali ke index</a>
</body>
</html>