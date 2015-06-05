<?php

/*==== PARAMETRES
============================*/

$name_file="listeWithPageProfil";
$ext_file=".csv";
//$annuaire="".$name_file."".$ext_file."";
//$file_annuaire="".$annuaire."";
$file_annuaire="".$name_file."".$ext_file."";

$name_labo=array(
	"CESBIO" => "Centre d'Etudes Spatiales de la BIOsphère - CESBIO - UMR 5126",
    "ECOLAB" => "Laboratoire d'Ecologie Fonctionnelle et Environnement - ECOLAB - UMR 5245",
    "GET" => "Géosciences Environnement Toulouse - GET - UMR 5563",
    "IRAP" => "Institut de Recherche en Astrophysique et Planétologie - IRAP - UMR 5277",
    "LA" => "Laboratoire d'Aérologie - LA - UMR 5560",
    "LEGOS" => "Laboratoire d'Etudes Géospatiales de l'Océan et des surfaces - LEGOS - UMR 5566",
    "TBL" => "Télescope Bernard Lyot - TBL - UMR 5566",
    "UMS831" => "Unité Mixte de Services -UMS 831",
);

$acronymGroup = array(
    "SAR" => "Service Appui Recherche",
    "BIOGEOCHIM" => "Biogéochimie et transfert aux interfaces",
    "ECSECO" => "Ecotoxicologie et santé des écosystèmes",
    "CIRCE" => "Ecologie des communautés : interactions, interfaces & contraintes",
    "DYNABIO" => "Dynamique passée et actuelle de la biodiversité terrestre",
    "BIOREF" => "Biodiversité, réseaux trophiques et flux dans les écosystèmes auquatiques",
);

$url_labo=array(
    "CESBIO" => "http://www.cesbio.ups-tlse.fr",
    "ECOLAB" => "http://www.ecolab.omp.eu/",
    "GET" => "http://www.get.obs-mip.fr/",
    "IRAP" => "http://www.irap.omp.eu/",
    "LA" => "http://www.aero.obs-mip.fr/",
    "LEGOS" => "http://www.legos.obs-mip.fr/",
    "TBL" => "http://tbl.omp.eu/",
    "UMS831" => "http://www.obs-mip.fr/",
);

// === LANGUES
$locale=array(
	"fr" => "fre-FR",
	"en" => "eng-GB",
	"es" => "esl-ES",
);

?>