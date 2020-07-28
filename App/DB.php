<?php 

namespace Gondr;

class DB {
	public static $con = null;

	public static function getDB()
	{

		if(self::$con == null)
		{
			self::$con = new \PDO("mysql:host=localhost;dbname=gyeongbuk;charset=utf8mb4;","root");
		}

		return self::$con;
	}

	public static function query($sql,$data)
	{
		$con = self::getDB();
		$q = $con->prepare($sql);
		$cnt = $q->execute($data);
		return $cnt;
	}

	public static function fetch($sql,$data)
	{
		$con = self::getDB();
		$q = $con->prepare($sql);
		$q->execute($data);
		return $q->fetch(\PDO::FETCH_OBJ);
	}

	public static function fetchAll($sql,$data)
	{
		$con = self::getDB();
		$q = $con->prepare($sql);
		$q->execute($data);
		return $q->fetchAll(\PDO::FETCH_OBJ);
	}
}