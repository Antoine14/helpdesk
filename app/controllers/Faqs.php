<?php

class Faqs extends \_DefaultController {
	public function Faqs(){
		parent::__construct();
		$this->title="Foire aux questions";
		$this->model="Faq";
	}
   
   public function article($id=null) {
        if(Auth::isAuth()) {
            $article = DAO::getOne($this->model, $id[0]);
            if (empty($article))
                $this->messageDanger("Cet article n'existe pas.");
            else {
                $precedent = DAO::getAll($this->model, "id<" . $article->getId() . " order by id desc limit 1");
                if(empty($precedent))
                    $precedent = DAO::getAll($this->model, "1 order by id desc limit 1")[0];
                else
                    $precedent = $precedent[0];
                $suivant = DAO::getAll($this->model, "id>" . $article->getId() . " order by id asc limit 1");
                if(empty($suivant))
                    $suivant = DAO::getAll($this->model, "1 order by id limit 1")[0];
                else
                    $suivant = $suivant[0];
                $article->setPopularity($article->getPopularity()+1);
                DAO::update($article);
                $this->loadView("faq/vArticle", array(
                    "article" => $article,
                    "precedent" => $precedent,
                    "suivant" => $suivant
                ));
            }
        }
        else
            $this->messageDisconnected();
    }
    public function frm($id=NULL) {
        if(Auth::isAdmin()) {
            if(!empty($id)) {
                $article = DAO::getOne($this->model, $id[0]);
                $categories = DAO::getAll("Categorie");
                $this->loadView("article/vAdd", array(
                    "categories" => $categories,
                    "article" => $article
                ));
            }
            else {
                $categories = DAO::getAll("Categorie");
                $this->loadView("article/vAdd", array(
                    "categories" => $categories,
                    "currentUser" => Auth::getUser()
                ));
            }
        }
        else
            $this->messageNotAdmin();
    }
	/* (non-PHPdoc)
	 * @see _DefaultController::setValuesToObject()
	 */
	protected function setValuesToObject(&$object) {
		parent::setValuesToObject($object);
		$object->setUser(Auth::getUser());
		$categorie=DAO::getOne("Categorie", $_POST["categorie"]);
		$object->setCategorie($categorie);
	}
}