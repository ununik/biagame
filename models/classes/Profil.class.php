<?php
class Profil extends Connection
{
	public $log = false;
	private $id = 0;
	
	public function __construct($login = "", $password = "")
	{
		$passwordHash = parent::passwordHash($password);
		
		$db = parent::connect();
		$result = $db->prepare("SELECT id FROM `user` WHERE login=? && password=? ");
		$result->execute(array($login, $passwordHash));
		$userId = $result->fetch();
		if($userId['id'] != ""){
			$this->log = true;
			$this->id = $userId['id'];
		}
	}
}