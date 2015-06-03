<?php
class DefaultC extends \BaseController {

	public function index() {
		$this->loadView("main/vHeader",array("infoUser"=>Auth::getInfoUser()));
		$this->loadView("main/vDefault");
		$this->loadView("main/vFooter");
	}

	public function asAdmin(){
		$_SESSION["user"]=DAO::getOne("User", "admin=1");
		$_SESSION['KCFINDER'] = array(
				'disabled' => false
		);
		$this->index();
	}

	public function asUser(){
		$_SESSION["user"]=DAO::getOne("User", "admin=0");
		$_SESSION['KCFINDER'] = array(
				'disabled' => true
		);
		$this->index();
	}

	public function disconnect(){
		$_SESSION = array();
		$_SESSION['KCFINDER'] = array(
				'disabled' => true
		);
		$this->index();
	}

	public function test(){
		$this->loadView("main/vHeader",array("infoUser"=>Auth::getInfoUser()));
		$this->loadView("main/vtest");
		$this->loadView("main/vFooter");
		
	}
	public function ckEditorSample(){
		$this->loadView("main/vHeader",array("infoUser"=>Auth::getInfoUser()));
		echo "<div class='container'>";
		echo "<h1>Exemple ckEditor</h1>";
		echo "<textarea id='editor1'>Exemple de <strong>contenu</strong></textarea>";
		echo JsUtils::execute("CKEDITOR.replace( 'editor1');");
		echo "</div>";
		$this->loadView("main/vFooter");
	}
}