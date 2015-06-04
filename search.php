<?php
include("header.php");
$name_file="listeWithPageProfil";
$ext_file=".csv";
$annuaire="".$name_file."".$ext_file."";
//$pageProfil="false";

//$dir="../annuaire-".$labo."";
$file_annuaire="".$annuaire."";

$acronymGroup = array(
    "SAR" => "Service Appui Recherche",
    "BIOGEOCHIM" => "Biogéochimie et transfert aux interfaces",
    "ECSECO" => "Ecotoxicologie et santé des écosystèmes",
    "CIRCE" => "Ecologie des communautés : interactions, interfaces & contraintes",
    "DYNABIO" => "Dynamique passée et actuelle de la biodiversité terrestre",
    "BIOREF" => "Biodiversité, réseaux trophiques et flux dans les écosystèmes auquatiques",
);
include ("parametres.php");

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
        include("searchResult.php");

        ?>
    </ul>

    <?php 
        if ($i=="0") {
        	echo "<blockquote><h2>Désolé, pas de résultat pour la recherche ".$searchUser."</h2></blockquote>";
        }
    ?>
</section>