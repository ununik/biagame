<?php
class Job extends Connection
{
	public function getAllJobsToLevelAndExpierence($level, $expierence)
	{
		$db = parent::connect();
		$result = $db->prepare("SELECT * FROM `jobs` WHERE (level<=? && jobExpierence<=?) ORDER BY energy ASC ");
		$result->execute(array($level, $expierence));
		$jobs = $result->fetchAll();

		return $jobs;
	}

	public function getJobById($id, $level, $expierence)
	{
		$db = parent::connect();
		$result = $db->prepare("SELECT * FROM `jobs` WHERE id=? && level<=? && jobExpierence<=?");
		$result->execute(array($id, $level, $expierence));
		$job = $result->fetch();

		return $job;
	}

	public function doJob($energy, $minus_energy, $idActivity, $user, $money, $newJobExpierence)
	{
		$timestamp = time();
		$db = parent::connect();
		$result = $db->prepare("UPDATE `user` SET `energy`=?,`money`=?, `lastEnergyTimestamp`=?, `jobExpierence`=? WHERE id=?");
		$result->execute(array($energy, $money, $timestamp, $newJobExpierence, $user));


		$result = $db->prepare("INSERT INTO `activity`(`user`, `job`, `timestamp`, `idActivity`) VALUES (?, ?, ?, ?)");
		$result->execute(array($user, 1, $timestamp, $idActivity));
	}
}