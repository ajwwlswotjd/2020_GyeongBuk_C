<?php

use Gondr\DB;
use Gondr\Route;

Route::get("/","MainController@index");
Route::get("reserve","MainController@reserve");
Route::get("apply","MainController@apply");
Route::get("attend","MainController@attend");
Route::get("login","MainController@login");
Route::get("join","MainController@join");

Route::post("join/common","UserController@join_common");