<?php
    require_once('./php/logic/SessionChecker.php');
    $sessionChecker = new SessionChecker();

    require_once('./php/logic/History.php');
    $history = new History();
    $history = $history->get_specific_history_with_id_perusahaan($_SESSION['id']);

    require_once('./php/logic/Loker.php');
    $loker = new Loker();

    require_once('./php/logic/Users.php');
    $users = new Users();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['id_pencari_kerja']) && isset($_POST['perusahaan_action'])) {
            require_once('./php/logic/Lamaran.php');
            $lamaran = new Lamaran();
            $lamaran->set_status($_POST['id_pencari_kerja'], $_POST['id_loker'], $_POST['perusahaan_action']);
        }
        
        if (isset($_POST["lihat_cv"])) {
            require_once('./php/logic/ReadPDF.php');
            $readPDF = new ReadPDF($_POST['lihat_cv']);
        }
    }
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
            <h2>List Pelamar</h2>
            <table class="tabelHistory">
                <thead>
                    <tr>
                        <th>Waktu Melamar</th>
                        <th>ID Pelamar</th>
                        <th>Nama Pelamar</th>
                        <th>Profesi</th>
                        <th>Posisi</th>
                        <th>CV</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($history as $row) : ?>
                        <?php 
                        $nama = $users->get_user_with_id_pencari_kerja($row['id_pencari_kerja']); 
                        $info_loker = $loker->get_specific_id_loker_with_id_perusahaan($row['id_loker'], $row['id_perusahaan']);
                        $status_class = strtolower($row['status']);
                        ?>
                        <tr>
                            <th><?php echo htmlspecialchars($row['waktu_melamar']); ?></th>
                            <td><?php echo htmlspecialchars($row['id_pencari_kerja']); ?></td>
                            <td><?php echo htmlspecialchars($nama[0]['nama']); ?></td>
                            <td><?php echo htmlspecialchars($info_loker[0]['profesi']); ?></td>
                            <td><?php echo htmlspecialchars($info_loker[0]['posisi']); ?></td>
                            <td>
                                <form action="" method="post">
                                    <button type="submit" name="lihat_cv" value="<?php echo htmlspecialchars($row['nama_file']); ?>">Lihat CV</button>
                                </form>
                            </td>
                            <td class="<?php echo htmlspecialchars($status_class); ?>">
                                <?php if ($row['status'] == 'pending') : ?>
                                    <form action="" method="post">
                                        <input type="hidden" name="id_pencari_kerja" value="<?php echo htmlspecialchars($row['id_pencari_kerja']); ?>">
                                        <input type="hidden" name="id_loker" value="<?php echo htmlspecialchars($row['id_loker']); ?>">
                                        <button type="submit" name="perusahaan_action" value="diterima">terima</button>
                                        <button type="submit" name="perusahaan_action" value="ditolak">tolak</button>
                                    </form>
                                <?php else: ?>
                                    <?php echo htmlspecialchars($row['status']); ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
