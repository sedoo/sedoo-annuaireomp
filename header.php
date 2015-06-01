<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="P.VERT | Pôle web service communication OMP">

    <title>Annuaire</title>

<link href="css/annuaire.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<script src="js/jquery.min.js" type="text/javascript"></script>
<!--<script type="text/javascript" src="js/ajax.js"></script>   -->
<script src="js/jquery.listnav-2.1.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('#group').listnav({
	noMatchText: 'Aucune entrée pour cette lettre.',
	includeNums: false 
	});
});
</script>

</head>
<body>
