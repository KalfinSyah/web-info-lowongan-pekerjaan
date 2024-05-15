<?php
    require_once('./php/logic/SessionChecker.php');
    $sessionChecker = new SessionChecker();

    require_once('./php/logic/TipsMencariPekerjaan.php');
    $tipsMencariPekerjaan = new TipsMencariPekerjaan();
    $tipsMencariPekerjaan = $tipsMencariPekerjaan->getTips();
    
    require_once('./php/template/StructureHTML.php');
    $structureHTML = new StructureHTML();
?>

<?php echo $structureHTML->getTopStructure("Tips Mencari Pekerjaan", "css/index.css"); ?>

<?php require_once('./php/template/navbar.php'); ?>

<div class="container">
    <h2>Tips Mencari Pekerjaan</h2>
    <?php
        $counter = 0;
        foreach ($tipsMencariPekerjaan as $row) {
            echo "<p>" . $row . "</p>";
            $counter++;
            if ($counter >= 3) {
                break;
            }
        }
    ?>
</div>

<?php echo $structureHTML->getBottomStructure(); ?>