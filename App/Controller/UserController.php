<?php 

namespace Gondr\Controller;

class UserController extends MasterController {

	public function join_process()
	{
		extract($_POST);
		var_dump($_POST);
	}

}
