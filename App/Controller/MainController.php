<?php 

namespace Gondr\Controller;

class MainController extends MasterController {

	public function index()
	{
		$this->render("main");
	}

	public function reserve()
	{
		$this->render("reserve");
	}

	public function apply()
	{
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
