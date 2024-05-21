<?php
$uriArray = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uriSegments = explode("/", $uriArray); 
?>


<div class='navbar'>
    <h1>Selamat Datang <?php echo $sessionChecker->getEmail(); ?></h1>
    <div class="listPages">
        <a class="<?php if($uriSegments[2] == "index_perusahaan.php") echo "active" ?>" href='index_perusahaan.php'>Home</a>
        <a class="<?php if($uriSegments[2] == "listLoker_perusahaan.php") echo "active" ?>" href='listLoker_perusahaan.php'>List Loker</a>
        <a class="<?php if($uriSegments[2] == "tambahLoker.php") echo "active" ?>" href='tambahLoker.php'>Tambah Loker</a>
        <a class="" href="./php/logic/Logout.php">Logout</a>
    </div>
</div>