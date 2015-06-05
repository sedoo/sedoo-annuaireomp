<?php
include ("parametres.php");
$searchUser=strtoupper($_POST['searchUser']);
$searchLabo=$_POST['searchLabo'];

$titlePage="Annuaire ".$name_labo[$searchLabo]."";
include("header.php");


?>

<h1>Résultat de la recherche pour :<small> <?php echo "".$searchUser."";?></small></h1>
<nav role="searchLabo">
    <?php
    include ("form-search-labo.php");
    ?>
    <a href="labo.php?q=<?php echo"".$searchValue."" ?>" title="revenir à la liste alphabétique">
       <span class="icon-search"></span> A-Z
       <p>Revenir à la liste alphabétique</p>
    </a>
    <a href="index.php" title="Cherchez dans un autre labo">
        <span class="icon-search"></span> OMP
        <p>Cherchez dans un autre labo</p>
    </a>
</nav>

<section class="ff-container-search">
    <ul id="group" class="list">
        <?php
        $searchFromLabo=true;
        include("searchResult.php");
        ?>
    </ul>

    <?php 
        if ($i=="0") {
        	echo "<blockquote><h2>Désolé, pas de résultat pour la recherche ".$searchUser."</h2></blockquote>";
        }
    ?>
</section>