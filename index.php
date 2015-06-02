<?php
include("header.php");

/*
$name_file="listeWithPageProfil";
$ext_file=".csv";
$annuaire="".$name_file."".$ext_file."";
$file_annuaire="".$annuaire."";
*/
include ("parametres.php");

include ("form-search.php");
?>


<h2>Liste complète par laboratoire</h2>
<p> Cliquez sur le laboratoire de votre choix</p>

<nav role="annuaireIndex">
    <a href="labo.php?q=CESBIO" title="<?php echo "$name_labo[CESBIO]";?>" class="br-cesbio">CESBIO
    <span><?php echo "$name_labo[CESBIO]";?></span></a>
    

    <a href="labo.php?q=ECOLAB" title="<?php echo "$name_labo[ECOLAB]";?>" class="br-ecolab">ECOLAB
    <span><?php echo "$name_labo[ECOLAB]";?></span></a>

    <a href="labo.php?q=IRAP" title="<?php echo "$name_labo[IRAP]";?>" class="br-irap">IRAP
    <span><?php echo "$name_labo[IRAP]";?></span></a>

    <a href="labo.php?q=GET" title="<?php echo "$name_labo[GET]";?>" class="br-get">GET
    <span><?php echo "$name_labo[GET]";?></span></a>

    <a href="labo.php?q=LA" title="<?php echo "$name_labo[LA]";?>" class="br-aerologie">AEROLOGIE
    <span><?php echo "$name_labo[LA]";?></span></a>

    <a href="labo.php?q=LEGOS" title="<?php echo "$name_labo[LEGOS]";?>" class="br-legos">LEGOS
    <span><?php echo "$name_labo[LEGOS]";?></span></a>

    <a href="labo.php?q=TBL" title="<?php echo "$name_labo[TBL]";?>" class="br-tbl">TBL
    <span><?php echo "$name_labo[TBL]";?></span></a>

    <a href="labo.php?q=UMS831" title="<?php echo "$name_labo[UMS831]";?>" class="br-ums">UMS
    <span><?php echo "$name_labo[UMS831]";?></span></a>
</nav>

</body>
</html>