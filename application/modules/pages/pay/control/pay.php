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
$MySQL = new MySQL($db_auth, $mysql_username, $mysql_password, $mysql_host, $mysql_port);
$MySQL->executeSQL("SELECT * FROM account WHERE username = '$username'");
$id = $MySQL->arrayedResult['id'];
$email = $MySQL->arrayedResult['email'];

$MySQL->database = $db_website;
$MySQL->Connect($persistant);
$MySQL->executeSQL("SELECT * FROM account_data WHERE id = $id");
$mobile = $MySQL->arrayedResult['phonenumber'];
$user_rows = $MySQL->records;

if($user_rows == 0) {
    redirect("info");
}

if(isset($_POST['pay'])){
    $amount = mysql_real_escape_string($_POST["amount"]);
    $text = mysql_real_escape_string($_POST["text"]);
    
    $result = 1;
    if($_POST['amount'] == "")
       $result = -1;
       
    if (!chk_crypt($_POST['captcha']))
        $result = -2;
     
    if($_POST['amount'] < 1000 && is_numeric($_POST['amount']))
        $result = -3;
        
    if($result == 1){
        $url = 'http://payline.ir/payment/gateway-send';
        $MySQL->executeSQL("SELECT * FROM security");
        $api = $MySQL->arrayedResult['api'];
        $redirect = $website_address.'get_result';
        $_result = send($url,$api,$amount,$redirect);
        if($_result > 0 && is_numeric($_result)){ 
            $MySQL->executeSQL("INSERT INTO `pay_information` (`id_incremenet`, `id_get`, `trans_id`, `amount`, `name`, `email`, `mobile`, `description`, `stamp`, `status`) VALUES (NULL, '$_result', 0, $amount, '$username', '$email', '$mobile', '$text', ".mktime().", 0);");
            $go = "http://payline.ir/payment/gateway-$_result";
            redirect($go);
        }else{
            switch($_result){
                case -1: $result = -4; break;
                case -2: $result = -5; break;
                case -3: $result = -6; break;
                case -4: $result = -7; break;
                default: $result = -8;
            }
        }
    }
    if($result == 1 && is_numeric($result)) {
        
    } else {
        switch($result){
            case -1: $message = '<p class="error">تمامی فیلد ها را پر کنید.</p>'; break;
            case -2: $message = '<p class="error">تصوير امنيتي را به درستي وارد نکرديد</p>'; break;
            case -3: $message = '<p class="error">لطفا مقدار هزينه را به صورت عدد و مبلغی بیشتر از 1000 ریال وارد نماييد</p>"'; break;
            case -4: $message = '<p class="error">api ارسالی با نوع api تعریف شده در payline سازگار نیست.</p>'; break;
            case -5: $message = '<p class="error">مقدار amount داده عددی نمی باشد</p>'; break;
            case -6: $message = '<p class="error">مقدار redirect رشته null است.</p>'; break;
            case -7: $message = '<p class="error">درگاهی با اطلاعات ارسالی شما یافت نشده و یا در حالت انتظار می باشد.</p>'; break;
            case -8: $message = '<p class="error">تابع curl بر روي هاست شما فعال نيست</p>'; break;
            default: $message = '<p class="error">خطایی نامعلوم رخ داده است لطفا دوباره سعی کنید. اگر باز هم دچار این خطا شدید با مدیریت تماس بگیرید.</p>'; break;
        }
    }
}
unset($MySQL);
?>