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
    redirect("panel");
}
if($website_theme_select = false){
    redirect("panel");
}
$username = $_SESSION['username'];
require ("application/config/config.php");
include_once("application/class/mysql.php");
$MySQL = new MySQL($db_website, $mysql_username, $mysql_password, $mysql_host, $mysql_port);
if(isset($_GET['theme'])){
    $theme = mysql_real_escape_string($_GET["theme"]);
    
	$MySQL->executeSQL("SELECT * FROM default_theme WHERE value = '$username'");
    $num_rows = $MySQL->records;
	
	$MySQL->executeSQL("SELECT * FROM themes WHERE name = '$theme'");
    $exist = $MySQL->records;
	
    $result = 1;
    if($exist == 0)
		$result = -1;
        
    if($result == 1){
		if($num_rows == 1) {
			$MySQL->executeSQL("UPDATE `default_theme` SET name = '$theme' WHERE `value` = '$username'");
			$result = 0;
		} else {
			$MySQL->executeSQL("INSERT INTO `default_theme` (`value`, `name`) VALUES ('$username', '$theme');");
			$result = 0;
		}
    }
    if($result == 1 && is_numeric($result)) {
    } else {
        switch($result){
			case 0: $message = '<p class="success">پوسته تغییر کرد برای مشاهده وارد صفحه نخست شوید.</p>'; break;
            case -1: $message = '<p class="error">پوسته مورد یافت نشد.</p>'; break;
            default: $message = '<p class="error">خطایی نامعلوم رخ داده است لطفا دوباره سعی کنید. اگر باز هم دچار این خطا شدید با مدیریت تماس بگیرید.</p>'; break;
        }
    }
}
select_db($db_website);
$query = mysql_query("SELECT * FROM themes WHERE active = 1");
?>