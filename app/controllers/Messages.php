<?php class Messages extends \_DefaultController {
	public function Messages(){
		parent::__construct();
		$this->title="Tickets";
		$this->model="Message";
	}
    protected function setValuesToObject(&$object){
        parent::setValuesToObject($object);
        $object->setUser(Auth::getUser());
    }
    public function add($ticketId){
        if(Auth::isAuth()) {
            if (RequestUtils::isPost()) {
                $className = $this->model;
                $object = new $className();
                $this->setValuesToObject($object);
                $object->setTicket(DAO::getOne("Ticket", $ticketId[0]));
                try {
                    DAO::insert($object);
                    $msg = new DisplayedMessage("Instance de " . $this->model . " `{$object->toString()}` ajout�e");
                } catch (Exception $e) {
                    $msg = new DisplayedMessage("Impossible d'ajouter l'instance de " . $this->model, "danger");
                }
                $this->forward("Tickets", "messages", $object->getTicket()->getId());
            }
        }
        else
            $this->messageDisconnected();
    }
    public function edit($id) {
        if(Auth::isAuth()) {
            if (RequestUtils::isPost()) {
                $className = $this->model;
                $object = DAO::getOne("Message", $id[0]);
                $this->setValuesToObject($object);
                try {
                    DAO::update($object);
                    $msg = new DisplayedMessage($this->model . " `{$object->toString()}` mis � jour");
                } catch (Exception $e) {
                    $msg = new DisplayedMessage("Impossible de modifier l'instance de " . $this->model, "danger");
                }
                $this->forward("Tickets", "messages", $object->getTicket()->getId());
            }
        }
        else
            $this->messageDisconnected();
    }
    public function delete($id) {
        global $config;
        $object=DAO::getOne($this->model, $id[0]);
        if(empty($object))
            $this->messageDanger("Ce message n'existe pas.");
        elseif(!Auth::isAdmin() && $object->getUser() != Auth::getUser())
            $this->messageDanger("Vous n'avez pas l'autorisation de supprimer ce message.");
        else {
            try{
                if($object!==NULL){
                    DAO::delete($object);
                    $msg=new DisplayedMessage($this->model." `{$object->toString()}` supprim�(e)");
                }else{
                    $msg=new DisplayedMessage($this->model." introuvable","warning");
                }
            }catch(Exception $e){
                $msg=new DisplayedMessage("Impossible de supprimer l'instance de ".$this->model,"danger");
            }
            $this->forward("Tickets", "messages", $object->getTicket()->getId());
        }
    }
}