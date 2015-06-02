<form method="post" action="tickets/update">
<fieldset>
<legend>Ajouter/modifier un ticket</legend>
<!-- <div class="alert alert-info">Création de ticket<?php echo $ticket->toString()?></div> -->
<div class="form-group">
	<input type="hidden" name="id" value="<?php echo $ticket->getId()?>">
<select class="form-control" name="idC"ategorie">
				<option>Categorie</option>
			<?php foreach ($user as $u) {echo "<option value=".$u->getId().">".$u->getLibelle()."</option>";}; ?>
			</select>
	<input type="text" name="type" value="<?php echo $ticket->getType()?>" placeholder="type" class="form-control">
	Titre:
	<input type="text" name="titre" value="<?php echo $ticket->getTitre()?>" placeholder="Entrez un titre " class="form-control">
	Description:
	<input type="text" name="description" value="<?php echo $ticket->getDescription()?>" placeholder="Decrivez votre situation " class="form-control">
	Utilisateur:
	<input type="text" name="utilisateur" value="<?php echo $ticket->getUser()?>" class="form-control">
	Date de création:
	<input type="text" name="Date" value="<?php echo $ticket->getDateCreation()?>" class="form-control">
	Statut:
	<input type="text" name="statut" value="<?php echo $ticket->getStatut()?>" class="form-control">

</div>
<div class="form-group">
	<input type="submit" value="Valider" class="btn btn-default">
	<a class="btn btn-default" href="<?php echo $config["siteUrl"]?>users">Annuler</a>
</div>
</fieldset>
</form>
