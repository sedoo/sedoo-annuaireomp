<?php
$name_file="listeWithPageProfil";
$ext_file=".csv";
$annuaire="".$name_file."".$ext_file."";

//$dir="../annuaire-".$labo."";
$file_annuaire="".$annuaire."";

$qLower=strtolower($q);
if ($qLower==="la") {$qLower="aerologie";}

include ("parametres.php");

//-------------------------------------------------------------------------
$content="";
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
                    break;
                    //////////////////////////////////////////////////////////////////////////
                    case "ECOLAB":
                        $classe = "ecolab";      
                    break;
                    //////////////////////////////////////////////////////////////////////////
                    case "IRAP":
                        $classe = "irap";
                    break;
                    //////////////////////////////////////////////////////////////////////////
                    case "GET":
                        $classe = "get";
                    break;
                    //////////////////////////////////////////////////////////////////////////
                    case "LA":
                        $classe = "aerologie";                
                    break;
                    //////////////////////////////////////////////////////////////////////////
                    case "LEGOS":
                        $classe = "legos";
                    break;
                    //////////////////////////////////////////////////////////////////////////
                    case "TBL":
                        $classe = "tbl";

                    break;
                    //////////////////////////////////////////////////////////////////////////
                    case "UMS831":
                        $classe = "ums";        
                    break;
                }

                $content.= "<tr>";
                $content.= "<td>".$nom."</td>";
                $content.= "<td>".$prenom."</td>";
                $content.= "<td>";
                    foreach ($tel as $telValue)
                    {
                        $content.= "0".$telValue." ";
                    }
                $content.= "</td>";
                
                
                $content.= "<td>";
                    foreach ($equipe as $equipeValue)
                    {
                        $content.= " ".$equipeValue."<br>";
                    }
                $content.= "</td>";
                $content.= "<td>";
                    foreach ($bureau as $bureauValue)
                    {
                        if ($bureauValue !== "Accueil (BUREAU_PAR_DEFAUT)") {
                           $content.= "".$bureauValue."<br>"; 
                       }else {$content.= "--"; }
                        
                    }
                $content.= "</td>";
                $content.= "<td> ".$site."</td>";
                $content.= "<td>".$mail[0]."@";
            // Vérification que l'adresse mail ne soit pas no_mail@, clé 1 (domaine) non déclarée
                if (array_key_exists (1, $mail))
                    {
                    $content.= "".$mail[1]."";
                    }
            $content.= "</td>";
            $content.= "</tr>";
        }
    }
    $i++;
}

?>
<style>

h1 {width: 100%}

table {
    border:solid 1px #000000;
    width: 100%;
    table-layout: fixed;
}
td, th {
    border-bottom:solid 1px #000000;
    border-right:solid 1px #AAA;
    padding: 2px 5px;
    vertical-align: middle;
}

.cesbio {
  color: #B6CC49;
}

.ecolab {
  color: #7DBF3B;
}

.irap {
  color: #2D4F59;
}

.get {
  color: #DD9946;
}

.aerologie {
  color: #90BCD1;
}

.legos {
  color: #1F7E9E;
}

.tbl {
  color: #2D4F59;
}

.ums {
  color: #696867;
}


</style>
<page orientation="portrait" format="A4" style="font-size: 10px" backtop="17mm" backbottom="7mm" backleft="4mm" backright="4mm">
    <page_header> 
        <h1 class=<?php echo "".$qLower.""; ?>>Annuaire <?php echo "".$q."";?></h1>         
    </page_header> 
    <table cellspacing="0" >
        <col style="width: 14%">
        <col style="width: 10%">
        <col style="width: 10%">
        <col style="width: 20%">
        <col style="width: 10%">
        <col style="width: 10%">
        <col style="width: 26%">
        <thead>
            <tr style="border-bottom:1px solid #555">
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>Equipe</th>
                <th>Bureau</th>
                <th>Site</th>
                <th>Mail</th>
            </tr>
        </thead>
    <?php echo "".$content.""; ?>
    </table>
    <page_footer> 
       <p>Version : <?php echo date(DATE_RFC2822);?></p>
    </page_footer>
</page>