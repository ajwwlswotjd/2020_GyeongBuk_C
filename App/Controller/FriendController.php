<?php 

namespace Gondr\Controller;

use Gondr\DB;
use Gondr\Lib;

class FriendController extends MasterController {

	public function find()
	{
		extract($_POST);
		if($_SESSION['user']->id == $id){
			echo json_encode(["result"=>false],JSON_UNESCAPED_UNICODE);
			exit;
		}
		$sql = "SELECT * FROM `common_user` WHERE `id` = ?";
		$user = DB::fetch($sql,[$id]);

		if($user){
			echo json_encode(["result"=>true,"name"=>$user->name],JSON_UNESCAPED_UNICODE);
			exit;
		} else {
			echo json_encode(["result"=>false],JSON_UNESCAPED_UNICODE);
			exit;
		}
	}

	public function reserve()
	{
		extract($_POST);
		$list = json_decode($list);
		$flag = false;
		$booth_idx = $idx;
		foreach ($list as $user){
			$sql = "SELECT * FROM `common_user` WHERE `id` = ?";
			$user_idx = DB::fetch($sql,[$user])->idx;
			$sql = "SELECT * FROM `reservation` WHERE `user_idx` = ? AND `booth_idx` = ?";
			$exist = DB::fetch($sql,[$user_idx,$booth_idx]);
			if($exist) $flag = true;
		}

		if($flag){
			echo json_encode(["result"=>false],JSON_UNESCAPED_UNICODE);
			exit;
		}

		foreach ($list as $user){
			$sql = "SELECT * FROM `common_user` WHERE `id` = ?";
			$user_idx = DB::fetch($sql,[$user])->idx;
				
			$sql = "INSERT INTO `reservation`(`idx`, `booth_idx`, `applicant_idx`, `user_idx`, `status`) VALUES (null,?,?,?,?)";
			$applicant_idx = $_SESSION['user']->idx;
			$status = $applicant_idx == $user_idx ? 1 : 0;
			$result = DB::query($sql,[$booth_idx,$applicant_idx,$user_idx,$status]);
		}

		echo json_encode(["result"=>true],JSON_UNESCAPED_UNICODE);
		exit;			


	}
	
}
