<form method="post" action="tickets/update">
<fieldset>
<legend>Ajouter/modifier un ticket</legend>
<div class="alert alert-info">Utilisateur : <?php echo $ticket->toString()?></div>
<div class="form-group">
	<input type="hidden" name="id" value="<?php echo $ticket->getId()?>">
	<input type="text" name="titre" value="<?php echo $user->getTitre()?>" placeholder="Entrez un titre " class="form-control">
	<input type="text" name="description" value="<?php echo $user->getDescription()?>" placeholder="D�crivez votre situation " class="form-control">
</div>
<div class="form-group">
	<input type="submit" value="Valider" class="btn btn-default">
	<a class="btn btn-default" href="<?php echo $config["siteUrl"]?>users">Annuler</a>
</div>
</fieldset>
</form>
