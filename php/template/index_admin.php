<?php
    require_once('./php/logic/MysqliQuery.php');
    $mysqliQuery = new MysqliQuery();
    $akun_pencari_kerja = $mysqliQuery->get_akun_pencari_kerja_for_index_admin();
    $akun_perusahan = $mysqliQuery->get_akun_perusahaan_for_index_admin();
?>

<p id="welcoming">Selamat Datang <?php echo $_SESSION['nama']; ?></p>
                
<div class="tipsMencariPekerjaanHome">
    <h1>Akun Pencari Kerja</h1>

    <table>
        <tr>
            <td>Foto Profil</td>
            <td>Nama</td>
            <td>Tanggal Lahir</td>
            <td>Gender</td>
            <td>Email</td>
        </tr>
        <?php foreach ($akun_pencari_kerja as $row) : ?>
            <tr>
                <td>
                    <img src="uploads/foto_profil/akun_pencari_kerja/<?php echo $row['foto_profil']; ?>" alt="pencari_kerja_img" width="100" height="100" srcset="">
                </td>
                <td><?php echo $row["nama"]; ?></td>
                <td><?php echo $row["tanggal_lahir"]; ?></td>
                <td><?php echo $row["gender"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div> 

<div class="tipsMencariPekerjaanHome">
    <h1>Akun Perusahaan</h1>

    <table>
        <tr>
            <td>Foto Profil</td>
            <td>Nama</td>
        </tr>
        <?php foreach ($akun_perusahan as $row) : ?>
            <tr>
                <td>
                    <img src="uploads/foto_profil/akun_perusahaan/<?php echo $row['foto_profil']; ?>" alt="pencari_kerja_img" width="100" height="100" srcset="">
                </td>
                <td><?php echo $row["nama"]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div> 