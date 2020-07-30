<?php 

namespace Gondr;

class Lib {
	
	public static function moveLink($link)
	{
		echo "<script>";
		echo "location.href='$link';";
		echo "</script>";
	}

	public static function backLink()
	{
		echo "<script>";
		echo "history.back();";
		echo "</script>";
	}

	public static function msgBackLink($msg)
	{
		echo "<script>";
		echo "alert('$msg');";
		echo "history.back();";
		echo "</script>";
	}

	public static function msgMoveLink($link,$msg)
	{
		echo "<script>";
		echo "alert('$msg');";
		echo "location.href='$link';";
		echo "</script>";
	}
}