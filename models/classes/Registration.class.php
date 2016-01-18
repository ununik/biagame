<?php
class Registration extends Connection
{
	public function checkEmptyMail($mail)
	{
		$db = parent::connect();
		$result = $db->prepare("SELECT id FROM `user` WHERE mail=? ");
		$result->execute(array($mail));
		$mailId = $result->fetch();
		if($mailId['id'] != ""){
			return true;
		}else
			return false;
	}

	public function checkEmptyLogin($login)
	{
		$db = parent::connect();
		$result = $db->prepare("SELECT id FROM `user` WHERE login=? ");
		$result->execute(array($login));
		$mailId = $result->fetch();
		if($mailId['id'] != ""){
			return true;
		}else
			return false;
	}

	public function createUser($mail, $login, $password)
	{
		$passwordHash = parent::passwordHash($password);

		$db = parent::connect();
		$timestamp = time();
		$result = $db->prepare("INSERT INTO `user`(`mail`, `login`, `passwordHash`, `created`) VALUES (?, ?, ?, ?)");
		$result->execute(array($mail, $login, $passwordHash, $timestamp));
	}
}