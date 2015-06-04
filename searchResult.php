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

          
    switch ($searchFromLabo) {
        case "true":
            if (($nom===$searchUser)&&($labo===$searchLabo)) {
                include("showResult.php");
            }
            break;
        
        default:
            
            if ($nom===$searchUser)
            {
                include("showResult.php");
            }
            break;
    }
    
    
}           //end while


?>