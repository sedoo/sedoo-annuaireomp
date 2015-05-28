<?php
include("header.php");

?>
<div class="container" style="padding-top:20px">
    <div class="col-md-12">
        <label>Choisissez le laboratoire </label>
        <select name="labo" onchange="listing(this.value)">
            <option value="none">Choisissez...</li>
            <option value="CESBIO">Centre d'Etudes Spatiales de la BIOsphère - CESBIO - UMR 5126</option>
            <option value="ECOLAB">Laboratoire d'Ecologie Fonctionnelle et Environnement - ECOLAB - UMR 5245</option>
            <option value="GET">Géosciences Environnement Toulouse - GET - UMR 5563</option>
            <option value="IRAP">Institut de Recherche en Astrophysique et Planétologie - IRAP - UMR 5277</option>
            <option value="LA">Laboratoire d'Aérologie - LA - UMR 5560</option>
            <option value="LEGOS">Laboratoire d'Etudes Géospatiales de l'Océan et des surfaces - LEGOS - UMR 5566</option>
            <option value="TBL">Télescope Bernard Lyot - TBL - UMR 5566</option>
            <option value="UMS831">Unité Mixte de Services -UMS 831</option>
        </select>
    </div>

<div id="Filter"></div>
</div>



</body>
</html>
