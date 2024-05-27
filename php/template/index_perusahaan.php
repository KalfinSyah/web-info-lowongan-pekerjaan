<?php
    require_once('./php/logic/MysqliQuery.php');
    $mysqliQuery = new MysqliQuery();
    $loker = $mysqliQuery->get_loker_for_index_perusahaan($_SESSION['id']);
    $list_pelamar = $mysqliQuery->get_pelamar_waktu_and_nama_pelamar_by_id_perusahaan($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Dashboard Perusahaan</title>
</head>
<body>
    <?php require_once('./php/template/navbar.php'); ?>
    
    <div class="daftarLokerDivHome">
        <h2>Daftar Lowongan Pekerjaan Perusahaan Anda Saat ini</h2>
        <table>
            <thead>
                <tr>
                    <th>Profesi</th>
                    <th>Posisi</th>
                    <th>Gaji/Bulan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($loker as $row) : ?>
                    <tr>
                        <td><?php echo $row['profesi']; ?></td>
                        <td><?php echo $row['posisi']; ?></td>
                        <td><?php echo "Rp " . $row['gaji']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="historyDiv">
        <h2>List Pelamar Di Perusahaan Anda Saat Ini</h2>
        <table class="tabelHistory">
            <thead>
                <tr>
                    <th>Waktu Melamar</th>
                    <th>Nama Pelamar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list_pelamar as $row) : ?>
                    <tr>
                        <th><?php echo $row['waktu_melamar'];   ?></th>
                        <td><?php echo $row['nama'];            ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>

