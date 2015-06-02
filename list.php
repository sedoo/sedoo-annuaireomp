<?php

$q=$_GET["q"];

//$name_file="annuaire_telephonique_OMP";
$name_file="listeWithPageProfil";
$ext_file=".csv";
$annuaire="".$name_file."".$ext_file."";
//$pageProfil="false";

//$dir="../annuaire-".$labo."";
$file_annuaire="".$annuaire."";
$file=fopen($file_annuaire, "r");

$acronymGroup = array(
	"SAR" => "Service Appui Recherche",
	"BIOGEOCHIM" => "Biogéochimie et transfert aux interfaces",
	"ECSECO" => "Ecotoxicologie et santé des écosystèmes",
	"CIRCE" => "Ecologie des communautés : interactions, interfaces & contraintes",
	"DYNABIO" => "Dynamique passée et actuelle de la biodiversité terrestre",
	"BIOREF" => "Biodiversité, réseaux trophiques et flux dans les écosystèmes auquatiques",
);
include ("parametres.php");
?>
    <h3>Annuaire <?php echo "$name_labo[$q]";?></h3>
    <div id="group-nav" class="listNav well col-md-12"></div><!-- liste alpha -->
    <div id="group" class="well col-md-12 col-sm-12 list">

<?php
$i=0;
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
	/*$user=array(
        "labo" => "".$labo."",
		"nom" => "".$data_nom."",
		"prenom" => "".$data_prenom."",
		"mail" => "".$data[3]."",
		"tel" =>  "".$data[4]."",
		"bureau" => "".$data[5]."",
		"site" => "".$data[6]."",
		"status" => "".$data[7]."",
		"equipe" => "".$data[8]."", 
		);*/

    if ($i > 0)
    {
		if (($nom)&&($labo=="$q"))
		{            
        ///// SUPPRESSION DE TOUS LES ESPACES DE LA CHAINE NOMPRENOM  
        $classe="".$nom."".$prenom."";
        $classe=str_replace(' ','',$classe);
        ///// remplacement DE TOUS LES ESPACES par des "-" sur NOM PRENOM
        $nom_url=str_replace(" ", "-", $nom);
        $prenom_url=str_replace(" ", "-", $prenom);
        /////
        echo '<div class="row user-row">
            
            <div class="col-md-11 col-sm-11 group-title">
                <div class="col-md-12 col-sm-12"><h5>'.$nom.' '.$prenom.'</h5></div>
                <div class="col-md-6 col-sm-6"><span class="glyphicon glyphicon-earphone"></span> Telephone : <strong>'.$tel[0].'</strong></div>
                <div class="col-md-6 col-sm-6"><span class="glyphicon glyphicon-envelope"></span> Email : <strong>'.$mail[0].'<span class="hide">NO SPAM -- FILTER</span>@';
                // Vérification que l'adresse mail ne soit pas no_mail@, clé 1 (domaine) non déclarée
                if (array_key_exists (1, $mail))
                    {echo '<span class="hide">NO SPAM -- FILTER</span>'.$mail[1].'';}
                echo'</strong></div>
            </div>
            <div class="col-md-1 col-sm-1 dropdown-user" data-for=".'.$classe.'">
                <i class="glyphicon glyphicon-chevron-down text-muted"></i>
            </div>
        
            <div class="row user-infos '.$classe.'">
                <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">'.$nom.' '.$prenom.'</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <img class="img-circle"
                                         src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100"
                                         alt="User Pic">
                                </div>
                                <div class="col-md-6 col-sm-9">
                                    <table class="table table-condensed table-responsive table-user-information">
                                        <tbody>
                                        <tr>
                                            <td>Telephone :</td>
                                            <td><strong>';
                                            foreach ($tel as $telValue)
                                            {
                                                echo "".$telValue."<br>";
                                            }
                                            //'.$tel[0].'
                                            echo '</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Email :</td>
                                            <td><strong>'.$mail[0].'<span class="hide">NO SPAM -- FILTER</span>@';
                                            // Vérification que l'adresse mail ne soit pas no_mail@, clé 1 (domaine) non déclarée
                                            if (array_key_exists (1, $mail))
                                                {echo '<span class="hide">NO SPAM -- FILTER</span>'.$mail[1].'';}
                                            echo'</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Laboratoire :</td>
                                            <td>'.$labo.'</td>
                                        </tr>
                                        <tr>
                                            <td>Equipe :</td>
                                            <td>';
                                            foreach ($equipe as $equipeValue)
                                            {
                                                echo "".$equipeValue."<br>";
                                            }
                                            //'.$equipe[0].'
                                            echo '</td>
                                        </tr>
                                        <tr>
                                            <td>Bureau :</td>
                                            <td>';
                                            foreach ($bureau as $bureauValue)
                                            {
                                                echo "".$bureauValue."<br>";
                                            }
                                            //'.$bureau[0].'
                                            echo '</td>
                                        </tr>
                                        <tr>
                                            <td>Site géographique</td>
                                            <td>'.$site.'</td>
                                        </tr>
                                        <tr>
                                            <td>Statut :</td>
                                            <td>'.$status.'</td>
                                        </tr>';
                                        if ((strcmp($pageProfil, "true")) > 0)
                                        {
                                        if ($q=="LEGOS"){$url_profil=$url_labo[$q].$nom_url;}else{$url_profil=$url_labo[$q]."profils/".$nom_url."_".$prenom_url;}
                                        echo "<tr>
                                            <td colspan=\"2\"><a href=\"".$url_profil."\" target=\"_blank\" class=\"btn btn-default btn-sm btn-block\">
                                            <span class=\"glyphicon glyphicon-user\"></span> Page profil</a></td>
                                        </tr>";                                        
                                        }
                                        if (($q=="GET") && ((strcmp($pageProfil, "true")) < 0))
                                        {
                                            if (($nom == "GUILLAUME")&&($prenom == "ANNE-MAGALI"))
                                            {
                                            $url_profil=$url_labo[$q]."profils/Seydoux-Guillaume_Anne-Magali";
                                            echo "<tr>
                                                <td colspan=\"2\"><a href=\"".$url_profil."\" target=\"_blank\" class=\"btn btn-default btn-sm btn-block\">
                                                <span class=\"glyphicon glyphicon-user\"></span> Page profil</a></td>
                                            </tr>"; 
                                            }
                                            /*else
                                            {
                                            $url_profil=$url_labo[$q]."Annuaire/".$nom_url."-".$prenom_url;
                                            echo "<tr>
                                                <td colspan=\"2\"><a href=\"".$url_profil."\" target=\"_blank\" class=\"btn btn-default btn-sm btn-block\">
                                                <span class=\"glyphicon glyphicon-user\"></span> Page profil</a></td>
                                            </tr>";
                                            }*/
                                        }

                                        echo'
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>';

		}
    }
    $i++;
}
	
?>
    </div>

<!--<script src="js/list.js"></script>-->
