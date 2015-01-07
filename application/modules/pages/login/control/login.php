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
include_once("application/class/mysql.php");

$MySQL = new MySQL($db_auth, $mysql_username, $mysql_password, $mysql_host, $mysql_port);
if(isset($_POST['login'])){
    $username = mysql_real_escape_string($_POST["username"]);
    $password = mysql_real_escape_string($_POST["password"]);
    $sha_pass_hash = sha1(strtoupper($username ) . ":" . strtoupper($password));
    
    $result = 1;
    if($_POST['username'] == "" && $_POST['password'] == "")
       $result = -1;
    if (!chk_crypt($_POST['captcha']))
        $result = -2;
        
    if($result == 1){
        $MySQL->executeSQL("SELECT * FROM account WHERE username = '$username' AND sha_pass_hash = '$sha_pass_hash'");
        $num_rows = $MySQL->records;
        if($num_rows > 0) {
            $result = 1;
        } else {
            $result = -3;
        }
    }
    if($result == 1 && is_numeric($result)) {
        $_SESSION['username'] = $username;
        redirect("panel");
    } else {
        switch($result){
            
            case -1: $message = '<p class="error">'.$p_login['17'].'</p>'; break;
            case -2: $message = '<p class="error">'.$p_login['18'].'</p>'; break;
            case -3: $message = '<p class="error">'.$p_login['19'].'</p>'; break;
            default: $message = '<p class="error">'.$p_login['20'].'</p>'; break;
        }
    }
}
?>