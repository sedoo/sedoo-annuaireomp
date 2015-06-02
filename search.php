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
        $i=0;
        $file=fopen($file_annuaire, "r");
        while(!feof($file)) 
        {
            
            $ligne=fgets($file, 10000);
            $data=explode(";",$ligne);
            if (array_key_exists (0, $data)){$labo=$data[0];}
            if (array_key_exists (1, $data)){$nom=strtoupper($data[1]);}
            if (array_key_exists (2, $data)){$prenom=strtoupper($data[2]);}
            if (array_key_exists (3, $data)){$mail=explode("@", $data[3]);}
            if (array_key_exists (4, $data)){$tel=explode(",",$data[4]);}
            if (array_key_exists (5, $data)){$bureau=explode(",",$data[5]);}
            if (array_key_exists (6, $data)){$site=$data[6];}
            if (array_key_exists (7, $data)){$status=$data[7];}
            if (array_key_exists (8, $data)){$equipe=explode(",",$data[8]);}
            if (array_key_exists (10, $data)){$pageProfil=$data[10];}

            if ($nom===$searchUser)
            {
            ///// remplacement DE TOUS LES ESPACES par des "-" sur NOM PRENOM
            $nom_url=str_replace(" ", "-", $nom);
            $prenom_url=str_replace(" ", "-", $prenom);

                switch ($labo) {
                    //////////////////////////////////////////////////////////////////////////
                    case "CESBIO":
                        $classe = "cesbio"; 
                        if ((strcmp($pageProfil, "true")) > 0)
                        {
                            $url_profil=$url_labo[CESBIO]."profils/".$nom_url."_".$prenom_url;
                        }                   
                    break;
                    //////////////////////////////////////////////////////////////////////////
                    case "ECOLAB":
                        $classe = "ecolab";  
                        if ((strcmp($pageProfil, "true")) > 0)
                        {
                            $url_profil=$url_labo[ECOLAB]."profils/".$nom_url."_".$prenom_url;
                        }          
                    break;
                    //////////////////////////////////////////////////////////////////////////
                    case "IRAP":
                        $classe = "irap"; 
                        if ((strcmp($pageProfil, "true")) > 0)
                        {
                            $url_profil=$url_labo[IRAP]."profils/".$nom_url."_".$prenom_url;
                        } 
                    break;
                    //////////////////////////////////////////////////////////////////////////
                    case "GET":
                        $classe = "get";           
                        if ((strcmp($pageProfil, "true")) > 0)
                        {
                            if (($nom == "GUILLAUME")&&($prenom == "ANNE-MAGALI"))
                            {
                            $url_profil=$url_labo[$q]."profils/Seydoux-Guillaume_Anne-Magali";
                            }
                            else
                            {
                            $url_profil=$url_labo[GET]."profils/".$nom_url."_".$prenom_url;
                            }
                        }
                    break;
                    //////////////////////////////////////////////////////////////////////////
                    case "LA":
                        $classe = "aerologie";
                        if ((strcmp($pageProfil, "true")) > 0)
                        {
                            $url_profil=$url_labo[LA]."profils/".$nom_url."_".$prenom_url;
                        }                   
                    break;
                    //////////////////////////////////////////////////////////////////////////
                    case "LEGOS":
                        $classe = "legos";   
                        $url_profil=$url_labo[LEGOS].$nom_url;
                    break;
                    //////////////////////////////////////////////////////////////////////////
                    case "TBL":
                        $classe = "tbl";

                    break;
                    //////////////////////////////////////////////////////////////////////////
                    case "UMS831":
                        $classe = "ums";  
                        if ((strcmp($pageProfil, "true")) > 0)
                        {
                            $url_profil=$url_labo[UMS831]."profils/".$nom_url."_".$prenom_url;
                        }          
                    break;
                }

                echo "<li class=\"ff-item-type-".$classe."\">";
                echo "<h2 class=\"".$classe."\">".$nom." ".$prenom." <small>".$labo."</small></h2>";
                echo "<div class=\"more\">";
                echo "<p class=\"tel\"><span class=\"icon-phone\"></span> ";
                    foreach ($tel as $telValue)
                    {
                        echo "".$telValue." ";
                    }
                echo "</p>";
                echo "<p class=\"mail\"><span class=\"icon-mail-alt\"></span> ".$mail[0]."<i class=\"hide\">NO SPAM -- FILTER</i>@";
                // Vérification que l'adresse mail ne soit pas no_mail@, clé 1 (domaine) non déclarée
                if (array_key_exists (1, $mail))
                    {
                    echo "<i class=\"hide\">NO SPAM -- FILTER</i>".$mail[1]."";
                    }
                echo "</p>";

                echo "<p class=\"equipe\"><strong><span class=\"icon-group\"></span> Equipe :</strong>";
                    foreach ($equipe as $equipeValue)
                    {
                        echo " ".$equipeValue."<br>";
                    }
                echo "</p>";
                echo "<p class=\"bureau\">";
                    foreach ($bureau as $bureauValue)
                    {
                        echo "<strong><span class=\"icon-location\"></span> Bureau :</strong> ".$bureauValue."<br>";
                    }
                echo "</p>";
                echo "<p class=\"site\"><strong><span class=\"icon-location\"></span> Site :</strong> ".$site."</p>";
                if ((strcmp($pageProfil, "true")) > 0)
                {
                echo "<p><a href=\"".$url_profil."\" target=\"_blank\" class=\"".$classe."\">
                    Visitez la page profil</a></p>";            
                }
                echo "</div>";
                echo "</li>"; 
            $i++;    
            }       //end if $i>0
            
        }           //end while


        ?>
    </ul>

    <?php 
        if ($i=="0") {
        	echo "<blockquote><h2>Désolé, pas de résultat pour la recherche ".$searchUser."</h2></blockquote>";
        }
    ?>
</section>