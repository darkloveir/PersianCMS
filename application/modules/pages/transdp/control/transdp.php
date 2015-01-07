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
if(!isset($_SESSION['username'])){
    redirect("login");
}
$cryptinstall="application/plugins/crypt/cryptographp.fct.php";
include_once $cryptinstall;
require ("application/config/config.php");
include_once("application/class/mysql.php");
$username = $_SESSION['username'];
$_username = mysql_real_escape_string($_POST["username"]);
$MySQL = new MySQL($db_auth, $mysql_username, $mysql_password, $mysql_host, $mysql_port);
$MySQL->executeSQL("SELECT * FROM account WHERE username = '$username'");
$id = $MySQL->arrayedResult['id'];
$MySQL->executeSQL("SELECT * FROM account WHERE username = '$_username'");
$_id = $MySQL->arrayedResult['id'];
$_user_rows = $MySQL->records;

$MySQL->database = $db_website;
$MySQL->Connect($persistant);
$MySQL->executeSQL("SELECT * FROM account_data WHERE id = $id");
$amount = $MySQL->arrayedResult['dp'];
$mellicode = $MySQL->arrayedResult['mellicode'];
$MySQL->executeSQL("SELECT * FROM account_data WHERE id = $_id");
$__user_rows = $MySQL->records;

if(isset($_POST['transcharge'])){
    $_amount = mysql_real_escape_string($_POST["amount"]);
    $_mellicode = mysql_real_escape_string($_POST["mellicode"]);
    
    $result = 1;
    if($_POST['username'] == "" || $_POST['amount'] == "" || $_POST['mellicode'] == "")
       $result = -1;
       
    if (!chk_crypt($_POST['captcha']))
        $result = -2;
     
    if($_POST['amount'] < 100 || !is_numeric($_POST['amount']))
        $result = -3;
        
    if($mellicode != $_mellicode)
        $result = -4;
        
    if($_amount > $amount)
        $result = -5;
        
    if($id == $_id)
        $result = -6;
        
    if($_user_rows == 0)
        $result = -7;
        
    if($__user_rows == 0)
        $result = -8;
        
    if($result == 1){
        $MySQL->executeSQL("UPDATE `account_data` SET dp = dp + $_amount WHERE `id` = $_id;");
        $MySQL->executeSQL("UPDATE `account_data` SET dp = dp - $_amount WHERE `id` = $id;");
    }
    if($result == 1 && is_numeric($result)) {
        $message = '<p class="success"><a href="panel">عملیات با موفقیت انجام شد.</a></p>';
    } else {
        switch($result){
            case -1: $message = '<p class="error">تمامی فیلد ها را پر کنید.</p>'; break;
            case -2: $message = '<p class="error">تصوير امنيتي را به درستي وارد نکرديد</p>'; break;
            case -3: $message = '<p class="error">لطفا مقدار هزينه را به صورت عدد و مبلغی بیشتر از 1000 ریال وارد نماييد.</p>"'; break;
            case -4: $message = '<p class="error">کد ملی خود را صحیح وارد کنید.</p>'; break;
            case -5: $message = '<p class="error">مقدار وارد شده بیشتر از موجودی حساب شما میباشد. موجودی حساب شما : '.$amount.' ریال میباشد.</p>'; break;
            case -6: $message = '<p class="error">شما نمیتوانید به حساب خود شارژ انتقال دهید.</p>'; break;
            case -7: $message = '<p class="error">نام کاربری مقصد را اشتباه وارد کرده اید.</p>'; break;
            case -8: $message = '<p class="error">کاربر مقصد هنوز اطلاعات خود را کامل نکرده است.</p>'; break;
            default: $message = '<p class="error">خطایی نامعلوم رخ داده است لطفا دوباره سعی کنید. اگر باز هم دچار این خطا شدید با مدیریت تماس بگیرید.</p>'; break;
        }
    }
}
?>