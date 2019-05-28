<?php
/**
* Class Project
*/
class Project{
	/**
	* @var string name
	*/
	private $name;
	/**
	* @var string date
	*/
	private $date;
	/**
	* @var int ID 
	*/
	private $id;
	/**
	* @var string ID 
	*/
	private $description;
	/**
	* @var int ID user
	*/
	private $idUser;
	/**
	* @var int ID template
	*/
	private $idTemplate;
	/**
	* @var int ID state
	*/
	private $idState;

	/**
	* @param string $name
	* @param int $date
	*/
	public function __construct($name, $date=NULL,$description){
		$this->name=$name;
		$this->date=$date;
		$this->date=$description;
	}
	/**
	* @param string $name name
	*/
	public function setname($name){
		$this->name=$name;
	}
	/**
	* @param int $date Date 
	*/
	public function setdate($date){
		$this->date=$date;
	}
	/**
	* @param $id ID
	*/
	public function setId($id){
		$this->id=$id;
	}
	/**
	* @param $id ID
	*/
	public function setIdState($idState){
		$this->idState=$idState;
	}
	/**
	* @param $description description
	*/
	public function setDescription($description){
		$this->description=$description;
	}
	/**
	* @param $id ID
	*/
	public function setIdTemplate($idTemplate){
		$this->idTemplate=$idTemplate;
	}
	/**
	* @param $id ID
	*/
	public function setIdUser($idUser){
		$this->idUser=$idUser;
	}

	/**
	* @return string
	*/
	public function getname(){
		return $this->name;
	}
	/**
	* @return string
	*/
	public function getdate(){
		return $this->date;
	}
	/**
	* @return int
	*/
	public function getId(){
		return $this->id;
	}
	/**
	* @return string
	*/
	public function getDescription(){
		return $this->description;
	}
		/**
	* @return int
	*/
	public function getIdState(){
		return $this->state;
	}
		/**
	* @return int
	*/
	public function getIdTemplate(){
		return $this->idTemplate;
	}
		/**
	* @return int
	*/
	public function getIdUser(){
		return $this->idUser;
	}

}
?>
