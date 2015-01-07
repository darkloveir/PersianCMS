<?php
/*
	This is a Full Featured CMS for all.
	You may also have problems with this. Please report issues. we will fix that soon.
	Copyright (C) 2015  AmirHosein.L Email:AmirOperator@gmail.com

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
if($_SESSION['username'] == ""){
	redirect("login");
}
$username = $_SESSION['username'];
$cryptinstall="application/plugins/crypt/cryptographp.fct.php";
include_once $cryptinstall;
require ("application/config/config.php");
include_once("application/class/mysql.php");

$MySQL = new MySQL($db_auth, $mysql_username, $mysql_password, $mysql_host, $mysql_port);
$MySQL->executeSQL("SELECT * FROM account WHERE username = '$username'");
$arrayedResult = $MySQL->arrayedResult;

$status = '<span class="label label-success">فعال</span>';
$id = $arrayedResult['id'];
$locked = $arrayedResult['locked'];

$MySQL->executeSQL("SELECT * FROM account_banned WHERE id = $id AND active = 1");
$banned = $MySQL->records;

$MySQL->executeSQL("SELECT * FROM account_access WHERE id = '$id' AND gmlevel > 0");
$access = $MySQL->records;

$rank = "بازیکن";

if($access > 0) {
	$rank = "مدیر";
}

if($locked == 1) {
	$status = '<a href="unlock"><span class="label label-warning">قفل شده</span></a>';
} elseif($banned == 1) {
	$status = '<a href="unban"><span class="label label-danger">توقیف شده</span></a>';
}

$MySQL->database = $db_website;
$MySQL->Connect($persistant);
$MySQL->executeSQL("SELECT * FROM account_data WHERE id = $id");
$user_rows = $MySQL->records;
$arrayedResult2 = $MySQL->arrayedResult;

if($user_rows == 0) {
	redirect("info");
}
?>