<?php
include("header.php");

$groupeID=$_GET['groupe'];
?>


<div id="wrap" class="clearfix">
	<div id="infoMail">
	    <h1>Annuaire IRAP <small>// Equipe <?php echo "".$groupeID.""; ?></small></h1>
		<div id="group-nav" class="listNav"></div><!-- liste alpha -->
		Pour contacter un membre du personnel de l’IRAP, veuillez envoyer un mail en utilisant le schéma suivant: <span>Prenom.Nom@irap.omp.eu</span>
	</div>
    
	<table class="striped sortable" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th>Nom Prénom</th>
				<th>Statut</th>
				<th>Bureau</th>
				<th>Groupe</th>
				<th>Site géographique</th>
				<th>Téléphone</th>
				<th>Site web</th>
			</tr>
		</thead>
		<tbody id="group">
			<?php
			$file=fopen("annuaire_ums.txt", "r");
			
			/*$acronymGroup = array(
				"GAHEC" => "Galaxies, Astrophysique des Hautes Energies et Cosmologie",
				"GPPS" => "Géophysique Planétaire et Plasmas Spatiaux",
				"MICMAC" => "Milieu Interstellaire, Cycle de la Matière, Astro-Chimie",
				"PSE" => "Physique du Soleil et des Etoiles",
				"SISU" => "Signal-Images en Sciences de l&#146;Univers",
				"GACL" => "Groupe Administration - Communication - Logistique",
				"GGPAQ" => "Groupe Gestion Projet et Assurance Qualité",
				"GM" => "Groupe Mécanique",
				"GEDI" => "Groupe des Électroniciens De l&#146;IRAP",
				"GT2I" => "Groupe Informatique de l&#146;IRAP",
				"GI" => "Groupe d&#146;Instrumentation",
				"SG" => "Services Généraux",
			);*/

			while(!feof($file)) 
			{
				$ligne=fgets($file, 1000);
				$data=explode(";",$ligne);
				
				// ASSIGNATION DES VALEURS DU TABLEAU A DES VARIABLES
				foreach ($data as $key => $value) {				
					switch ($key) {
						case 0 :
							$nom=utf8_decode($value);
							break;
						case 1 :
							$prenom=utf8_decode($value);
							break;
						case 2 :
							$mail=trim($value);
							break;
						case 3 :
							$tel=$value;
							break;
						case 4 :
							$bureau=$value;
							break;
						case 5 :
							$site=$value;
							break;
						case 6 :
							$status=$value;
							break;
						case 7 :
							$equipe=$value;
							break;
						case 8 :
							$web=$value;
							break;
					}//end switch
				}//end foreach
			
			// AFFICHAGE DES RESULTATS
			$dataGroupe=explode(",",$equipe);
				if ($nom !== "")
				{
					if (($groupeID !=="")&&(in_array($groupeID,$dataGroupe))) 
                    {
                        echo "
                            <tr>
                                <td>".$nom." ".$prenom."</td>
                                <td>".$status."</td>
                                <td>".$bureau."</td>
                                <td>
                            ";
                        foreach ($dataGroupe as $dataGroupeValue )
                        {
                            if ($groupeID == $dataGroupeValue) {
                            echo "<div>".$dataGroupeValue."</div>";
                            }
                        }
                        echo "
                                </td>
                                <td>".$site."</td>
                                <td>".$tel."</td>
                                <td>";
                                if ($web!=="")
                                {
                                    echo "<a href='".$web."' target='_blank'><img src='images/internet-24.png' alt='".$web."'/><span>".$web."</span></a>";
                                }
                        echo "	</td> 
						</tr>";
                    }
                    else {
                        
                    }
				}
			
			}//END WHILE
			?>
		</tbody>
	</table>
</div>
</body>
</html>
