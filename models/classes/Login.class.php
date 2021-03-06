<?php
class Login extends Connection
{
	public function validateLogin($login, $password)
	{
		$passwordHash = parent::passwordHash($password);

		$db = parent::connect();
		$result = $db->prepare("SELECT id FROM `user` WHERE (login=? && passwordHash=?) ");
		$result->execute(array($login, $passwordHash));
		$userId = $result->fetch();
		if($userId['id'] != ""){
			session_start();
			$_SESSION['profil_id'] = $userId['id'];
			return true;
		}else
			return false;
	}
}