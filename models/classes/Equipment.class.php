<?php
class Equipment extends Connection
{
	private $store; //object;
	/**
	 * get all user items (also with names), when repeat, it's shown by number
	 * @param int $user
	 */
	public function getAllItemsOnePlusNumber($user)
	{
		$db = parent::connect();
		$result = $db->prepare("SELECT * FROM `user_items` WHERE user=?");
		$result->execute(array($user));
		$itemsSelect= $result->fetchAll();
		$items = array();
		
		
		for($i = 0; $i < count($itemsSelect); $i++)
		{
			$saved = false;
			for($n = 0; $n < count($items); $n++)
			{
				if($items[$n]['item_id'] == $itemsSelect[$i]['item']){
					$items[$n]['count']++;
					$saved = true;
					continue;
				}
			}

			if(!$saved){
				$itemNumber = count($items);
				$storeItem = $this->getItemById($itemsSelect[$i]['item']);
				
				$items[$itemNumber]['item_id'] = $itemsSelect[$i]['item'];
				$items[$itemNumber]['count'] = 1;
				$items[$itemNumber]['name'] = $storeItem['name'];
				$items[$itemNumber]['firma'] = $storeItem['firma'];
				$items[$itemNumber]['description'] = $storeItem['description'];
				$items[$itemNumber]['category'] = $this->getCategoryById($itemsSelect[$i]['item']);
			}
		}
		
		return $items;
	}
	
	public function getCategoryById($id)
	{
		$db = parent::connect();
		$result = $db->prepare("SELECT * FROM `store_Categories` WHERE id=? ");
		$result->execute(array($id));
		$navigation = $result->fetch();
	
		return $navigation['title'];
	}
	
	public function getItemById($id)
	{
		$db = parent::connect();
		$result = $db->prepare("SELECT * FROM `store_Items` WHERE `id`=? ");
		$result->execute(array($id));
		$item = $result->fetch();
	
		return $item;
	}
}