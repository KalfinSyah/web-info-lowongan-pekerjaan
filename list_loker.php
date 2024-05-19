<?php
    require_once('./php/logic/SessionChecker.php');
    $sessionChecker = new SessionChecker();

    require_once('./php/logic/Loker.php');
    $loker = new Loker();
    $loker = $loker->get_loker();

    require_once('./php/logic/Users.php');
    $users = new Users();

    require_once('./php/logic/History.php');
    $history = new History();

    $reset = false;
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET["searchresult"]) && isset($_GET["category"])) {
            require_once('./php/logic/ListLokerSearchResult.php');
            $searchResult = new ListLokerSearchResult();
            $loker = $searchResult->getSearchResult($_GET["searchresult"], $_GET["category"]);
            $reset = true;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>List Loker</title>
</head>
<body>
    <?php require_once('./php/template/navbar.php'); ?>
    
    <div class="container">
        <div class="allDaftarLokerDiv">
            <h2>Daftar Lowongan Pekerjaan</h2>

            <form action="" method="get">
                <select name="category">
                    <option value="profesi">Profesi</option>
                    <option value="posisi">Posisi</option>
                    <option value="gaji">Gaji</option>
                    <option value="syaratpendidikan">Syarat Pendidikan</option>
                    <option value="lokasi">Lokasi</option>
                    <option value="usiamin">Usia Minimal</option>
                    <option value="usiamax">Usia Maksimal</option>
                    <option value="prioritasgender">Gender</option>
                </select>
                
                <input type="text" name="searchresult" id="">
                <input type="submit" value="Submit">

                <?php if ($reset == true) { echo "<a href='list_loker.php' class='reset'>Reset</a>"; } ?>
            </form>
        </div>

        <table class="tabelAllDaftarLoker">
            <thead>
                <tr>
                    <th >Profesi</th>
                    <th>Posisi</th>
                    <th>Perusahaan</th>
                    <th>Gaji</th>
                    <th>Syarat Pendidikan</th>
                    <th>Lokasi</th>
                    <th>Usia Minimal</th>
                    <th>Usia Maksimal</th>
                    <th>Diprioritaskan Untuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($loker as $row) : ?>
                    <?php 
                        $nama_perusahaan = $users->get_nama_perusahaan_with_id_perusahaan($row['id_perusahaan']); 
                        $pencari_pekerja_history = $history->get_history_with_id_pekerja_and_id_loker($_SESSION['id'], $row['id']);
                    ?>
                    <tr>
                        <td><?php echo $row['profesi']; ?></td>
                        <td><?php echo $row['posisi']; ?></td>
                        <td><?php echo $nama_perusahaan[0]['nama']; ?></td>
                        <td><?php echo "Rp " . $row['gaji']; ?></td>
                        <td><?php echo $row['syaratpendidikan']; ?></td>
                        <td><?php echo $row['lokasi']; ?></td>
                        <td><?php echo $row['usiamin']; ?></td>
                        <td><?php echo $row['usiamax']; ?></td>
                        <td><?php echo $row['prioritasgender']; ?></td>
                        <?php if (empty($pencari_pekerja_history)) : ?>
                            <td>
                            
                                <form action="upload_cv.php" method="post">
                                    <input type="hidden" name="id_loker" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="id_perusahaan" value="<?php echo $row['id_perusahaan']; ?>"> 
                                    <button type="submit">Apply</button>
                                </form>
                            </td>
                        <?php else: ?>
                            <td class="<?php echo $pencari_pekerja_history[0]['status']; ?>">
                                <?php echo $pencari_pekerja_history[0]['status']; ?>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>