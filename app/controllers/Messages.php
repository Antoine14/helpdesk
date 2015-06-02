<?php
class Messages extends \_DefaultController {
	public function Messages(){
		$this->title="Messages";
		$this->model="Message";
	}

	public function frm($id=null){ 
		
	}
	
	protected function setValuesToObject(&$object) {
			parent::setValuesToObject($object);
			if(isset($_POST["idTicket"])){
				$cat=DAO::getOne("Ticket", $_POST["idCategorie"]);
				$object->setCategorie($tic);
			}
	}
}