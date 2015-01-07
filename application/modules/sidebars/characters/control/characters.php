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
require ("application/config/config.php");
include_once("application/class/mysql.php");
$username = $_SESSION['username'];
$MySQL = new MySQL($db_auth, $mysql_username, $mysql_password, $mysql_host, $mysql_port);
$MySQL->executeSQL("SELECT * FROM account WHERE username = '$username'");
$id = $MySQL->arrayedResult['id'];

if(isset($_POST['characters'])){
	$character = mysql_real_escape_string($_POST["character"]);
	
	$MySQL->database = $db_website;
	$MySQL->Connect($persistant);
	$MySQL->executeSQL("SELECT * FROM characters WHERE name = '$character'");
	$char_rows = $MySQL->records;
	
	if($char_rows != 0){
		$_SESSION['main_char'] = $character;
	} else {
		unset($_SESSION['main_char']);
	}
	
	if($_POST["character"] == "")
		unset($_SESSION['main_char']);
}
$main_char = $_SESSION['main_char'];
$MySQL->database = $db_characters;
$MySQL->Connect($persistant);
$MySQL->executeSQL("SELECT * FROM characters WHERE name = '$main_char'");
$race = $MySQL->arrayedResult['race'];
$class = $MySQL->arrayedResult['class'];
$gender = $MySQL->arrayedResult['gender'];
$level = $MySQL->arrayedResult['level'];
$online = $MySQL->arrayedResult['online'];

$query = mysql_query("SELECT * FROM characters WHERE account = '$id'");
?>