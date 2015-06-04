<?php
/*
 * Génération de l'annuaire pdf d'un labo
 * author : Pierre VERT - pôle web OMP
 */

$q=$_GET["q"];
$name_file="listeWithPageProfil";
$ext_file=".csv";
$annuaire="".$name_file."".$ext_file."";

//$dir="../annuaire-".$labo."";
$file_annuaire="".$annuaire."";

include ("parametres.php");

    $p->set_info("Title", "Annuaire ".$q."");


//-------------------------------------------------------------------------

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

    if ($i > 0)
    {
        if (($nom)&&($labo=="$q"))
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

                $content.= "<li class=\"ff-item-type-".$classe."\">";
                $content.= "<span>".$nom." ".$prenom."</span>";
                $content.= "<span class=\"tel\"><span class=\"icon-phone\"></span> ";
                    foreach ($tel as $telValue)
                    {
                        $content.= "".$telValue." ";
                    }
                $content.= "</span>";
                $content.= "<span class=\"mail\"><span class=\"icon-mail-alt\"></span> ".$mail[0]."<i class=\"hide\">NO SPAM -- FILTER</i>@";
                // Vérification que l'adresse mail ne soit pas no_mail@, clé 1 (domaine) non déclarée
                if (array_key_exists (1, $mail))
                    {
                    $content.= "<i class=\"hide\">NO SPAM -- FILTER</i>".$mail[1]."";
                    }
                $content.= "</span>";
                $content.= "<input id=\"select-type-info".$i."\" name=\"radio-set-info\" type=\"radio\" class=\"ff-selector-type-info\" />
                <label for=\"select-type-info".$i."\" class=\"ff-label-type-info\"><span class=\"icon-plus\"></span></label>";
                $content.= "<div class=\"more\">";
                    $content.= "<div>";
                    $content.= "<span class=\"equipe\"><strong><span class=\"icon-group\"></span> Equipe :</strong>";
                        foreach ($equipe as $equipeValue)
                        {
                            $content.= " ".$equipeValue."<br>";
                        }
                    $content.= "</span>";
                    $content.= "<span class=\"bureau\">";
                        foreach ($bureau as $bureauValue)
                        {
                            $content.= "<strong><span class=\"icon-location\"></span> Bureau :</strong> ".$bureauValue."<br>";
                        }
                    $content.= "</span>";
                    $content.= "<span class=\"site\"><strong><span class=\"icon-location\"></span> Site :</strong> ".$site."</span>";
                    $content.= "</div><div>";
                    if ((strcmp($pageProfil, "true")) > 0)
                    {
                    $content.= "<a href=\"".$url_profil."\" target=\"_blank\">
                        Visitez la page profil</a>";            
                    }
                    $content.= "</div>";
                $content.= "</div>";
                $content.= "</li>";
        }
    }
    $i++;
}


?>
