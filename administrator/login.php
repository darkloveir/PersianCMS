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
error_reporting(0);
include ("config.php");
if (!isset($_SESSION))
	session_start();
$_SESSION['connection_setup'] = mysql_connect($mysql_host . ':' . $mysql_port, $mysql_username, $mysql_password) or die("ارتباط با سرور قطع شد"); // ایجاد کانکشن با دیتابیس
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="css/login.css" media="screen">

<link rel="stylesheet" type="text/css" href="css/theme.css" media="screen">

<title>Persian CMS - ورود به سیستم  - پنل مدیریت</title>

</head>

<body>

    <div id="login-wrapper">
        <div id="login">
            <h1>ورود به سیستم</h1>
            <div class="login-lock"><i class="icon-lock"></i></div>
            <div id="login-form">
            <div class="messages"></div>
            <?php
			   if(isset($_SESSION['gamemaster']))
			   {
				   echo "<div class='form-message info'>شما در حال انتقال هستید...</div>";
				   header("Location: panel.php");
			   }
			?>
                    <div class="form-row">
                        <div class="form-item">
                            <input type="text" name="username" class="login-username required" placeholder="نام کاربری">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-item">
                            <input type="password" name="password" class="login-password required" placeholder="رمز عبور">
                        </div>
                    </div>
                    <div id="login-remember" class="form-row inset">
                        <ul class="form-list inline">
                            <li>
                                <input id="remember" type="checkbox"> 
                                <label for="remember">مرا بخاطر بسپار</label>
                            </li>
                        </ul>
                    </div>
                    <div class="form-row">
                        <input type="submit" value="ورود به سیستم" class="btn btn-success login-button"  id="jui-dialog-btn">
                    </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Plugins -->
    <script src="js/libs/jquery-1.8.3.min.js"></script>
    <script src="js/libs/jquery.placeholder.min.js"></script>
    <script src="plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="jui/js/jquery-ui-effects.min.js"></script>

    <!-- Plugin Scripts -->
    <script src="plugins/validate/jquery.validate-min.js"></script>

    <!-- Login Script -->
    <script src="js/core/login.js"></script>

</body>
</html>
