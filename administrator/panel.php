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
  include_once "functions/jcalendar.class.php"; 
  include_once('functions/class.MySQL.php');
  if (!isset($_SESSION))
      session_start();
  $_SESSION['connection_setup'] = mysql_connect($mysql_host . ':' . $mysql_port, $mysql_username, $mysql_password) or die("ارتباط با سرور قطع شد");
  include ("functions/functions.php");
   if($_SESSION['gamemaster'] == "")
   {
	   header("location: login.php");
   }
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="fa"><!--<![endif]-->
<head>
	<meta charset="utf-8">

	<!-- Viewport Metatag -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<!-- Plugin Stylesheets first to ease overrides -->
	<link rel="stylesheet" type="text/css" href="plugins/colorpicker/colorpicker.css" media="screen">
	<link rel="stylesheet" type="text/css" href="plugins/fullcalendar/fullcalendar.css" media="screen">
	<link rel="stylesheet" type="text/css" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
	<link rel="stylesheet" type="text/css" href="plugins/wizard/wizard.css" media="screen">
	<link rel="stylesheet" type="text/css" href="plugins/plupload/jquery.plupload.queue.css" media="screen">
	<link rel="stylesheet" type="text/css" href="plugins/elfinder/css/elfinder.css"media="screen" >
	<link rel="stylesheet" type="text/css" href="plugins/picklist/picklist.css" media="screen">
	<link rel="stylesheet" type="text/css" href="plugins/select2/select2.css" media="screen">
	<link rel="stylesheet" type="text/css" href="plugins/ibutton/jquery.ibutton.css" media="screen">
	<link rel="stylesheet" type="text/css" href="plugins/cleditor/jquery.cleditor.css" media="screen">
	<link rel="stylesheet" type="text/css" href="plugins/prettyphoto/css/prettyPhoto.css" media="screen">
	<link rel="stylesheet" type="text/css" href="plugins/prettify/themes/theme-balupton.css">
	<link rel="stylesheet" type="text/css" href="plugins/imgareaselect/css/imgareaselect-default.css" media="screen">
	<link rel="stylesheet" type="text/css" href="plugins/jgrowl/jquery.jgrowl.css" media="screen">
	<link rel="stylesheet" type="text/css" href="plugins/wysihtml5/bootstrap-wysihtml5.css" />
	<link rel="stylesheet" type="text/css" href="plugins/fileupload/bootstrap-fileupload.css" />

	<!-- Required Stylesheets -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/fonts/ptsans/stylesheet.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/fonts/icomoon/style.css" media="screen">

	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/icons/icol16.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/icons/icol32.css" media="screen">

	<!-- jQuery-UI Stylesheet -->
	<link rel="stylesheet" type="text/css" href="jui/css/jquery.ui.all.css" media="screen">
	<link rel="stylesheet" type="text/css" href="jui/jquery-ui.custom.css" media="screen">
	
	<!-- Theme Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/theme.css" media="screen">
	<!-- JavaScript Plugins -->
	<script src="js/libs/jquery-1.8.3.min.js"></script>
	<script src="js/libs/jquery.mousewheel.min.js"></script>
	<script src="js/libs/jquery.placeholder.min.js"></script>
	<script src="plugins/fileinput.js"></script>

	<!-- jQuery-UI Dependent Scripts -->
	<script src="jui/js/jquery-ui-1.9.2.min.js"></script>
	<script src="jui/jquery-ui.custom.min.js"></script>
	<script src="jui/js/jquery.ui.touch-punch.js"></script>
	<script src="jui/js/timepicker/jquery-ui-timepicker.min.js"></script>
	<script src="jui/js/globalize/globalize.js"></script>
    <script src="jui/js/globalize/cultures/globalize.culture.en-US.js"></script>

	<!-- Plugin Scripts -->
	<script src="plugins/datatables/jquery.dataTables.min.js"></script>
	<!--[if lt IE 9]>
	<script src="js/libs/excanvas.min.js"></script>
	<![endif]-->
	<script src="plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
	<script src="plugins/flot/plugins/jquery.flot.pie.min.js"></script>
	<script src="plugins/flot/plugins/jquery.flot.stack.min.js"></script>
	<script src="plugins/flot/plugins/jquery.flot.resize.min.js"></script>
	<script src="plugins/colorpicker/colorpicker-min.js"></script>
	<script src="plugins/validate/jquery.validate-min.js"></script>
	<script src="plugins/wizard/wizard.min.js"></script>
	<script src="plugins/fullcalendar/fullcalendar.min.js"></script>
	<script src="plugins/plupload/plupload.js"></script>
	<script src="plugins/plupload/plupload.flash.js"></script>
	<script src="plugins/plupload/plupload.html4.js"></script>
	<script src="plugins/plupload/plupload.html5.js"></script>
	<script src="plugins/plupload/jquery.plupload.queue/jquery.plupload.queue.js"></script>
	<script src="plugins/elfinder/js/elfinder.min.js"></script>
	<script src="plugins/picklist/picklist.min.js"></script>
	<script src="plugins/autosize/jquery.autosize.min.js"></script>
	<script src="plugins/select2/select2.min.js"></script>
	<script src="plugins/validate/jquery.validate-min.js"></script>
	<script src="plugins/ibutton/jquery.ibutton.min.js"></script>
	<script src="plugins/cleditor/jquery.cleditor.min.js"></script>
	<script src="plugins/cleditor/jquery.cleditor.table.min.js"></script>
	<script src="plugins/cleditor/jquery.cleditor.xhtml.min.js"></script>
	<script src="plugins/cleditor/jquery.cleditor.icon.min.js"></script>
	<script src="plugins/wizard/jquery.form.min.js"></script>
	<script src="plugins/prettyphoto/js/jquery.prettyPhoto.min.js"></script>
	<script src="plugins/prettify/prettify.js"></script>
	<script src="plugins/imgareaselect/jquery.imgareaselect.min.js"></script>
	<script src="plugins/jgrowl/jquery.jgrowl-min.js"></script>
	<script src="plugins/ckeditor/ckeditor.js"></script>  
	<script src="plugins/wysihtml5/wysihtml5-0.3.0.js"></script> 
	<script src="plugins/wysihtml5/bootstrap-wysihtml5.js"></script>
	<script src="plugins/fileupload/bootstrap-fileupload.js"></script>

	<!-- Core Script -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/core/persiancms.js"></script>

	<!-- Demo Scripts (remove if not needed) -->
	<script src="js/demo/demo.calendar.js"></script>
	<script src="js/demo/demo.dashboard.js"></script>
	<script src="js/demo/demo.charts.js"></script>
	<script src="js/demo/demo.files.js"></script>
	<script src="js/demo/demo.formelements.js"></script>
	<script src="js/demo/demo.wizard.js"></script>
	<script src="js/demo/demo.gallery.js"></script>
	<script src="js/demo/demo.table.js"></script>
	<script src="js/demo/demo.widget.js"></script>
	<title>Manage World of Warcraft Server - مدیریت سرور ورلد آو وارکرفت</title>
</head>

<body>

	<!-- Header -->
	<div id="header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="logo-wrap">
            	<img src="images/logo.png" alt="mws admin">
			</div>
        </div>
        
        <!-- User Tools (Bug, logout, profile, change password) -->
        <div id="user-tools" class="clearfix">
        
        	<!-- Bug -->
        	<div id="user-notif" class="dropdown-menu">
            	<a href="#" data-toggle="dropdown" class="dropdown-trigger"><i class="icon-legal"></i></a>
                
                <!-- Unread bug count -->
                <span class="dropdown-notif"><?php num_rows($db_characters, "SELECT * FROM bugreport"); ?></span>
                
                <!-- Bug dropdown -->
                <div class="dropdown-box">
                	<div class="dropdown-content">
                        <ul class="notifications">
						<?php 
						$db_setup = mysql_select_db($db_characters, $_SESSION['connection_setup']);
						$query = mysql_query('SELECT * FROM bugreport LIMIT 5');
						while($row = mysql_fetch_assoc($query))
						{?>
                        	<li>
                            	<a href="#">
                                    <span class="type">
                                        <b><?= $row['type'] ?></b>
                                    </span>
                                    <span class="message">
                                        <?= $row['content'] ?>
                                    </span>
                                </a>
                            </li>
						<?php
						}
						?>
                        </ul>
                        <div class="dropdown-viewall">
	                        <a href="#">مشاهده تمام مشکل ها</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Ticket -->
            <div id="user-message" class="dropdown-menu">
            	<a href="#" data-toggle="dropdown" class="dropdown-trigger"><i class="icon-support"></i></a>
                
                <!-- Unred Ticket count -->
                <span class="dropdown-notif"><?php num_rows($db_characters, "SELECT * FROM gm_tickets"); ?></span>
                
                <!-- Messages dropdown -->
                <div class="dropdown-box">
                	<div class="dropdown-content">
                        <ul class="messages">
						<?php 
						$db_setup = mysql_select_db($db_characters, $_SESSION['connection_setup']);
						$query = mysql_query('SELECT * FROM gm_tickets ORDER BY lastModifiedTime DESC LIMIT 5');
						while($row = mysql_fetch_assoc($query))
						{
						if($row['viewed'] == 1) 
							echo '<li class="read">';
						else 
							echo '<li class="unread">';
						?>
                            	<a href="#">
                                    <span class="sender"><?= $row['name'] ?></span>
                                    <span class="message">
									<?php echo $row['message']?>
                                    </span>
                                    <span class="time">
                                        <?php 
										$calendar = new jCalendar;  
										echo $calendar->date("ساعت H:i | Y,M d", $row['createTime'], 12600); 
										?>
                                    </span>
                                </a>
                            </li>
						<?php
						}
						?>
                        </ul>
                        <div class="dropdown-viewall">
	                        <a href="#">مشاهده تمام درخواست ها</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- User Information and functions section -->
            <div id="user-info" class="inset">
            
            	<!-- User Photo -->
            	<div id="user-photo">
                	<img src="images/example/profile.jpg" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="user-functions">
                    <div id="username">
                        دورود, <?= $_SESSION['gamemaster']; ?>
                    </div>
                    <ul>
                    	<li><a href="#">پروفایل</a></li>
                        <li><a href="#">تغییر رمزعبور</a></li>
                        <li><a href="logout.php">خروج از سیستم</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="sidebar-stitch"></div>
		<div id="sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
        	<!-- Searchbox -->
        	<div id="searchbox" class="inset">
            	<form action="typography.html">
                	<input type="text" class="search-input" placeholder="جستوجو...">
                    <button type="submit" class="search-submit"><i class="icon-search"></i></button>
                </form>
            </div>
            
            <!-- Main Navigation -->
            <div id="navigation">
                <ul>
                    <li <?php if(!isset($_GET['page'])) { echo"class='active'"; } ?>><a href="panel.php"><i class="icon-home"></i> داشبورد</a></li>
					<li <?php if(isset($_GET['page'])){ if($_GET['page'] == "news" || $_GET['page'] == "write_news"  || $_GET['page'] == "edit_news" || $_GET['page'] == "comments") { echo"class='active'"; } }?>>
						<a href="?page=news"><i class="icon-edit"></i> خبر ها</a>
						<ul>
							<li><a href="panel.php?page=news">خبر ها</a></li>
							<li><a href="panel.php?page=write_news">نوشتن خبر</a></li>
                        	<li><a href="panel.php?page=comments">دیدگاه ها</a></li>
                        </ul>
					</li>

					<li <?php if(isset($_GET['page'])){ if($_GET['page'] == "files") { echo"class='active'"; } }?>><a href="?page=files"><i class="icon-folder-closed"></i> مدیریت فایل</a></li>
                    <li <?php if(isset($_GET['page'])){ if($_GET['page'] == "service_cost") { echo"class='active'"; } }?>><a href="?page=service_cost"><i class="icon-atom"></i> هزینه سرویس ها</a></li>
                    <li <?php if(isset($_GET['page'])){ if($_GET['page'] == "api_payline") { echo"class='active'"; } }?>><a href="?page=api_payline"><i class="icon-font"></i> API درگاه پی لاین</a></li>
					<li <?php if(isset($_GET['page'])){ if($_GET['page'] == "slideshow") { echo"class='active'"; } }?>><a href="?page=slideshow"><i class="icon-pictures"></i> اسلاید شو</a></li>
					<li <?php if(isset($_GET['page'])){ if($_GET['page'] == "tickets" || $_GET['page'] == "bugs") { echo"class='active'"; }} ?>>
                    	<a href=""><i class="icon-support"></i> پشتیبانی</a>
                        <ul>
                        	<li><a href="panel.php?page=tickets">درخواست ها</a></li>
                        	<li><a href="panel.php?page=bugs">مشکل ها</a></li>
                        </ul>	
                    </li>
					<li <?php if(isset($_GET['page'])){ if($_GET['page'] == "pages" || $_GET['page'] == "edit_page"  || $_GET['page'] == "new_page") { echo"class='active'"; } }?>>
						<a href="?page=news"><i class="icon-file"></i> برگه ها</a>
						<ul>
							<li><a href="panel.php?page=pages">برگه ها</a></li>
							<li><a href="panel.php?page=new_page">برگه نو</a></li>
                        </ul>
					</li>
                </ul>
            </div>
        </div>
        
        <!-- Main Container Start -->
        <div id="container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">
            <div id="message"></div>
            	<!-- Statistics Button Container -->
            	<div class="stat-container clearfix">
                	
                    <!-- Statistic Item -->
                	<a class="stat" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="stat-icon icol32-group"></span>
                        
                        <!-- Statistic Content -->
                        <span class="stat-content" rel="tooltip" data-placement="top" data-original-title="لیست تمام بازیکنان آنلاین در تمامی ریلم های سرور.">
                        	<span class="stat-title">بازیکنان آنلاین</span>
							<span class="stat-value"><?php num_rows($db_auth, "SELECT * FROM account WHERE online = 1"); ?></span>
                        </span>
                    </a>

                	<a class="stat" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="stat-icon icol32-script"></span>
                        
                        <!-- Statistic Content -->
                        <span class="stat-content">
                        	<span class="stat-title">وضعیت سرور</span>
							<div id="server_status"<?php auth_check($server_authip, $server_authport); ?></div>
                        </span>
                    </a>

                	<a class="stat" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="stat-icon icol32-user-comment"></span>
                        
                        <!-- Statistic Content -->
                        <span class="stat-content">
                        	<span class="stat-title">تعداد مدیران حاضر</span>
                            <span class="stat-value"><?php num_rows($db_auth, "SELECT * FROM account inner join account_access on account.id = account_access.id WHERE account.online = 1 AND account_access.gmlevel > 0"); ?></span>
                        </span>
                    </a>
                    
                	<a class="stat" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="stat-icon icol32-exclamation"></span>
                        
                        <!-- Statistic Content -->
                        <span class="stat-content">
                        	<span class="stat-title">تعداد توقیفی ها</span>
                            <span class="stat-value"><?php num_rows($db_auth, "SELECT * FROM account_banned WHERE active = 1"); ?></span>
                        </span>
                    </a>
                    
					<a class="stat" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="stat-icon icol32-radiolocator""></span>
                        
                        <!-- Statistic Content -->
                        <span class="stat-content">
                        	<span class="stat-title">تعداد ریلم ها</span>
                            <span class="stat-value"><?php num_rows($db_auth, "SELECT * FROM realmlist"); ?></span>
                        </span>
                    </a>
                </div>
                
                <!-- Panels Start -->
				<?php
				if(!isset($_GET['page']))
				{
					include("pages/dashboard.php");
				}
				else
				{
					switch($_GET['page'])
					{
						case "news": include("pages/news.php"); break;
						case "tickets": include("pages/tickets.php"); break;
						case "bugs": include("pages/bugs.php"); break;
						case "files": include("pages/files.php"); break;
						case "slideshow": include("pages/slideshow.php"); break;
						case "edit_slideshow": include("pages/edit_slideshow.php"); break;
						case "add_slideshow": include("pages/add_slideshow.php"); break;
						case "write_news": include("pages/write_news.php"); break;
						case "edit_news": include("pages/edit_news.php"); break;
						case "comments": include("pages/comments.php"); break;
						case "pages": include("pages/pages.php"); break;
						case "edit_page": include("pages/edit_page.php"); break;
						case "new_page": include("pages/new_page.php"); break;
						case "service_cost": include("pages/service_cost.php"); break;
						case "api_payline": include("pages/api_payline.php"); break;
						default: include("pages/error.php"); break;
					}
				}
				?>

                <!-- Panels End -->
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="footer">
            	Copyright Persian CMS 2015. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>
   </body>
</html>