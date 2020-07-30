<?php 

namespace Gondr\Controller;

use Gondr\DB;
use Gondr\Lib;

class UserController extends MasterController {

	public function join_common()
	{
		extract($_POST);

		$sql = "SELECT * FROM `biz_user` WHERE `id` = ?";
		$user = DB::fetch($sql,[$id]);
		if($user){
			Lib::msgBackLink('중복되는 아이디 입니다.');
			exit;
		}

		$sql = "INSERT INTO `common_user`(`idx`, `password`, `name`, `gender`, `age`, `id`) VALUES (null,?,?,?,?,?)";

		$result = DB::query($sql,[$pwd,$name,$gender,$age,$id]);
		if($result){

			Lib::moveLink('/login');
			exit;

		} else {

			Lib::msgBackLink('중복되는 아이디 입니다.');
			exit;

		}
	}

	public function join_biz()
	{
		extract($_POST);

		$sql = "SELECT * FROM `common_user` WHERE `id` = ?";
		$user = DB::fetch($sql,[$id]);
		if($user){
			Lib::msgBackLink('중복되는 아이디 입니다.');
			exit;
		}

		$sql = "INSERT INTO `biz_user`(`idx`, `id`, `password`, `name`, `number`, `type`) VALUES (null,?,?,?,?,?)";

		$result = DB::query($sql,[$id,$pwd,$name,$number,$type]);
		if($result){

			Lib::moveLink('/login');
			exit;

		} else {

			Lib::msgBackLink('중복되는 아이디 입니다.');
			exit;

		}
	}


	public function login()
	{
		extract($_POST);
		$sql = "SELECT * FROM `common_user` WHERE `id` = ? AND `password` = ?";
		$user = DB::fetch($sql,[$id,$pwd]);
		if($user){
			$_SESSION['user'] = $user;
			$_SESSION['type'] = 'common';
			Lib::msgMoveLink('/','로그인이 완료되었습니다.');
			exit;
		}

		$sql = "SELECT * FROM `biz_user` WHERE `id` = ? AND `password` = ?";
		$user = DB::fetch($sql,[$id,$pwd]);
		if($user){
			$_SESSION['user'] = $user;
			$_SESSION['type'] = 'biz';
			Lib::msgMoveLink('/','로그인이 완료되었습니다.');
			exit;
		}

		Lib::msgBackLink('아이디 또는 비밀번호가 틀립니다');
		exit;
	}

	public function logout()
	{
		unset($_SESSION['user']);
		unset($_SESSION['type']);
		Lib::msgMoveLink('/','로그아웃이 완료되었습니다.');
	}
}
