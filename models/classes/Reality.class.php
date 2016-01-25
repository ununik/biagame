<?php
class Reality extends Connection
{
	public function getRealitiesOrderByPrice($level = 0, $order = 'DESC') {
		$db = parent::connect();
		$result = $db->prepare("SELECT * FROM `reality` WHERE (`level`<=? && `in_reality_store`=?) ORDER BY `price` $order ");
		$result->execute(array($level, 1));
		$items = $result->fetchAll();

		return $items;
	}
}