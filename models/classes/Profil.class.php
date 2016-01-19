<?php
class Profil extends Connection
{
	/**
	 * log or unlog user
	 * @var boolean
	 */
	public $log = false;
	/**
	 * ID of user
	 * @var int $id
	 */
	private $id = 0;
	/**
	 * beginning of the game
	 * @var int (1 or 0) $introduction
	 */
	private $introduction = 0;
	private $firstname = '';
	private $lastname = '';
	private $login = '';
	private $gender = '';
	private $age = '';
	private $nationality = 0;

	public function __construct($session = 0, $login = "", $password = "")
	{
		$passwordHash = parent::passwordHash($password);
		$db = parent::connect();
		if($session == 0 || $session == ""){
			$result = $db->prepare("SELECT * FROM `user` WHERE (login=? && passwordHash=?) ");
			$result->execute(array($login, $passwordHash));
		}else{
			$result = $db->prepare("SELECT * FROM `user` WHERE id=? ");
			$result->execute(array($session));
		}

		$userId = $result->fetch();

		if($userId['id'] != ""){
			$this->log = true;
			$this->id = $userId['id'];
			$this->introduction = $userId['introduction'];
			$this->login = $userId['login'];
			$this->firstname = $userId['firstname'];
			$this->lastname = $userId['lastname'];
			$this->gender = $userId['gender'];
			$this->age = $userId['age'];
			$this->nationality = $userId['nationality'];
			$this->money = $userId['money'];
		}
	}

	/**
	 * introduction for the game
	 * @return boolean
	 */
	public function introduction(){
		if($this->introduction == 0){
			return true;
		}else{
			return false;
		}
	}
	/**
	 * Get user id
	 */
	public function getId()
	{
		return $this->id;
	}
	/**
	 * Get "firstname lastname (login)"
	 */
	public function getFullNameWithLogin()
	{
		return "{$this->firstname} {$this->lastname} ({$this->login})";
	}
	/**
	 * Get gender by the whole word
	 */
	public function getWholeGender()
	{
		if($this->gender == "m"){
			return "muž";
		}elseif($this->gender == "f"){
			return "žena";
		}
		return;
	}
	/**
	 * Get whole age with "year"
	 */
	public function getWholeAge()
	{
		if($this->age < 2){
			return $this->age . ' rok';
		}else if($this->age < 5){
			return $this->age . ' roky';
		}else{
			return $this->age . ' let';
		}
	}
	/**
	 * Get full name of country
	 */
	public function getWordNationality()
	{
		$db = parent::connect();
		$result = $db->prepare("SELECT * FROM `country` WHERE id=? ");
		$result->execute(array($this->nationality));
		$nation = $result->fetch();

		return $nation['name'];
	}
	public function getFullMouney()
	{
		return "{$this->money} EUR";
	}

	/**
	 * introduction == 0
	 * Save new data at the beginning of the game
	 *
	 * @param string $firstname
	 * @param string $lastname
	 * @param string(1) $gender
	 * @param int $age
	 * @param int $nationality
	 */
	public function introductionUpdate($firstname, $lastname, $gender, $age, $nationality)
	{
		$db = parent::connect();
		$result = $db->prepare("UPDATE `user` SET `introduction`=?,`gender`=?,`firstname`=?,`lastname`=?,`nationality`=?,`age`=? WHERE id=?");
		$result->execute(array(1, $gender, $firstname, $lastname, $nationality, $age, $this->id));
	}
}