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
if(!isset($_SESSION['username']) || $_SESSION['username'] == "")
{
	redirect("login");
}
require ("application/config/config.php");
include_once("application/class/mysql.php");
$username = $_SESSION['username'];
$MySQL = new MySQL($db_auth, $mysql_username, $mysql_password, $mysql_host, $mysql_port);
$MySQL->executeSQL("SELECT * FROM account WHERE username = '$username';");
$id = $MySQL->arrayedResult['id'];
	
$MySQL->database = $db_website;
$MySQL->Connect($persistant);
$MySQL->executeSQL("SELECT * FROM account_data WHERE id = $id;");
$dp = $MySQL->arrayedResult['dp'];
$MySQL->executeSQL("SELECT * FROM pay_information WHERE name = '$username' AND status = 0;");
$unsuccess = $MySQL->records;
$MySQL->executeSQL("SELECT * FROM pay_information WHERE name = '$username' AND status = 1;");
$success = $MySQL->records;

select_db($db_website);
$query = mysql_query("SELECT * FROM pay_information WHERE name = '$username';") or die(mysql_error());
$rows = mysql_num_rows($query);
?>