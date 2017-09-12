<?php
    $id =$this->getVar("id");
    MetaTagManager::addLink('stylesheet', __CA_URL_ROOT__."/app/plugins/changeParent/assets/css/changeParent.css",'text/css');

?>
<h1>Changer l'enregistrement parent</h1>
<form method="post" action="<?php print __CA_URL_ROOT__."/index.php/changeParent/change/collection/id/".$id; ?>">
<label>ID de l'enregistrement parent</label><br/>
<p><input type="hidden" value="<?php print $id; ?>" name="record_id" /></p>
    <input type="text" size="80" id="collectionSearchInput" placeholder="saisir le début du nom de l'enregistrement parent...">
    <div id="collectionSearchResults" style="display: none;"></div>
<input type="text" size="80" name="parent_id" placeholder="identifiant de l'enregistrement parent..."/><br/>
<button class="btn" type="submit">Enregistrer</button>
</form>
<script>
    $(document).on("ready",function() {
        $("#collectionSearchInput").on("paste keyup", function() {
            console.log($(this).val());
            $.ajax("http://www.inrap.local/gestion/index.php/lookup/Collection/Get/types/705/noSubtypes/0/noInline/0?types=705&term="+$(this).val()).done(
                function(data) {
                    $("#collectionSearchResults").html("");
                    $.each(data, function(index,value){
                        $("#collectionSearchResults").append("<div class='result'>"+value.label+"</div>");
                    });
                    $("#collectionSearchResults").show();
                    console.log(data);
                }
            );
        });
    });
</script>