<form method="post" action="tickets/update">
<fieldset>
<legend>Ajouter/modifier un ticket</legend>
<div class="alert alert-info">Création de ticket</div> 
<div class="form-group">
	<input type="hidden" name="id" value="<?php echo $ticket->getId()?>">

	<select type="text" name="type" class="form-control"><?php echo Gui::select(array("incident","demande"))?></select>
	<select class="form-control" name=idCategorie><?php echo Gui::select(DAO::getAll("Categorie"), $ticket->getCategorie(),"selectionner une categorie")?></select>
	Titre:
	<input type="text" name="titre" value="<?php echo $ticket->getTitre()?>" placeholder="Entrez un titre " class="form-control">
	Description:
	<input type="text" name="description" value="<?php echo $ticket->getDescription()?>" placeholder="Decrivez votre situation " class="form-control">
	Utilisateur:
	<input type="text" name="utilisateur" value="<?php echo Auth::getUser()?>" class="form-control" readonly>
	Date de création:
	<input type="text" name="Date" value="<?php echo date("d-m-Y H:i")?>" class="form-control" readonly>
	Statut:
	<input type="text" name="statut" value="<?php echo $ticket->getStatut()?>" class="form-control"readonly>

</div>
<div class="form-group">
	<input type="submit" value="Valider" class="btn btn-default">
	<a class="btn btn-default" href="<?php echo $config["siteUrl"]?>users">Annuler</a>
</div>
</fieldset>
</form>
