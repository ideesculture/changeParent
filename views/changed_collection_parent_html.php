<?php
    $id =$this->getVar("id");
    $vt_collection = new ca_collections($id);
    $parent = $this->getVar("parent");
    $vt_parent_collection = new ca_collections($parent);
?>
<h1>Enregistrement parent changé</h1>
<p>La collection <a href="<?php print __CA_URL_ROOT__; ?>/index.php/editor/collections/CollectionEditor/Edit/collection_id/<?php print $id; ?>">[<?php print $vt_collection->get("ca_collections.idno")."] <b>".$vt_collection->get("ca_collections.preferred_labels.name")."</b>"; ?> </a> a été mise à jour. Elle est désormais placée dans la hiérarchie sous la <a href="<?php print __CA_URL_ROOT__; ?>/index.php/editor/collections/CollectionEditor/Edit/collection_id/<?php print $id; ?>">[<?php print $vt_parent_collection->get("ca_collections.idno")."] <b>".$vt_parent_collection->get("ca_collections.preferred_labels.name")."</b>"; ?> </a>.</p>