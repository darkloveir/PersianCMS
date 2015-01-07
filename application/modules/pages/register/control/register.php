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
if($_SESSION['username'] != ""){
    redirect("panel");
}
$cryptinstall="application/plugins/crypt/cryptographp.fct.php";
include_once $cryptinstall;
require ("application/config/config.php");
require ("application/config/smtp.php");
require 'application/plugins/phpmailer/PHPMailerAutoload.php';
include_once("application/class/mysql.php");
include("application/modules/pages/register/config/email.php");
$MySQL = new MySQL($db_auth, $mysql_username, $mysql_password, $mysql_host, $mysql_port);
if(isset($_POST['register'])){
    $username = mysql_real_escape_string($_POST["username"]);
    $recruiter = mysql_real_escape_string($_POST["recruiter"]);
    $password = mysql_real_escape_string($_POST["password"]);
    $confirmPassword = mysql_real_escape_string($_POST["confirmPassword"]);
    $email = mysql_real_escape_string(stripslashes($_POST['email']));
    $reg_mail = mysql_real_escape_string(stripslashes($_POST['email']));
    $confirmEmail = mysql_real_escape_string(stripslashes($_POST['confirmEmail']));
    $sha_pass_hash = sha1(strtoupper($username ) . ":" . strtoupper($password));
    
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    
    $MySQL->executeSQL("SELECT * FROM account WHERE reg_mail = '$reg_mail'");
    $email_rows = $MySQL->records;
    
    $MySQL->executeSQL("SELECT * FROM account WHERE username = '$username'");
    $user_rows = $MySQL->records;
    
    if($recruiter != ""){
        $MySQL->executeSQL("SELECT * FROM account WHERE username = '$recruiter'");
        $recruiter = $MySQL->arrayedResult['id'];
    }else{
        $recruiter = 0;
    }
    
    $result = 1;
    if($_POST['username'] == "" || $_POST['password'] == "" || $_POST['confirmPassword'] == "" || $_POST['email'] == "" ||  $_POST['confirmEmail'] == "")
       $result = -1;
    
    if (!chk_crypt($_POST['captcha']))
        $result = -2;
        
    if($email_rows != 0)
        $result = -3;
    
    if($user_rows != 0)
        $result = -4;
        
    if($password != $confirmPassword)
        $result = -5;
        
    if($email != $confirmEmail)
        $result = -6;
        
    if (strlen($_POST['password']) < 6 || strlen($_POST['password']) > 16)
        $result = -7;
        
    if (!preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $email))
        $result = -8;
        
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
        $MySQL->executeSQL("INSERT INTO account (username, sha_pass_hash, email, reg_mail, last_ip, locked, expansion, recruiter) VALUES (UPPER('".$username."'),  CONCAT('".$sha_pass_hash."'), '".$email."', '".$reg_mail."','".$ip."', 1, 2, '".$recruiter."')");
        $_SESSION['username'] = $username;
		$result = 0;
    }
    
    if($result == 1 && is_numeric($result)) {
        //redirect("panel");
    }else {
        switch($result){
            case 0:  $message = '<p class="success"><a href="info">'.$p_register['1'].'</p>'; break;
            case -1: $message = '<p class="error">'.$p_register['2'].'</p>'; break;
            case -2: $message = '<p class="error">'.$p_register['3'].'</p>'; break;
            case -3: $message = '<p class="error">'.$p_register['4'].'</p>'; break;
            case -4: $message = '<p class="error">'.$p_register['5'].'</p>'; break;
            case -5: $message = '<p class="error">'.$p_register['6'].'</p>'; break;
            case -6: $message = '<p class="error">'.$p_register['7'].'</p>'; break;
            case -7: $message = '<p class="error">'.$p_register['8'].'</p>'; break;
            case -8: $message = '<p class="error">'.$p_register['9'].'</p>'; break;
            default: $message = '<p class="error">'.$p_register['10'].'</p>'; break;
        }
    }
} 
?>