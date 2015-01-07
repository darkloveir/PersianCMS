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
require ("application/config/smtp.php");
require 'application/plugins/phpmailer/PHPMailerAutoload.php';
include_once("application/class/mysql.php");

$MySQL = new MySQL($db_auth, $mysql_username, $mysql_password, $mysql_host, $mysql_port);
$MySQL->executeSQL("SELECT * FROM account WHERE username = '$username'");
$id = $MySQL->arrayedResult['id'];

$MySQL->database = $db_website;
$MySQL->Connect($persistant);
$MySQL->executeSQL("SELECT * FROM account_data WHERE id = $id");
$user_rows = $MySQL->records;

if($user_rows == 1) {
	redirect("panel");
}

if(isset($_POST['info'])){
	$fname = mysql_real_escape_string($_POST["fname"]);
	$lname = mysql_real_escape_string($_POST["lname"]);
	$gender = mysql_real_escape_string($_POST["gender"]);
	$country = mysql_real_escape_string($_POST["country"]);
	$language = mysql_real_escape_string($_POST["language"]);
	$birthday = mysql_real_escape_string($_POST["birthday"]);
	$number = mysql_real_escape_string($_POST["number"]);
	$mellicode = mysql_real_escape_string($_POST["mellicode"]);
	$captcha = mysql_real_escape_string($_POST["captcha"]);
	$question = mysql_real_escape_string($_POST["question"]);
	$answer = mysql_real_escape_string($_POST["answer"]);
	$activecode = md5(uniqid(rand()));
	
	$result = 1;
	if($fname == "" || $lname == "" || $country == "" || $language == "" ||  $birthday == "" || $number == "" || $mellicode == "" || $captcha == "" || $question == "" || $answer == "")
	   $result = -1;
	   
	if (!chk_crypt($_POST['captcha']))
	   $result = -2;
	
	if ((strlen($number) < 9 || strlen($number) > 11) && !is_numeric($number))
		$result = -5;
		
	if ((strlen($mellicode) < 9 || strlen($mellicode) > 11) && !is_numeric($mellicode))
		$result = -6;
		
	if (!preg_match("/^[a-zابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی]+$/", $answer))
		$result = -7;
	   
	if($result == 1) {
		$link_active = $website_address.'unlock/'.$activecode_new;
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
		$mail->Body    = $smtp_body.$link_active;
		$mail->AltBody = $link_active;
		$MySQL->executeSQL("INSERT INTO account_data (`id`, `fname`, `lname`, `gender`, `country`, `lang`, `birthday`, `phonenumber`, `mellicode`, `question`, `answer`, `activecode`) VALUES (".$id.", '".$fname."', '".$lname."', '".$gender."', '".$country."', '".$language."', '".$birthday."', '".$number."', '".$mellicode."', ".$question.", '".$answer."', '".$activecode."');");
		$MySQL->database = $db_auth;
		$MySQL->Connect($persistant);
		$MySQL->executeSQL("UPDATE `account` SET locked = 0 WHERE `id` = '$id'");
		$result = 0;
		if(!$mail->send())
			$result = -8;
	}
	
	if($result == 1 && is_numeric($result)) {
		//redirect("panel");
	} else {
		switch($result){
			case 0:  $message = '<p class="success"><a href="panel">عملیات با موفقیت انجام شد.</a></p>'; break;
			case -1: $message = '<p class="error">تمامی فیلد ها را پر کنید.</p>'; break;
			case -2: $message = '<p class="error">تصوير امنيتي را به درستي وارد نکرديد</p>'; break;
			case -5: $message = '<p class="error">شماره تلفن وارد شده نامعتبر میباشد</p>'; break;
			case -6: $message = '<p class="error">کد ملی وارد شده نامعتبر نیست</p>'; break;
			case -7: $message = '<p class="error">پاسخ فقط شامل حروف فارسی و انگلیسی کوچک میباشد !</p>'; break;
			case -8: $message = '<p class="warning"><a href="unlock">مشخصات شما کامل شد ولی ایمیل فعال سازی ارسال نشد.</a></p>'; break;
			default: $message = '<p class="error">خطایی نامعلوم رخ داده است لطفا دوباره سعی کنید. اگر باز هم دچار این خطا شدید با مدیریت تماس بگیرید.</p>'; break;
		}
	}
}
?>