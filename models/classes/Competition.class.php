<?php
class Competition extends Connection
{
	public function getCompetitions($level = 0) {
		$db = parent::connect();
		$timestamp = time();
		$result = $db->prepare("SELECT * FROM `competition` WHERE (`level`<=? && `date`<=?) ORDER BY `level` DESC ");
		$result->execute(array($level, $timestamp));
		$items = $result->fetchAll();

		return $items;
	}

	public function getCompetition($id,$level = 0) {
		$db = parent::connect();
		$result = $db->prepare("SELECT * FROM `competition` WHERE (`level`<=? && `id`=?)");
		$result->execute(array($level, $id));
		$item = $result->fetch();

		return $item;
	}
}