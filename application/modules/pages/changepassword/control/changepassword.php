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
if($_SESSION['username'] == "")
{
	redirect("panel");
}
$cryptinstall="application/plugins/crypt/cryptographp.fct.php";
include_once $cryptinstall;
require ("application/config/config.php");
include_once("application/class/mysql.php");
$MySQL = new MySQL($db_auth, $mysql_username, $mysql_password, $mysql_host, $mysql_port);
if(isset($_POST['changepassword']))
{
	$username = mysql_real_escape_string($_SESSION['username']);
	$oldpassword = mysql_real_escape_string($_POST['oldpassword']);
	$password = mysql_real_escape_string($_POST['password']);
	$confirmPassword = mysql_real_escape_string($_POST['confirmPassword']);
	$reg_mail = mysql_real_escape_string(strtoupper($_POST['reg_mail']));
	
	$oldpassword_hash = sha1(strtoupper($username) . ":" . strtoupper($oldpassword));
	$password_hash = sha1(strtoupper($username) . ":" . strtoupper($password));
	$confirmPassword_hash = sha1(strtoupper($username) . ":" . strtoupper($confirmPassword));

	$_username = strtoupper($username);
	$_oldpassword = strtoupper($oldpassword_hash);
	$_password = strtoupper($password_hash);
	$_confirmPassword = strtoupper($confirmPassword_hash);
	
	$MySQL->executeSQL("SELECT * FROM account WHERE username = '$_username' AND sha_pass_hash = '$_oldpassword'");
	$pass_num_rows = $MySQL->records;
	
	$MySQL->executeSQL("SELECT * FROM account WHERE username = '$_username' AND reg_mail = '$reg_mail'");
	$mail_num_rows = $MySQL->records;
	
	$result = 1;
	if($_POST['oldpassword'] == "" || $_POST['password'] == "" || $_POST['password'] == "" || $_POST['confirmPassword'] == "" || $_POST['reg_mail'] == "")
	   $result = -1;
	   
	if (!chk_crypt($_POST['captcha']))
		$result = -2;
	
	if($pass_num_rows == 0)
		$result = -3;
		
	if($password != $confirmPassword)
		$result = -4;
		
	if (strlen($_POST['password']) < 6 || strlen($_POST['password']) > 16)
		$result = -5;
		
	if($mail_num_rows == 0)
		$result = -6;
		
	if($result == 1)
	{
		$MySQL->executeSQL("UPDATE account SET sha_pass_hash = '$_password' WHERE username = '$_username'");
		$MySQL->executeSQL("UPDATE account SET v = '0' WHERE username = '$_username'");
		$MySQL->executeSQL("UPDATE account SET s = '0' WHERE username = '$_username'");
		$result = 0;
	}
	if($result == 1 && is_numeric($result)) {
		//redirect("panel");
	} else {
		switch($result)
		{
			case 0:  $message = '<p class="success"><a href="panel">عملیات با موفقیت انجام شد.</a></p>'; break;
			case -1: $message = '<p class="error">تمامی فیلد ها را پر کنید.</p>'; break;
			case -2: $message = '<p class="error">تصوير امنيتي را به درستي وارد نکرديد.</p>'; break;
			case -3: $message = '<p class="error">رمز عبور فعلی اشتباه میباشد.</p>'; break;
			case -4: $message = '<p class="error">رمز عبور با هم مطابقت ندارد</p>'; break;
			case -5: $message = '<p class="error">رمز عبور باید بین 6 تا 16 کاراکتر باشد</p>'; break;
			case -6: $message = '<p class="error">لطفا ایمیلی که هنگام ساخت اکانت کرده اید را وارد کنید.</p>'; break;
			default: $message = '<p class="error">خطایی نامعلوم رخ داده است لطفا دوباره سعی کنید. اگر باز هم دچار این خطا شدید با مدیریت تماس بگیرید.</p>'; break;
		}
	}
}
?>