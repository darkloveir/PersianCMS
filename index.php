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
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if (!isset($_SESSION))
	session_start();
	
require_once ("application/config/config.php");
include_once("application/class/mysql.php");

$MySQL = new MySQL($db_website, $mysql_username, $mysql_password, $mysql_host, $mysql_port);
$MySQL->executeSQL("SELECT name FROM default_theme WHERE value = '0'");
$result = $MySQL->arrayedResult;
$_SESSION['theme'] = $result['name'];

if($_SESSION['username'] != "" && $website_theme_select == true){
	$MySQL->executeSQL("SELECT name FROM default_theme WHERE value = '".$_SESSION['username']."'");
	$result = $MySQL->arrayedResult;
	$num_rows = $MySQL->records;
	if($num_rows > 0) {
		$_SESSION['theme'] = $result['name'];
	}	
}
$website_theme = $_SESSION['theme'];

if(!isset($_SESSION['language'])) {
	$_SESSION['language'] = $website_language;
}

if($_SESSION['username'] == "") {
  if(isset($_GET['lang'])) {
	  $_SESSION['language'] = $_GET['lang'];
  }
  
  $lang = $_SESSION['language'];
  
  $MySQL->executeSQL("SELECT * FROM languages WHERE lang = '$lang'");
  
  $rows = $MySQL->records;
  $dir = $MySQL->arrayedResult['direction'];
  if($rows == 0) {
	  echo "This Language is not valid.";	
  } else {
	  $_SESSION['language'] = $lang;
  }
  
} else {
	$username = $_SESSION['username'];
	$MySQL->database = $db_auth;
	$MySQL->Connect($persistant);
	$MySQL->executeSQL("SELECT * FROM account WHERE username = '$username'");
	$id = $MySQL->arrayedResult['id'];
	
	$MySQL->database = $db_website;
	$MySQL->Connect($persistant);
	$MySQL->executeSQL("SELECT * FROM account_data WHERE id = '$id'");
	$num_rows = $MySQL->records;
	if($num_rows == 1) {
		if(isset($_GET['lang'])) {
			$MySQL->executeSQL("UPDATE `account_data` SET `lang` = '".$_GET['lang']."'");
		}
		$lang = $MySQL->arrayedResult['lang'];
		$MySQL->executeSQL("SELECT * FROM languages WHERE lang = '$lang'");
		$rows = $MySQL->records;
		$dir = $MySQL->arrayedResult['direction'];
		
		if($rows == 0) {
			echo "This Language is not valid. you must select a valid language";
		} else {
			$_SESSION['language'] = $lang;
		}
	} else {
		$lang = $_SESSION['language'];
		$MySQL->executeSQL("SELECT * FROM languages WHERE lang = '$lang'");
		$rows = $MySQL->records;
		$dir = $MySQL->arrayedResult['direction'];
		
		if($rows == 0) {
			echo "This Language is not valid. you must select a valid language";
		} else {
			$_SESSION['language'] = $lang;
		}
		
		if(isset($_GET['lang'])) {
			$_SESSION['language'] = $_GET['lang'];
		}
	}
}
$_SESSION['website_address'] = $website_address; 
$connection_setup = mysql_connect($mysql_host . ':' . $mysql_port, $mysql_username, $mysql_password) or die("اConnection Lost :". mysql_error());
include ("application/functions/functions.php");
include ("application/themes/" . $website_theme . "/" . $dir . "/theme.php");
?>