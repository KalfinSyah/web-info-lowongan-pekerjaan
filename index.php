<?php
    require_once('./php/logic/SessionChecker.php');
    $sessionChecker = new SessionChecker();

    require_once('./php/template/StructureHTML.php');
    $structureHTML = new StructureHTML();

    require_once('./php/logic/Loker.php');
    $loker = new Loker();
    $loker = $loker->getLoker();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lowongan Pekerjaan</title>
    <link rel="stylesheet" href="css/index.css">
    <script>
        function openUploadForm() {
            window.open('upload_cv.php', 'Upload CV', 'width=600,height=400');
        }
    </script>
</head>
<body>
    <?php require_once('./php/template/navbar.php'); ?>

    <div class="container">
        <p> Selamat datang di tempat di mana Anda dapat menjelajahi peluang karier yang menarik dan mendapatkan wawasan berharga tentang bagaimana mencari pekerjaan yang sesuai dengan keinginan dan keterampilan Anda. Di sini, Anda akan menemukan beragam lowongan pekerjaan yang menantang, serta tip-tips berguna untuk memperkuat strategi pencarian pekerjaan Anda. Mari bergabung dalam perjalanan menuju kesuksesan karier Anda, dan bersama-sama kita akan membuka pintu-pintu menuju masa depan yang cerah!</p>
        
        <h2>Daftar Lowongan Pekerjaan</h2>
        <table>
            <thead>
                <tr>
                    <th>Profesi</th>
                    <th>Posisi</th>
                    <th>Gaji</th>
                    <th>Syarat Pendidikan</th>
                    <th>Lokasi</th>
                    <th>Usia Minimal</th>
                    <th>Usia Maksimal</th>
                    <th>Diprioritaskan untuk</th>
                    <th>Apply</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < 3; $i++) : ?>
                    <?php $row = $loker[$i]; ?>
                    <tr>
                        <td><?php echo $row['profesi']; ?></td>
                        <td><?php echo $row['posisi']; ?></td>
                        <td><?php echo "Rp " . $row['gaji']; ?></td>
                        <td><?php echo $row['syaratpendidikan']; ?></td>
                        <td><?php echo $row['lokasi']; ?></td>
                        <td><?php echo $row['usiamin']; ?></td>
                        <td><?php echo $row['usiamax']; ?></td>
                        <td><?php echo $row['prioritasgender']; ?></td>
                        <td>
                            <button class="apply" onclick="openUploadForm()">Apply</button>
                        </td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>

        <h2>Tips Mencari Pekerjaan</h2>
        <p>Melangkah ke dunia pekerjaan yang dinamis seringkali membutuhkan lebih dari sekadar menyerahkan resume Anda. Inilah saatnya untuk mengasah strategi pencarian pekerjaan Anda sehingga Anda tidak hanya mencari pekerjaan, tetapi juga menempatkan diri Anda di jalur yang tepat untuk sukses.</p>
        <h3>1. Pahami Diri Anda</h3>
        <p>Sebelum Anda mulai mencari pekerjaan, penting untuk memahami kualifikasi dan keahlian Anda. Tinjau dengan cermat kualifikasi yang Anda miliki dan identifikasi kekuatan serta kelemahan Anda. Ini akan membantu Anda memilih pekerjaan yang sesuai dengan profil Anda.</p>
        <h3>2. Jelajahi Pilihan Karier</h3>
        <p>Perluas cakrawala Anda dengan mengeksplorasi berbagai bidang karier. Jangan terpaku pada satu jenis pekerjaan atau industri saja. Luaskan pengetahuan Anda tentang berbagai peluang karier yang tersedia dan pertimbangkan bagaimana keterampilan Anda dapat diaplikasikan dalam berbagai konteks.</p>
        <h3>3. Bangun Jaringan</h3>
        <p>Networking adalah kunci untuk membuka pintu-pintu peluang pekerjaan. Hadiri acara-acara industri, seminar, dan konferensi untuk memperluas jaringan Anda. Jangan ragu untuk berinteraksi dengan profesional lainnya dan jadilah aktif dalam komunitas Anda.</p>
        <p>Saat berinteraksi dengan orang baru, pastikan untuk menyampaikan informasi kontak Anda secara jelas. Berikan kartu nama yang mencakup informasi pribadi Anda, akun media sosial profesional, dan tautan ke profil profesional Anda.</p>
        <h3>4. Tingkatkan Keterampilan Anda</h3>
        <p>Selalu ada ruang untuk pertumbuhan dan pengembangan. Meningkatkan keterampilan Anda, baik keterampilan teknis maupun soft skills, akan meningkatkan daya tarik Anda sebagai kandidat pekerjaan.</p>
        <p>Investasikan waktu dan energi Anda dalam mengasah keterampilan seperti kemampuan berkomunikasi, kepemimpinan, manajemen waktu, serta keahlian dalam teknologi dan otomatisasi. Keterampilan yang kuat akan membuat Anda lebih unggul dalam lingkungan kerja yang kompetitif.</p>
        <p>Dengan mengikuti tips-tips ini dan mengambil langkah-langkah yang tepat, Anda akan meningkatkan peluang Anda untuk mencapai kesuksesan dalam pencarian pekerjaan. Ingatlah bahwa setiap langkah kecil menuju impian karier Anda memiliki potensi untuk membuka pintu menuju kesuksesan yang lebih besar!</p>
    </div>

    <?php echo $structureHTML->getBottomStructure(); ?>
</body>
</html>
