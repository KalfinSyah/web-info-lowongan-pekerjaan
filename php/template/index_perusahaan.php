<?php
    require_once('./php/logic/MysqliQuery.php');
    $mysqliQuery = new MysqliQuery();
    $loker = $mysqliQuery->get_loker_for_index_perusahaan($_SESSION['id']);
    $list_pelamar = $mysqliQuery->get_pelamar_waktu_and_nama_pelamar_by_id_perusahaan($_SESSION['id']);
?>
    
<div class="ip-con">
    <div class="ip-ket">
        <p>Selamat datang, kami sangat senang menyambut Anda, perusahaan terhormat, di platform kami. Terima kasih telah bergabung dan mempercayakan kebutuhan rekrutmen Anda kepada kami. Web Info Loker hadir untuk memudahkan proses pencarian kandidat terbaik yang sesuai dengan kebutuhan perusahaan Anda. Kami berkomitmen untuk memberikan layanan terbaik dan mendukung kesuksesan rekrutmen Anda. Jika Anda memerlukan bantuan atau memiliki pertanyaan, jangan ragu untuk menghubungi tim dukungan kami. Selamat menggunakan platform Web Info Loker dan semoga Anda menemukan kandidat yang tepat untuk bergabung dengan tim Anda!</p>
    </div>

    <div class="ip-dlp">
        <h2 class="ip-dlp-title">Daftar Lowongan Pekerjaan Perusahaan Anda Saat ini</h2>
        <table class="index-table">
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

    <div class="ip-h">
        <h2 class="ip-h-title">List Pelamar Di Perusahaan Anda Saat Ini</h2>
        <table class="index-table">
            <thead>
                <tr>
                    <th>Waktu Melamar</th>
                    <th>Nama Pelamar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list_pelamar as $row) : ?>
                    <tr>
                        <td><?php echo $row['waktu_melamar'];   ?></td>
                        <td><?php echo $row['nama'];            ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

