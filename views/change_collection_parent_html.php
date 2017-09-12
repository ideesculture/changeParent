<?php
    $id =$this->getVar("id");
?>
<h1>Changer l'enregistrement parent</h1>
<form method="post" action="<?php print __CA_URL_ROOT__."/index.php/changeParent/change/collection/id/".$id; ?>">
<label>ID de l'enregistrement parent</label><br/>
<input type="hidden" value="<?php print $id; ?>" name="record_id" />
<input type="text" size="80" name="parent_id" placeholder="identifiant de l'enregistrement parent..."/><br/>
<button class="btn" type="submit">Enregistrer</button>
</form>
