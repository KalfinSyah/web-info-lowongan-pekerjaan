
<?php 
$uriArray = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uriSegments = explode("/", $uriArray); 
?>

<div class='navbar'>
    <h1>Selamat Datang <?php echo $sessionChecker->getEmail(); ?></h1>
    <div class="listPages">
        <a class="<?php if($uriSegments[2] == "index.php") echo "active" ?>" href='index.php'>Home</a>
        <a class="<?php if($uriSegments[2] == "listLoker.php") echo "active" ?>" href='listLoker.php'>List Loker</a>
        <?php 
            if($_SESSION['user_type'] == "perusahaan" && $uriSegments[2] == "tambahLoker.php"){
                echo "<a class='active' href='tambahLoker.php'>Tambah Loker</a>";
            }elseif($_SESSION['user_type'] == "perusahaan"){
                echo "<a class='' href='tambahLoker.php'>Tambah Loker</a>";
            }
        ?>
        <a class="<?php if($uriSegments[2] == "tipsMencariPekerjaan.php") echo "active" ?>" href='tipsMencariPekerjaan.php'>Tips Mencari Pekerjaan</a>
        <a class="" href="./php/logic/Logout.php">Logout</a>
    </div>
</div>