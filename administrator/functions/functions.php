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
function auth_check($ip, $port)
{
  $host = $ip;
  $auth = @fsockopen($host, $port, $err, $errstr, 2);
  if (!$auth) 
	echo '<span class="stat-value down" id="sevrer_atsus">آفلاین</span>';
  else
	echo '<span class="stat-value up" id="sevrer_atsus">آنلاین</span>';
}

function num_rows($database, $sql)
{
  $db_setup = mysql_select_db($database, $_SESSION['connection_setup'])or die(mysql_error());
  $query = mysql_query($sql)or die(mysql_error());
  $result = mysql_num_rows($query);
  echo $result;
}

function fetch_assoc($database, $sql)
{
  $db_setup = mysql_select_db($database, $_SESSION['connection_setup'])or die(mysql_error());
  $query = mysql_query($sql)or die(mysql_error());
  $result = mysql_fetch_assoc($query);
  return $result;
}

function get_all($database, $sql)
{
  $db_setup = mysql_select_db($database, $_SESSION['connection_setup'])or die(mysql_error());
  $query = mysql_query($sql)or die(mysql_error());
  $amount = 0;
  while($result = mysql_fetch_assoc($query))
  {
  	  $amount = $amount + $result['amount'];
  }
  return $amount;
}

$user_agent     =   $_SERVER['HTTP_USER_AGENT'];
function getOS() { 
    global $user_agent;
    $os_platform    =   "Unknown OS Platform";
    $os_array       =   array(
                            '/windows nt 6.3/i'     =>  '<i class="icon-windows"></i> Windows 8.1',
                            '/windows nt 6.2/i'     =>  '<i class="icon-windows"></i> Windows 8',
                            '/windows nt 6.1/i'     =>  '<i class="icon-windows"></i> Windows 7',
                            '/windows nt 6.0/i'     =>  '<i class="icon-windows"></i> Windows Vista',
                            '/windows nt 5.2/i'     =>  '<i class="icon-windows"></i> Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  '<i class="icon-windows"></i> Windows XP',
                            '/windows xp/i'         =>  '<i class="icon-windows"></i> Windows XP',
                            '/windows nt 5.0/i'     =>  '<i class="icon-windows"></i> Windows 2000',
                            '/windows me/i'         =>  '<i class="icon-windows"></i> Windows ME',
                            '/win98/i'              =>  '<i class="icon-windows"></i> Windows 98',
                            '/win95/i'              =>  '<i class="icon-windows"></i> Windows 95',
                            '/win16/i'              =>  '<i class="icon-windows"></i> Windows 3.11',
                            '/macintosh|mac os x/i' =>  '<i class="icon-apple"></i> Mac OS X',
                            '/mac_powerpc/i'        =>  '<i class="icon-apple"></i> Mac OS 9',
                            '/linux/i'              =>  '<i class="icon-apple"></i> Linux',
                            '/ubuntu/i'             =>  '<i class="icol32-tux"></i> Ubuntu',
                            '/iphone/i'             =>  '<i class="icon-apple"></i> iPhone',
                            '/ipod/i'               =>  '<i class="icon-apple"></i> iPod',
                            '/ipad/i'               =>  '<i class="icon-apple"></i> iPad',
                            '/android/i'            =>  '<i class="icon-android"></i> Android',
                            '/blackberry/i'         =>  '<i class="icon-mobile-phone"></i> BlackBerry',
                            '/webos/i'              =>  '<i class="icon-mobile-phone"></i> Mobile'
                        );
    foreach ($os_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   
    return $os_platform;
}
function getBrowser() {
    global $user_agent;
    $browser        =   "Unknown Browser";
    $browser_array  =   array(
                            '/msie/i'       =>  '<i class="icon-explorer"></i> Internet Explorer',
                            '/firefox/i'    =>  '<i class="icon-firefox"></i> Firefox',
                            '/safari/i'     =>  '<i class="icon-safari"></i> Safari',
                            '/chrome/i'     =>  '<i class="icon-chrome"></i> Chrome',
                            '/opera/i'      =>  '<i class="icon-opera"></i> Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/mobile/i'     =>  'Handheld Browser'
                        );
    foreach ($browser_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }
    }
    return $browser;
}

function limit_words($string, $word_limit)
{
    $words = explode(" ",$string);
    return implode(" ", array_splice($words, 0, $word_limit));
}

function ago($time)
{
   $periods = array("ثانیه", "دقیقه", "ساعت", "روز", "هفته", "ماه", "سال", "decade");
   $lengths = array("60","60","24","7","4.35","12","10");

   $now = time();

	   $difference     = $now - $time;
	   $tense         = "پیش";

   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
	   $difference /= $lengths[$j];
   }

   $difference = round($difference);
   if($difference == 0 && $periods[$j] == "ثانیه")
      return "همین حالا";
   else
      return "$difference $periods[$j] پیش";
}
?>