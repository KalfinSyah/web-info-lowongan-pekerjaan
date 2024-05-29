<?php
    require_once('./php/logic/SessionChecker.php');
    $sessionChecker = new SessionChecker();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once('./php/logic/TambahTipsMencariPekerjaan.php');
        $tipsMencariPekerjaan = new TambahTipsMencariPekerjaan();
        $tipsMencariPekerjaan->insert_data_tips_mencari_pekerjaan($_POST['tips']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Tambah Tips Mencari Pekerjaa</title>
</head>
<body>
    <?php require_once('./php/template/navbar.php'); ?>

    <div class="container">

        <form action="" method="post" class="formTambahLoker">
            <h2>Tambah Lowongan Pekerjaan</h2>

            <label for="profesi">Tips</label><br><br>
            <textarea name="tips" id=""></textarea><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>