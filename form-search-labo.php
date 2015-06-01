<form method="post" action="search-labo.php">
<label for="searchUser">Chercher par nom</label>
<input type="text" id="searchUser" placeholder="Saisir le nom" name="searchUser">


<?php 
	if ($q) {
		$searchValue=$q;
	}
	else {
		$searchValue=$searchLabo;
	}
?>
<input type="hidden" name="searchLabo" value="<?php echo "".$searchValue.""?>">
<button type="submit"><span class="icon-search"></span>Ok</button>
</form>