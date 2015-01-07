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
$email = $MySQL->arrayedResult['email'];

$MySQL->database = $db_website;
$MySQL->Connect($persistant);
$MySQL->executeSQL("SELECT * FROM account_data WHERE id = $id");
$user_rows = $MySQL->records;
$account_data = $MySQL->arrayedResult;

if(isset($_POST['unlock'])){
    $fname = mysql_real_escape_string($_POST["fname"]);
    $lname = mysql_real_escape_string($_POST["lname"]);
	$question = mysql_real_escape_string($_POST["question"]);
	$answer = mysql_real_escape_string($_POST["answer"]);
    $activecode_new = md5(uniqid(rand()));
	
    $result = 1;
    if($_POST['fname'] == "" && $_POST['lname'] == "" && $_POST['question'] == "" && $_POST['answer'] == "")
       $result = -1;
	   
    if (!chk_crypt($_POST['captcha']))
        $result = -2;
		
	if($account_data['fname'] != $fname && $account_data['lname'] != $lname && $account_data['question'] != $question && $account_data['answer'] != $answer)
		$result = -3;
        
    if($result == 1){
        $MySQL->executeSQL("UPDATE `account_data` SET `activecode` = '$activecode_new' WHERE `id` = '$id'");
		
		$link_active = $website_address.'unlock&activecode='.$activecode_new;
		
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
		$mail->AltBody = $$link_active;
        $result = 0;
		if(!$mail->send())
			$result = -4;
    }
    if($result == 1 && is_numeric($result)) {
        $_SESSION['username'] = $username;
        redirect("panel");
    } else {
        switch($result){
			case 0: $message = '<p class="success">'.$p_unlock['30'].'</p>'; break;
            case -1: $message = '<p class="error">'.$p_unlock['31'].'</p>'; break;
            case -2: $message = '<p class="error">'.$p_unlock['32'].'</p>'; break;
            case -3: $message = '<p class="error">'.$p_unlock['33'].'</p>'; break;
			case -4: $message = '<p class="error">'.$p_unlock['34'].'</p>'; break;
            default: $message = '<p class="error"'.$p_unlock['35'].'></p>'; break;
        }
    }
}
if(isset($_GET['id'])) {
	$activecode = mysql_real_escape_string($_GET["id"]);
	if($account_data['activecode'] == $activecode) {
		$MySQL->database = $db_auth;
		$MySQL->Connect($persistant);
		$MySQL->executeSQL("UPDATE `account` SET locked = 0 WHERE `id` = '$id'");
		$message = '<p class="success">'.$p_unlock['36'].'</p>';
		redirect("panel");
	} else {
		$message = '<p class="warning">'.$p_unlock['37'].'</p>';
	}
}
?>