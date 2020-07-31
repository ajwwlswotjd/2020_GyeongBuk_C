<?php 

namespace Gondr\Controller;

use Gondr\Lib;
use Gondr\DB;

class MainController extends MasterController {

	public function index()
	{
		$this->render("main");
	}

	public function reserve()
	{
		if(!__SIGN){
			Lib::msgMoveLink('/login','일반 회원으로 로그인 후 사용하셈');
			exit;
		}

		if($_SESSION['type'] !== 'common'){
			Lib::msgBackLink('일반 회원만 이용가능');
			exit;	
		}

		$sql = "SELECT * FROM booth WHERE idx NOT IN ( SELECT booth_idx AS idx FROM reservation WHERE user_idx = ?)";
		
		$boothList = DB::fetchAll($sql,[$_SESSION['user']->idx]);

		$user_age = $_SESSION['user']->age;
		$user_gender = $_SESSION['user']->gender;
		foreach ($boothList as $booth)
		{
			$step = -1;
			$age = $booth->age;
			$gender = $booth->gender;
			if(strpos($age, $user_age) && $user_gender == $gender) $step = 0;
			else if(strpos($age, $user_age) && $user_gender != $gender) $step = 1;
			else if(
				(strpos($age, $user_age+10) || strpos($age, $user_age+20) || strpos($age, $user_age-10) || strpos($age, $user_age-20)) &&
				($user_gender == $gender)
			) $step = 2;
			else if(
				(strpos($age, $user_age+10) || strpos($age, $user_age+20) || strpos($age, $user_age-10) || strpos($age, $user_age-20)) &&
				($user_gender != $gender)
			) $step = 3;
			else if($gender == $user_gender) $step = 4;
			else $step = 5;
			// echo $step;
			$sql = "SELECT count(*) as cnt FROM `reservation` WHERE `booth_idx` = ?";
			$cnt = DB::fetch($sql,[$booth->idx])->cnt;
			$booth->cnt = $cnt;
			$booth->step = $step;
		}


		usort($boothList,function($a,$b){
			if($a->step > $b->step) return 1;
			else if($a->step < $b->step) return -1;
			else return $a->cnt - $b->cnt;
		});

		$sql = "SELECT * FROM `booth`";
		$list = DB::fetchAll($sql,[]);
		$this->render("reserve",["list"=>$list,"booths"=>$boothList]);
	}

	public function apply()
	{	
		if(!__SIGN){
			Lib::msgMoveLink('/login','BIZ 회원으로 로그인 후 사용하셈');
			exit;
		}

		if($_SESSION['type'] !== 'biz'){
			Lib::msgBackLink('BIZ 회원만 이용가능');
			exit;	
		}
		
		$this->render("apply");
	}

	public function attend()
	{
		$this->render("attend");
	}

	public function login()
	{
		$this->render("login");
	}

	public function join()
	{
		$this->render("join");
	}
}
