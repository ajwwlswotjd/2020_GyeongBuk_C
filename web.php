<?php

use Gondr\DB;
use Gondr\Route;

Route::get("/","MainController@index");
Route::get("reserve","MainController@reserve");
Route::get("apply","MainController@apply");
Route::get("attend","MainController@attend");
Route::get("login","MainController@login");
Route::get("join","MainController@join");
Route::get("logout","UserController@logout");

Route::post("join/common","UserController@join_common");
Route::post("join/biz","UserController@join_biz");
Route::post("login/process","UserController@login");
Route::post("booth/apply","BoothController@apply");
Route::post("friend/find","FriendController@find");
Route::post("friend/reserve","FriendController@reserve");
Route::post("booth/reserve/auto","BoothController@auto_reserve");

Route::post("reserve/accept","BoothController@accept");
Route::post("reserve/reject","BoothController@reject");