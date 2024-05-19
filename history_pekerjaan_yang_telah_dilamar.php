<?php
    require_once('./php/logic/SessionChecker.php');
    $sessionChecker = new SessionChecker();

    require_once('./php/logic/History.php');
    $history = new History();
    $history = $history->get_specific_id_pencari_kerja_history($_SESSION['id']);

    require_once('./php/logic/Loker.php');
    $loker = new Loker();

    require_once('./php/logic/Users.php');
    $users = new Users();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <?php require_once('./php/template/navbar.php'); ?>

    <div class="container">
        <div class="historyDiv">
            <h2>History Pekerjaan Yang Telah Dilamar</h2>
            <table class="tabelHistory">
                <thead>
                    <tr>
                        <th>Waktu Melamar</th>
                        <th>Profesi</th>
                        <th>Posisi</th>
                        <th>Perusahaan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($history as $row) : ?>
                        <?php 
                        $loker_details = $loker->get_specific_loker($row['id_loker']); 
                        $status_class = strtolower($row['status']);
                        $nama_perusahaan = $users->get_nama_perusahaan_with_id_perusahaan($row['id_perusahaan']); 
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['waktu_melamar']); ?></td>
                            <td><?php echo htmlspecialchars($loker_details[0]['profesi']); ?></td>
                            <td><?php echo htmlspecialchars($loker_details[0]['posisi']); ?></td>
                            <td><?php echo htmlspecialchars($nama_perusahaan[0]['nama']); ?></td>
                            <td class="<?php echo htmlspecialchars($status_class); ?>">
                                <?php echo htmlspecialchars($row['status']); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
