<?php

$q=$_GET["q"];
include ("parametres.php");

$titlePage="Annuaire ".$name_labo[$q]."";
include ("header.php");

//<title>Annuaire echo "$name_labo[$q]";</title>
?>
    
<!--
<link href="css/annuaire.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />

<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.listnav-2.1-labo.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
$(function(){
$('#group').listnav({
noMatchText: 'Aucune entrée pour cette lettre.',
includeNums: false 
});
});
</script>

</head>
<body>-->

<?php
$qLower=strtolower($q);
if ($qLower==="la") {$qLower="aerologie";}

echo "<h1 class=\"br-".$qLower."\"><span class=\"icon-phone\"></span> ".$name_labo[$q]."</h1>";
?>
<nav>
<?php
include ("form-search-labo.php");
?>
<div id="group-nav" class="listNav"></div>
<div role="annuaireOMP">
    <a href="index.php" title="Cherchez dans un autre labo">
        <span class="icon-search"></span>Annuaire OMP
        <p>Chercher dans l'annuaire global de l'Observatoire Midi-Pyrénées</p>
    </a>
</div>
</nav>
<a href="printPdf.php?q=<?php echo "".$q."";?>"><span class="icon-print"></span> Version imprimable PDF</a>
<section class="ff-container">
    

    <ul id="group" class="ff-items list">



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

                echo "<li class=\"ff-item-type-".$classe."\">";
                echo "<span>".$nom." ".$prenom."</span>";
                echo "<span class=\"tel\"><span class=\"icon-phone\"></span> ";
                    foreach ($tel as $telValue)
                    {
                        echo "".$telValue." ";
                    }
                echo "</span>";
                echo "<span class=\"mail\"><span class=\"icon-mail-alt\"></span> ".$mail[0]."<i class=\"hide\">NO SPAM -- FILTER</i>@";
                // Vérification que l'adresse mail ne soit pas no_mail@, clé 1 (domaine) non déclarée
                if (array_key_exists (1, $mail))
                    {
                    echo "<i class=\"hide\">NO SPAM -- FILTER</i>".$mail[1]."";
                    }
                echo "</span>";
                echo "<input id=\"select-type-info".$i."\" name=\"radio-set-info\" type=\"radio\" class=\"ff-selector-type-info\" />
                <label for=\"select-type-info".$i."\" class=\"ff-label-type-info\"><span class=\"icon-plus\"></span></label>";
                echo "<div class=\"more\">";
                    echo "<div>";
                    echo "<span class=\"equipe\"><strong><span class=\"icon-group\"></span> Equipe :</strong>";
                        foreach ($equipe as $equipeValue)
                        {
                            echo " ".$equipeValue."<br>";
                        }
                    echo "</span>";
                    echo "<span class=\"bureau\">";
                        foreach ($bureau as $bureauValue)
                        {
                            echo "<strong><span class=\"icon-location\"></span> Bureau :</strong> ".$bureauValue."<br>";
                        }
                    echo "</span>";
                    echo "<span class=\"site\"><strong><span class=\"icon-location\"></span> Site :</strong> ".$site."</span>";
                    echo "</div><div>";
                    if ((strcmp($pageProfil, "true")) > 0)
                    {
                    echo "<a href=\"".$url_profil."\" target=\"_blank\">
                        Visitez la page profil</a>";            
                    }
                    echo "</div>";
                echo "</div>";
                echo "</li>"; 
                

        }
    }
    $i++;
}
    
?>
    </div>
</div>

</body>
</html>
