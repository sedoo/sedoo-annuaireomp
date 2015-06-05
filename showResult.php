<?php
///// remplacement DE TOUS LES ESPACES par des "-" sur NOM PRENOM
$nom_url=str_replace(" ", "-", $nom);
$prenom_url=str_replace(" ", "-", $prenom);

    switch ($labo) {
        //////////////////////////////////////////////////////////////////////////
        case "CESBIO":
            $classe = "cesbio"; 
            if ((strcmp($pageProfil, "true")) > 0)
            {
                $url_profil=$url_labo['CESBIO']."profils/".$nom_url."_".$prenom_url;
            }                   
        break;
        //////////////////////////////////////////////////////////////////////////
        case "ECOLAB":
            $classe = "ecolab";  
            if ((strcmp($pageProfil, "true")) > 0)
            {
                $url_profil=$url_labo['ECOLAB']."profils/".$nom_url."_".$prenom_url;
            }          
        break;
        //////////////////////////////////////////////////////////////////////////
        case "IRAP":
            $classe = "irap"; 
            if ((strcmp($pageProfil, "true")) > 0)
            {
                $url_profil=$url_labo['IRAP']."profils/".$nom_url."_".$prenom_url;
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
                $url_profil=$url_labo['GET']."profils/".$nom_url."_".$prenom_url;
                }
            }
        break;
        //////////////////////////////////////////////////////////////////////////
        case "LA":
            $classe = "aerologie";
            if ((strcmp($pageProfil, "true")) > 0)
            {
                $url_profil=$url_labo['LA']."profils/".$nom_url."_".$prenom_url;
            }                   
        break;
        //////////////////////////////////////////////////////////////////////////
        case "LEGOS":
            $classe = "legos";   
            $url_profil=$url_labo['LEGOS'].$nom_url;
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
                $url_profil=$url_labo['UMS831']."profils/".$nom_url."_".$prenom_url;
            }          
        break;
    }

    //echo "<li class=\"ff-item-type-".$classe."\">";
    echo "<li class=\"br-".$classe."\">";
   // echo "<h2 class=\"br-".$classe."\">".$nom." ".$prenom." <small>".$labo."</small></h2>";
    echo "<h2>".$nom." ".$prenom." <small class=\"".$classe."\">".$labo."</small></h2>";
    echo "<div class=\"more\">";
    echo "<p class=\"tel\"><span class=\"icon-phone\"></span> ";
        foreach ($tel as $telValue)
        {
            echo "0".$telValue." ";
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
?>