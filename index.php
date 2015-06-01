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

<nav>
    <a href="labo.php?q=CESBIO" title="<?php echo "$name_labo[CESBIO]";?>" class="br-cesbio">CESBIO</a>
    

    <a href="labo.php?q=ECOLAB" title="<?php echo "$name_labo[ECOLAB]";?>" class="br-ecolab">ECOLAB</a>


    <a href="labo.php?q=IRAP" title="<?php echo "$name_labo[IRAP]";?>" class="br-irap">IRAP</a>


    <a href="labo.php?q=GET" title="<?php echo "$name_labo[GET]";?>" class="br-get">GET</a>
    

    <a href="labo.php?q=LA" title="<?php echo "$name_labo[LA]";?>" class="br-aerologie">AEROLOGIE</a>


    <a href="labo.php?q=LEGOS" title="<?php echo "$name_labo[LEGOS]";?>" class="br-legos">LEGOS</a>


    <a href="labo.php?q=TBL" title="<?php echo "$name_labo[TBL]";?>" class="br-tbl">TBL</a>

    <a href="labo.php?q=UMS831" title="<?php echo "$name_labo[UMS831]";?>" class="br-ums">UMS</a>
</nav>

</body>
</html>