<?php
class Nations extends Connection
{
	public function selectAllNations()
	{
		$db = parent::connect();
		$result = $db->prepare("SELECT * FROM `country` ORDER BY `name` ASC ");
		$result->execute(array());
		$nations = $result->fetchAll();

		return $nations;
	}
}