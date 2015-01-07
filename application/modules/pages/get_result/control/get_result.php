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
require ("application/config/config.php");
include_once("application/class/mysql.php");
$username = $_SESSION['username'];
$MySQL = new MySQL($db_website, $mysql_username, $mysql_password, $mysql_host, $mysql_port);
if(true){
    $trans_id = $_POST['trans_id'];
    $id_get = $_POST['id_get'];
    
    $result = 1;
    if(!is_numeric($id_get) && !is_numeric($trans_id) && $id_get == 0 && $trans_id == 0)
       $result = -4;
        
    if($result == 1){
        $url = 'http://payline.ir/payment/gateway-result-second';
        $MySQL->executeSQL("SELECT * FROM security");
        $api = $MySQL->arrayedResult['api'];
        $_result = get($url,$api,$trans_id,$id_get);
        $MySQL->executeSQL("UPDATE `pay_information` SET `trans_id` = $trans_id WHERE `id_get` = $id_get;");
        $MySQL->executeSQL("SELECT * FROM `pay_information` WHERE `id_get` = $id_get;");
        $amount = $MySQL->arrayedResult['amount'];
        $status = $MySQL->arrayedResult['status'];
        if($_result > 0 && is_numeric($_result) && $status == 0){ 
            $MySQL->executeSQL("UPDATE `pay_information` SET `status` = 1 WHERE `id_get` = $id_get;");
            $MySQL->database = $db_auth;
            $MySQL->Connect($persistant);
            $MySQL->executeSQL("SELECT * FROM account WHERE username = '$username'");
            $id = $MySQL->arrayedResult['id'];
            $MySQL->database = $db_website;
            $MySQL->Connect($persistant);
            $MySQL->executeSQL("UPDATE `account_data` SET cost = cost + $amount WHERE `id` = $id");
        }else{
            switch($_result){
                case -1: $result = -1; break;
                case -2: $result = -2; break;
                case -3: $result = -3; break;
                case -4: $result = -4; break;
            }
        }
    }
    if($result == 1 && is_numeric($result)) {
        $message = '<p class="success">پرداخت شما با موفقيت انجام شد.</p>';
    } else {
        switch($result){
            case -1: $message = '<p class="error">api ارسالی با نوع api تعریف شده در payline سازگار نیست.</p>'; break;
            case -2: $message = '<p class="error">شماره تراکنش ارسال شده معتبر نمی باشد.</p>"'; break;
            case -3: $message = '<p class="error">شماره ارجاع ارسالی معتبر نمی باشد.</p>'; break;
            case -4: $message = '<p class="error">چنین تراکنشی در سیستم وجود ندارد و یا موفقیت آمیز نبوده است.</p>'; break;
            default: $message = '<p class="error">خطایی نامعلوم رخ داده است لطفا دوباره سعی کنید. اگر باز هم دچار این خطا شدید با مدیریت تماس بگیرید.</p>'; break;
        }
    }
}
?>