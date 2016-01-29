<?php
class Competition extends Connection
{
	/**
	 * check competition and results
	 */
	public function __construct()
	{
		$db = parent::connect();
		$timestamp = time();

		$result = $db->prepare("SELECT id FROM `competition` WHERE `date`<? && results_done=? && results=?");
		$result->execute(array($timestamp, 0, 0));
		$items = $result->fetchAll();

		$result = $db->prepare("UPDATE `competition` SET `results`=? WHERE `date`<?");
		$result->execute(array(1, $timestamp));
		foreach ($items as $item)
		{
			$this->doResults($item['id']);
			$result = $db->prepare("UPDATE `competition` SET `results_done`=? WHERE `id`=?");
			$result->execute(array(1, $item['id']));
		}
	}

	public function doResults($competition)
	{
		$race = $this->getCompetition($competition,1000000000);


		$db = parent::connect();
		$result = $db->prepare("SELECT * FROM `competition_registration` WHERE `competition`=?");
		$result->execute(array($competition));
		$startList = $result->fetchAll();

		for($i = 0; $i < count($startList); $i++)
		{
			$resultsUser[$i]['id'] = $startList[$i]['id'];
			$resultsUser[$i]['user'] = $startList[$i]['user'];
			$profil = new Profil($startList[$i]['user']);

			/**
			 * If enegy for competition is higher then user energy -> user energy will be used
			 */
			if($race['energy'] < $profil->getActulaEnergy()){
				$resultsUser[$i]['energy'] = $race['energy'];
			} else {
				$resultsUser[$i]['energy'] = $profil->getActulaEnergy();
			}

			$results[$i]['rand'] = rand(1000, 1500);

			$results[$i]['exeperience'] = $profil->getCompetitionExperience();

			//activity points
			$resultsUser[$i]['timePoints'] = 0;
			$resultsUser[$i]['timePoints'] += $race['muscles'] * $profil->getMuscles();
			$resultsUser[$i]['timePoints'] += $race['endurance'] * $profil->getEndurance();
			$resultsUser[$i]['timePoints'] += $race['stability'] * $profil->getStability();
			$resultsUser[$i]['timePoints'] += $race['psyche'] * $profil->getPsyche();
			$resultsUser[$i]['timePoints'] += $race['morale'] * $profil->getMorale();
			$resultsUser[$i]['timePoints'] += round (($resultsUser[$i]['timePoints'] * $results[$i]['rand']) / 1000);

			//prone points
			$resultsUser[$i]['pronePoints'] = 0;
			$resultsUser[$i]['pronePoints'] += $race['accuracy'] * $profil->getAccuracy();
			$resultsUser[$i]['pronePoints'] += $race['psyche'] * $profil->getPsyche();
			$resultsUser[$i]['pronePoints'] += $race['morale'] * $profil->getMorale();
			$resultsUser[$i]['pronePoints'] += round (($resultsUser[$i]['pronePoints'] * $results[$i]['rand']) / 1000);
			$resultsUser[$i]['pronePoints'] += round (($resultsUser[$i]['pronePoints'] * ($results[$i]['exeperience']+ 1000))/1000);

			//standing points
			$resultsUser[$i]['standingPoints'] = 0;
			$resultsUser[$i]['standingPoints'] += $race['muscles'] * $profil->getMuscles();
			$resultsUser[$i]['standingPoints'] += $race['accuracy'] * $profil->getAccuracy();
			$resultsUser[$i]['standingPoints'] += $race['stability'] * $profil->getStability();
			$resultsUser[$i]['standingPoints'] += $race['psyche'] * $profil->getPsyche();
			$resultsUser[$i]['standingPoints'] += $race['morale'] * $profil->getMorale();
			$resultsUser[$i]['standingPoints'] += round (($resultsUser[$i]['standingPoints'] * $results[$i]['rand']) / 1000);
			$resultsUser[$i]['standingPoints'] += round (($resultsUser[$i]['standingPoints'] * ($results[$i]['exeperience']+ 1000))/1000);


			$resultsUser[$i]['timePoints'] = $resultsUser[$i]['timePoints'] + $resultsUser[$i]['pronePoints'] + $resultsUser[$i]['standingPoints'];
			$resultsUser[$i]['timePoints'] += round (($resultsUser[$i]['timePoints'] * ($results[$i]['exeperience']+ 1000))/1000);
			if($resultsUser[$i]['energy'] != 0){
				$resultsUser[$i]['timePoints'] = $resultsUser[$i]['timePoints'] * $resultsUser[$i]['energy'];
			} else {
				$resultsUser[$i]['timePoints'] = $resultsUser[$i]['timePoints'] * 0.5;
			}

			$timestamp = time();
			$result = $db->prepare("UPDATE `competition_registration` SET `prone_points`=?, `standing_points`=?, `time_points`=?, `rand`=? WHERE `id`=?");
			$result->execute(array($resultsUser[$i]['pronePoints'], $resultsUser[$i]['standingPoints'], $resultsUser[$i]['timePoints'], $results[$i]['rand'], $resultsUser[$i]['id']));

			$energy = $profil->getActulaEnergy() - $resultsUser[$i]['energy'];
			$result = $db->prepare("UPDATE `user` SET `competition_experience`=?, `energy`=?, `lastEnergyTimestamp`=? WHERE `id`=?");
			$result->execute(array($results[$i]['exeperience']+1, $energy, $timestamp, $resultsUser[$i]['user']));


			$result = $db->prepare("INSERT INTO `activity`(`user`, `competition`, `timestamp`, `idActivity`) VALUES (?, ?, ?, ?)");
			$result->execute(array($resultsUser[$i]['user'], 1, $timestamp, $competition));
	}

//RESULTS
		$result = $db->prepare("SELECT id FROM `competition_registration` WHERE `competition`=? ORDER BY `time_points`");
		$result->execute(array($competition));
		$startList = $result->fetchAll();
		for($i = 0; $i < count($startList); $i++)
		{
			$result = $db->prepare("UPDATE `competition_registration` SET `result`=? WHERE `competition`=? &&`user`=?");
			$result->execute(array($i+1, $competition, $resultsUser[$i]['user']));
		}


		//PRONE
		$result = $db->prepare("SELECT `id`, `prone_points`  FROM `competition_registration` WHERE `competition`=? ORDER BY `prone_points`");
		$result->execute(array($competition));
		$startList = $result->fetchAll();
		for($i = 0; $i < count($startList); $i++)
		{
			$procent = round ((100*$startList[$i]['prone_points'])/$startList[0]['prone_points']);
			if($procent > 88){
				$shooting = 0;
			} else if($procent > 75){
				$shooting = 1;
			} else if($procent > 60){
				$shooting = 2;
			} else if($procent > 48){
				$shooting = 3;
			} else if($procent > 35){
				$shooting = 4;
			}else {
				$shooting = 5;
			}

			$result = $db->prepare("UPDATE `competition_registration` SET `prone`=? WHERE `id`=?");
			$result->execute(array($shooting, $startList[$i]['id']));
		}

		//STANDING
		$result = $db->prepare("SELECT `id`, `standing_points`  FROM `competition_registration` WHERE `competition`=? ORDER BY `standing_points`");
		$result->execute(array($competition));
		$startList = $result->fetchAll();
		for($i = 0; $i < count($startList); $i++)
		{
			$procent = round ((100*$startList[$i]['standing_points'])/$startList[0]['standing_points']);
			if($procent > 92){
				$shooting = 0;
			} else if($procent > 85){
				$shooting = 1;
			} else if($procent > 77){
				$shooting = 2;
			} else if($procent > 68){
				$shooting = 3;
			} else if($procent > 50){
				$shooting = 4;
			}else {
				$shooting = 5;
			}

			$result = $db->prepare("UPDATE `competition_registration` SET `standing`=? WHERE `id`=?");
			$result->execute(array($shooting, $startList[$i]['id']));
		}

	}

	public function getCompetitions($level = 0)
	{
		$db = parent::connect();
		$timestamp = time();
		$result = $db->prepare("SELECT * FROM `competition` WHERE (`level`<=? && `date`>=?) ORDER BY `level` DESC ");
		$result->execute(array($level, $timestamp));
		$items = $result->fetchAll();

		return $items;
	}

	public function getCompetition($id,$level = 0)
	{
		$db = parent::connect();
		$result = $db->prepare("SELECT * FROM `competition` WHERE (`level`<=? && `id`=?)");
		$result->execute(array($level, $id));
		$item = $result->fetch();

		return $item;
	}

	public function userIsRegistratedOnCompetition($user, $competition)
	{
		$db = parent::connect();
		$result = $db->prepare("SELECT * FROM `competition_registration` WHERE (`user`=? && `competition`=?)");
		$result->execute(array($user, $competition));
		$registration = $result->fetch();
		if($registration['id'] != "")
		{
			return true;
		} else {
			return false;
		}
	}

	public function registrateUserForCompetition($user, $competition)
	{
		$timestamp = time();
		$db = parent::connect();
		$result = $db->prepare("INSERT INTO `competition_registration`(`user`, `competition`, `timestamp`) VALUES (?, ?, ?)");
		$result->execute(array($user, $competition, $timestamp));
	}

	public function getStartList($competition)
	{
		$db = parent::connect();
		$result = $db->prepare("SELECT * FROM `competition_registration` WHERE `competition`=? ORDER BY `timestamp` ASC ");
		$result->execute(array($competition));
		$startList = $result->fetchAll();

		return $startList;
	}

	public function getDoneCompetitionWithUser($user)
	{
		$db = parent::connect();
		$result = $db->prepare("SELECT `competition` FROM `competition_registration` WHERE `user`=?");
		$result->execute(array($user));
		$competitions = $result->fetchAll();

		$item = array();
		foreach($competitions as $competition)
		{
			$timestamp = time();
			$result = $db->prepare("SELECT * FROM `competition` WHERE (`id`=? && `date`<=?)");
			$result->execute(array($competition['competition'], $timestamp));
			$item[] = $result->fetchAll();
		}

		return $item;
	}

	public function getResultList($competition)
	{
		$db = parent::connect();
		$result = $db->prepare("SELECT * FROM `competition_registration` WHERE `competition`=? ORDER BY `result` ASC ");
		$result->execute(array($competition));
		$list = $result->fetchAll();

		return $list;
	}
}