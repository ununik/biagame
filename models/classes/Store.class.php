<?php
class Store extends Connection
{
	public function getNavigation()
	{
		$db = parent::connect();
		$result = $db->prepare("SELECT * FROM `store_Categories` ORDER BY title ASC ");
		$result->execute(array());
		$navigation = $result->fetchAll();

		return $navigation;
	}

	public function getAllItemsByCategoryAndLevel($category, $level)
	{
		$db = parent::connect();
		$result = $db->prepare("SELECT * FROM `store_Items` WHERE (`category`=? && `level`<=? && `allowedInStore`=?) ORDER BY `price` DESC ");
		$result->execute(array($category, 1, $level));
		$items = $result->fetchAll();

		return $items;
	}

	public function getItemById($id, $level = 100000)
	{
		$db = parent::connect();
		$result = $db->prepare("SELECT * FROM `store_Items` WHERE (`id`=? && `level`<=? && `allowedInStore`=?) ORDER BY `price` DESC ");
		$result->execute(array($id, 1, $level));
		$item = $result->fetch();

		return $item;
	}

	public function buyItem($id, $user, $money)
	{
		$timestamp = time();
		$db = parent::connect();
		$result = $db->prepare("INSERT INTO `user_items`(`item`, `user`, `timestamp`) VALUES (?, ?, ?)");
		$result->execute(array($id, $user, $timestamp));

		$result = $db->prepare("UPDATE `user` SET `money`=? WHERE id=?");
		$result->execute(array($money, $user));
	}
}