<?php
include("header.php");
?>
<div id="global">

	<div id="group-nav" class="listNav"></div><!-- liste alpha -->

	<div class="group-title">
		<div class="group-user">Nom Prénom</div>
		<div class="group-bureau">Website</div>	
		<div class="group-tel">Statut</div>
		<div class="group-bureau">Bureau</div>		
		<div class="group-bureau">Groupe</div>
		<div class="group-tel">Site géographique</div>
        <div class="group-tel">Téléphone</div>
		<div class="group-mail">Mail</div>

		<div class="clear"></div>
	</div><!-- end group-title-->
	<ul id="group">
	<?php
	//require("config.inc.php");

	$file=fopen("annuaire_ums.txt", "r");

	while(!feof($file))
	{
	$ligne=fgets($file, 1000);
	$data=explode(";",$ligne);

	echo "<li class='bglight'>
			<div class='group-user'>".utf8_decode($data[0])." ".utf8_decode($data[1])." </div>	";
					
			echo "<div class='group-bureau'>";	
			if ($data[8]!=="") {echo "<a href='".$data[8]."' target='_blank' title='Website'><span>www</span></a>";}
			echo "</div>	";
				// $data[7] > explode ','
			echo "<div class='group-tel'>".$data[6]."</div>
			<div class='group-bureau'>".$data[4]."</div>
			<div class='group-bureau'>".$data[7]."</div> 
		    <div class='group-tel'>".$data[5]."</div>
			<div class='group-tel'>".$data[3]."</div>
			<div class='group-mail'>".$data[2]."</div>
			<div class='clear'></div>

	</li>";
	}
//<div class='group-bureau'>".$data[7]."</div> >> groupe 

	?>
	</ul>
</div> <!--end global-->
</body>
</html>
