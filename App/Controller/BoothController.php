<?php

namespace Gondr\Controller;

use Gondr\Lib;
use Gondr\DB;

class BoothController extends MasterController {
	public function apply()
	{
		extract($_POST);
		$sql = "SELECT * FROM `booth`";
		$list = DB::fetchAll($sql,[]);

		$flag = false;
		for($j = 0; $j <= $type; $j++)
		{
			$x = explode(",",$position)[0]*1;
			$y = explode(",",$position)[1]*1;
			$post =  $x+$j.','.$y;
			foreach ($list as $booth)
			{
				for($i = 0; $i <= $booth->type; $i++)
				{
					$x = explode(",",$booth->position)[0]*1;
					$y = explode(",",$booth->position)[1]*1;
					$str =  $x+$i.','.$y;
					if($str == $post){
						$flag = true;
						break;
					}
				}
				if($flag) break;
			}
			if($flag) break;
		}
		if($flag){
			echo json_encode(["result"=>false],JSON_UNESCAPED_UNICODE);
			exit;
		}

		$sql = "INSERT INTO `booth`(`idx`, `name`, `price`, `gender`, `position`, `writer`, `age`,`type`) VALUES (null,?,?,?,?,?,?,?)";
		$writer = $_SESSION['user']->idx;
		$result = DB::query($sql,[$name,$price,$gender,$position,$writer,$age,$type]);
		echo json_encode(["result"=>true],JSON_UNESCAPED_UNICODE);
		exit;
	}
}