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
require 'application/plugins/phpmailer/PHPMailerAutoload.php';
include_once("application/class/mysql.php");

$MySQL = new MySQL($db_auth, $mysql_username, $mysql_password, $mysql_host, $mysql_port);
$MySQL->executeSQL("SELECT * FROM account WHERE username = '$username'");
$id = $MySQL->arrayedResult['id'];

$MySQL->database = $db_website;
$MySQL->Connect($persistant);
$MySQL->executeSQL("SELECT * FROM bugreport WHERE id = $id");

if(isset($_POST['info'])){
	$mozo = mysql_real_escape_string($_POST["mozo"]);
	$report = mysql_real_escape_string($_POST["report"]);
	$captcha = mysql_real_escape_string($_POST["captcha"]);
	$olaviat = mysql_real_escape_string($_POST["olaviat"]);
	$noebug = mysql_real_escape_string($_POST["noebug"]);
	
	$result = 1;
	if($mozo == "" || $olaviat == "" || $noebug == "" || $report == "")
	   $result = -1;
	   
	if($result == 1) {
		$mail = new PHPMailer;
		$mail->isSMTP(); // Set mailer to use SMTP
		$mail->Host = $smtp_host; // Specify main and backup SMTP servers
		$mail->SMTPAuth = true; // Enable SMTP authentication
		$mail->Username = $smtp_username; // SMTP username
		$mail->Password = $smtp_password; // SMTP password
		$mail->SMTPSecure = $smtp_secure;  // Enable TLS encryption, `ssl` also accepted
		$mail->Port = $smtp_port; // TCP port to connect to
		$mail->From = $smtp_from;
		$mail->FromName = $smtp_fromname;
		$mail->addAddress($email, $username); // Add a recipient // Name is optional
		$mail->addReplyTo($smtp_fromname, $smtp_replytoname);
		$mail->WordWrap = 50; // Set word wrap to 50 characters
		$mail->isHTML(true); // Set email format to HTML
		$mail->Subject = $smtp_subject;
		$mail->Body    = $smtp_body;
		$mail->AltBody = $smtp_altbody;
		$MySQL->executeSQL("INSERT INTO bugreport (`id`, `mozo`, `report`, `olaviat`, `noebug`) VALUES (".$id.", '".$mozo."', '".$report."', '".$olaviat."', '".$noebug."');");
		$result = 0;
	}
	
	if($result == 1 && is_numeric($result)) {
		//redirect("panel");
	} else {
		switch($result){
			case 0:  $message = '<p class="success"><a href="panel">عملیات با موفقیت انجام شد.</a></p>'; break;
			case -1: $message = '<p class="error">تمامی فیلد ها را پر کنید.</p>'; break;
		}
	}
}
?>