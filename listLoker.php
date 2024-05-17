<?php
    require_once('./php/logic/SessionChecker.php');
    $sessionChecker = new SessionChecker();

    require_once('./php/logic/Loker.php');
    $loker = new Loker();
    $loker = $loker->getLoker();

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

            <?php if ($reset == true) { echo "<a href='listLoker.php'>Reset</a>"; } ?>
        </form>

        <table>
            <thead>
                <tr>
                    <th >Profesi</th>
                    <th>Posisi</th>
                    <th>Gaji</th>
                    <th>Syarat Pendidikan</th>
                    <th>Lokasi</th>
                    <th>Usia Minimal</th>
                    <th>Usia Maksimal</th>
                    <th>Diprioritaskan untuk</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($loker as $row) : ?>
                    <tr>
                        <td><?php echo $row['profesi']; ?></td>
                        <td><?php echo $row['posisi']; ?></td>
                        <td><?php echo "Rp " . $row['gaji']; ?></td>
                        <td><?php echo $row['syaratpendidikan']; ?></td>
                        <td><?php echo $row['lokasi']; ?></td>
                        <td><?php echo $row['usiamin']; ?></td>
                        <td><?php echo $row['usiamax']; ?></td>
                        <td><?php echo $row['prioritasgender']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>