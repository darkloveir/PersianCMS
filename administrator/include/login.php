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
include ("../config.php");
include ("connection.php");
$connection_setup = mysql_connect($mysql_host . ':' . $mysql_port, $mysql_username, $mysql_password) or die("ارتباط با سرور قطع شد"); // ایجاد کانکشن با دیتابیس

if(isset($_POST["send"]))
{
	if($_POST["username"] != "" && $_POST["password"] != "")
	{
	  $username = mysql_real_escape_string($_POST["username"]);
	  $password = mysql_real_escape_string($_POST["password"]);
	  $sha_pass_hash = sha1(strtoupper($username ) . ":" . strtoupper($password));
	  
	  $db_setup = mysql_select_db($db_auth,$connection_setup)or die(mysql_error());
	  $login_query = mysql_query("SELECT gmlevel,username,sha_pass_hash from account inner join account_access on account.id = account_access.id where username = '" . strtoupper($username) . "'");
	  
	  $login = mysql_fetch_assoc($login_query);
	  if (strtoupper($login['sha_pass_hash']) === strtoupper($sha_pass_hash) && $login['gmlevel'] >= 3) {
		  $_SESSION['gamemaster'] = $username;
		echo 1;	
	  }
	  else
	  {
		echo 2;	
	  }
	}
	else
	{
		echo 3;	
	}
}
mysql_close();
?>