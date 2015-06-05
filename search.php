<?php
include ("parametres.php");
$titlePage="Annuaire OMP";
include("header.php");

$searchUser=strtoupper($_POST['searchUser']);

?>

<h1> Résultat de la recherche pour :<small> <?php echo "".$searchUser."";?></small></h1>
<nav role="searchOMP">
	<?php
	include ("form-search.php");
	?>
	<a href="index.php" title="Cherchez dans un autre labo"><span class="icon-search"></span> Rechercher par laboratoire</a>
</nav>
<section class="ff-container-search">
<ul id="group" class="list">

        <?php
        $searchFromLabo=false;
        include("searchResult.php");
        ?>
    </ul>

    <?php 
        if ($i=="0") {
        	echo "<blockquote><h2>Désolé, pas de résultat pour la recherche ".$searchUser."</h2></blockquote>";
        }
    ?>
</section>