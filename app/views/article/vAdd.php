<form method="post" action="faqs/update">
    <fieldset>
        <legend>Creer un article</legend>
        <div class="form-group">
            <select name="categorie" class="form-control">	
                <option disabled selected>Categorie</option>
                <option disabled>---</option>
                <?php foreach($categories as $cat) {  ?>
                    <option value="<?php echo $cat->getId(); ?>"><?php echo $cat; ?></option>
                <?php } ?>
            </select>
            <br />
           Titre :
            <br /><input type="text" class="form-control" id="titre" name="titre" />
            <br />
            Description :
            <br />
            <textarea id="description" class="form-control" name="contenu"></textarea>
            <?php echo JsUtils::execute("CKEDITOR.replace( 'description');"); ?>
        </div>
        <div class="form-group" >
            Utilisateur :
            <br /><input type="text" class="form-control" id="utilisateur" readonly value="<?php echo $currentUser->getLogin(); ?>" />
            <br />
          	Date de creation :
            <br /><input type="text" class="form-control" id="datecreation" readonly value="<?php echo (new DateTime())->format('d-m-Y H:i:s'); ?>" style="width:50%;" />
            <br />
           Version :
            <br /><input type="text" class="form-control" id="version" name="version" readonly value="1.0" style="width:50%;" />
        </div>
        <div class="form-group">
            <input type="submit" value="Valider" class="btn btn-default" />
            <br /><a class="btn btn-default" href="<?php echo $config["siteUrl"]?>Faqs">Annuler</a>
        </div>
    </fieldset>
</form>