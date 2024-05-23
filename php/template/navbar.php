<?php 
    require_once('./php/logic/SessionValueGetter.php');
    $sessionValueGetter = new SessionValueGetter();
?>

<?php if ($_SESSION['role'] == 'akun_pencari_kerja') : ?>
    <div class='navbar'>
        <h1>Selamat Datang <?php echo $sessionValueGetter->get_nama(); ?></h1>
        <div class="listPages">
            <a href='index.php'>Home</a>
            <a href='list_loker.php'>List Loker</a>
            <a href='history_pekerjaan_yang_telah_dilamar.php'>History Pekerjaan Yang Telah Dilamar</a>
            <a href='tips_mencari_pekerjaan.php'>Tips Mencari Pekerjaan</a>
            <a href="./php/logic/Logout.php">Logout</a>
        </div>
    </div>
<?php elseif ($_SESSION['role'] == 'akun_perusahaan') : ?>
    <div class='navbar'>
        <h1>Selamat Datang <?php echo $sessionValueGetter->get_nama(); ?></h1>
        <div class="listPages">
            <a href='index.php'>Home</a>
            <a href='list_loker_perusahaan.php'>List Loker Perusahaan</a>
            <a href='list_pelamar.php'>List Pelamar</a>
            <a href='tambah_loker.php'>Tambah Loker</a>
            <a href="./php/logic/Logout.php">Logout</a>
        </div>
    </div>
<?php endif; ?>