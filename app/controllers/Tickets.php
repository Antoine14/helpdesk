<?php
class Tickets extends \_DefaultController {
	public function Tickets(){
		$this->title="Tickets";
		$this->model="Ticket";
	}

	public function messages($id){
		$ticket=DAO::getOne("Ticket", $id[0]);
		if($ticket!=NULL){
			echo "<h2>".$ticket."</h2>";
			$messages=DAO::getOneToMany($ticket, "messages");
			echo "<table class='table table-striped'>";
			echo "<thead><tr><th>Messages</th></tr></thead>";
			echo "<tbody>";
			foreach ($messages as $msg){
				echo "<tr>";
				echo "<td title='message' data-content='".htmlentities($msg->getContenu())."' data-container='body' data-toggle='popover' data-placement='bottom'>".$msg->toString()."</td>";
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
			echo JsUtils::execute("$(function () {
					  $('[data-toggle=\"popover\"]').popover({'trigger':'hover','html':true})
				})");
		}
	}
	public function frm($id=NULL){
			$ticket=$this->getInstance($id);
			$categories=DAO::getAll("Categorie");
			$statuts = DAO::getAll("Statut");
			$cat=-1;
			if($ticket->getCategorie()!=null){
				$cat=$ticket->GetCategorie()->getId();
			}
			$list=Gui::select($categories, $cat,"Sélectionner une catégorie...");
			/*$this->loadView("ticket/vAdd",array("ticketTypes" => Tickets::getTypes(),"categories" => $categories,"ticket" => $ticket,"statuts" => $statuts));*/
			$this->loadView("ticket/vAdd",array("select"=>$list,"ticket"=>$object));
	}		
}