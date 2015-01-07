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
function redirect($url){
	 if (!headers_sent()){
		 header('Location: '.$_SESSION['website_address'].$url); exit;
	 }else{
		 echo '<script type="text/javascript">';
		 echo 'window.location.href="'.$_SESSION['website_address'].$url.'";';
		 echo '</script>';
		 echo '<noscript>';
		 echo '<meta http-equiv="refresh" content="0;url='.$_SESSION['website_address'].$url.'" />';
		 echo '</noscript>'; exit;
	 }
}

function get_page()
{
	if(isset($_GET['page']))
	   return $_GET['page'];
}

function select_db($database)
{
  $db_setup = mysql_select_db($database);
}

function navigation($parent, $level, $position) 
{
  $lang = $_SESSION['language'];
  mysql_query("set names utf8");
  $result = mysql_query("SELECT *, Deriv1.Count FROM `navigation` a LEFT OUTER JOIN (SELECT parent, COUNT(*) AS Count FROM `navigation` GROUP BY parent) Deriv1 ON a.id = Deriv1.parent WHERE a.parent=" . $parent. " AND lang = '$lang' ORDER BY `order`");
  echo "<ul id='menu'>";
  while ($row = mysql_fetch_assoc($result)) 
  {
	  if ($row['Count'] > 0) 
	  {
		  if(($row['login'] == 1 && $_SESSION['username'] != "") or ($row['login'] == 2 && $_SESSION['username'] == "")) {  } 
		  else
		  {
			?>
			<li class='fs-linkSep'><a href='<?=$_SESSION['website_address'].$row['link']?>' <?php if($_GET['page'] == $row['name']) { echo "class='active'"; } ?>><?= $row['label'] ?></a>
			<?php
			navigation($row['id'], $level + 1, $position);
			echo "</li>";
		  }
	  } 
	  elseif ($row['Count']==0) 
	  {
		  if(($row['login'] == 1 && $_SESSION['username'] != "") or ($row['login'] == 2 && $_SESSION['username'] == "")) {  } 
		  else
		  {
			?>
			<li class='fs-linkSep'><a href='<?= $_SESSION['website_address'].$row['link']?>' <?php if(isset($_GET['page']) && $_GET['page'] == $row['name']) { echo "class='active'"; } ?>><?= $row['label'] ?></a>
			<?php
		  }
	  } 
	  else;
  }
  echo "</ul>";
}

function navigation2($parent, $level, $position) 
{
  mysql_query("set names utf8");
  
  $result = mysql_query("SELECT *, Deriv1.Count FROM `navigation_2` a LEFT OUTER JOIN (SELECT parent, COUNT(*) AS Count FROM `navigation_2` GROUP BY parent) Deriv1 ON a.id = Deriv1.parent WHERE a.parent=" . $parent. " AND position = ".$position."");
  
  ?><ul class='nav navbar-nav<?php if($position == 1) { echo "  navbar-left"; } ?>'><?php
  while ($row = mysql_fetch_assoc($result)) 
  {
	  if ($row['Count'] > 0) 
	  {
		  if(($row['login'] == 1 && $_SESSION['username'] != "") or ($row['login'] == 2 && $_SESSION['username'] == "")) {  } 
		  else
		  {
			?>
			<li class="dropdown <?php if($_GET['page'] == $row['name']) { echo "active"; } ?>"><a href='<?=$_SESSION['website_address'].$row['link']?>' class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="<?= $row['icon'] ?>"></i> <?= $row['label'] ?><b class="caret"></b></a>
            <ul class='dropdown-menu'>
            <?php
				$result2 = mysql_query("SELECT * FROM navigation_2 WHERE parent = ".$row['id']."");
				while ($row2 = mysql_fetch_assoc($result2)) 
				{
            		echo '<li><a href="'.$row2['link'].'">'.$row2['label'].'</a></li>';
				}
			?>
            </ul>
			<?php
			echo "</li>";
		  }
	  } 
	  elseif ($row['Count']==0) 
	  {
		  if(($row['login'] == 1 && $_SESSION['username'] != "") or ($row['login'] == 2 && $_SESSION['username'] == "")) {  } 
		  else
		  {
			?>
			<li <?php if(isset($_GET['page']) && $_GET['page'] == $row['name']) { echo "class='active'"; } ?>><a href='<?=$_SESSION['website_address'].$row['link']?>'><i class="<?= $row['icon'] ?>"></i> <?= $row['label'] ?></a>
			<?php
		  }
	  } 
	  else;
  }
  echo "</ul>";
}

function slideshow()
{?>
 <div id="slideshow">
  <div id="outer">
	  <div id="inner">
		  <div id="images" class="slide">
		  <?php
		  $result = mysql_query("SELECT imgurl FROM slideshow WHERE lang = '".$_SESSION['language']."'");
		  while ($row = mysql_fetch_assoc($result)) 
		  {
			  echo '<img src='.$row['imgurl'] .' width="634" height="300" />';
		  } ?>
		  </div>
		  <div id="tooltip" class="slide">
		  <?php
		  $result = mysql_query("SELECT label FROM slideshow WHERE lang = '".$_SESSION['language']."'");
		  while ($row2 = mysql_fetch_assoc($result)) 
		  {
			  echo '<h3>'.$row2['label'].' </h3>';
		  } ?>
		  </div>
		  <a href="#next" id="next">&rsaquo;</a>
		  <a href="#previous" id="prev">&lsaquo;</a>
	  </div>
  </div>
 </div>
<?php 
} 
function featured_news()
{
  $query = mysql_query("SELECT * FROM news WHERE pinned = 1 AND lang = '".$_SESSION['language']."' ORDER BY datetime DESC LIMIT 3");
	?>
	<ul class="featured-news">
	<?php
	while ($result = mysql_fetch_assoc($query))
	{
		$date_now = strtotime(date("Y-m-d H:i:s", time()));
		$date_news = $result['datetime'];
		$datetime = $date_news - 8990;
		$_date = $date_now - $datetime;
		if($_date > 0)
		{
	?>
	  <li>
		<div class="article-wrapper">
			<a href="news/<?= $result['id'] ?>" class="featured-news-link">
				<div class="article-image" style="background-image:url(<?= $result['imgurl'] ?>)">
					<div class="article-image-frame"></div>
				</div>
				<div class="article-content">
					<span class="article-title"><?= $result['title'] ?></span>
				</div>
			 </a>
			<div class="article-meta">
				<a href="news/<?= $result['id'] ?>#comment" class="comments-link"><?= $result['comments'] ?> دیدگاه</a>
				<span class="publish-date"><?= ago($datetime); ?></span>
			</div>
		</div>
	  </li>
	  <?php
		}
	}
	?>
   </ul>
	<?php
}

function show_page()
{
  $pagename = get_page();
  $query = mysql_query("SELECT * FROM pages WHERE page = '$pagename' AND lang='".$_SESSION['language']."'");
  $rows = mysql_num_rows($query);
  while ($result = mysql_fetch_assoc($query))
  {
	if($result['type'] == 0)
	{
	  if(isset($pagename))
	  {
		switch($pagename)
		{
			case $result['page'] : 
			   include("application/modules/pages/" . $result['page'] . "/view/" . $result['page'] . ".php");
			   break; 
			default: 
			   include("application/modules/pages/404/view/404.php");
		}
	  }
	}
	else
	{
		require ("application/functions/jcalendar.class.php");
		$date = new jCalendar;  
		?>
		<div class="article-wrapper">
		  <div class="content-title"><h3><?= $result['title']; ?></h3></div>
		  <div class="news-info">
			  <div class="information">
				<font class="news-information">تاریخ</font> :
				<?= $date->date("l j F Y", $result['datetime']) ?>
				
				<font class="news-information">ارسال توسط</font> : 
				<?= $result['author']; ?>
			  </div>
		  </div>
		  <div class="content-body">
			 <div class="text">
			 <?= $result['content']; ?>
			 </div>
		  </div>
		  <div class="content-footer"></div>
		  <div class="content-end">&nbsp;</div>
		</div>
		<?php
	}
  }
  
  if($pagename == "")
  {
	  include("application/modules/pages/news/view/news.php");
  }
  else 
  {
	  if($rows == 0)
	  {
		  include("application/modules/pages/404/view/404.php");
	  }
  }
}

function get_players_online()
{
  $query = mysql_query("SELECT * FROM account WHERE online = 1");
  $rows = mysql_num_rows($query);
  return $rows;
}

function get_account_name($id)
{
  $q = mysql_query("SELECT * FROM account WHERE id = $id");
  $r = mysql_fetch_assoc($q);
  return $r['username'];
}

function sidebar($name, $login)
{
	include("application/modules/sidebars/" . $name . "/view/" . $name . ".php");
}


function get_race_icon($id, $gender)
{
	if($id == 1 && $gender == 0){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/1-0.gif"> Human';}
	if($id == 1 && $gender == 1){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/1-1.gif"> Human';}
	if($id == 2 && $gender == 0){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/2-0.gif"> Orc';}
	if($id == 2 && $gender == 1){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/2-1.gif"> Orc';}
	if($id == 3 && $gender == 0){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/3-0.gif"> Dwarf';}
	if($id == 3 && $gender == 1){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/3-1.gif"> Dwarf';}
	if($id == 4 && $gender == 1){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/4-1.gif"> Night Elf';}
	if($id == 4 && $gender == 0){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/4-0.gif"> Night Elf';}
	if($id == 5 && $gender == 1){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/5-1.gif"> Undead';}
	if($id == 5 && $gender == 0){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/5-0.gif"> Undead';}
	if($id == 6 && $gender == 0){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/6-0.gif"> Tauren';}
	if($id == 6 && $gender == 1){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/6-1.gif"> Tauren';}
	if($id == 7 && $gender == 1){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/7-1.gif"> Gnome';}
	if($id == 7 && $gender == 0){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/7-0.gif"> Gnome';}
	if($id == 8 && $gender == 1){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/8-1.gif"> Troll';}
	if($id == 8 && $gender == 0){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/8-0.gif"> Troll';}
	if($id == 9 && $gender == 1){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/9-1.gif"> Goblin';}
	if($id == 9 && $gender == 0){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/9-0.gif"> Goblin';}
	if($id == 10 && $gender == 1){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/10-1.gif"> Blood Elf';}
	if($id == 10 && $gender == 0){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/10-0.gif"> Blood Elf';}
	if($id == 11 && $gender == 1){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/11-1.gif"> Draeni';}
	if($id == 11 && $gender == 0){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/11-0.gif"> Draeni';}
	if($id == 22 && $gender == 1){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/22-1.gif"> Worgen';}
	if($id == 22 && $gender == 0){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/22-0.gif"> Worgen';}
}

function get_class_icon($id)
{
	if($id == 1){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/1.gif"> Warrior';}
	if($id == 2){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/2.gif"> Paladin';}
	if($id == 3){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/3.gif"> Hunter';}
	if($id == 4){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/4.gif"> Rogue';}
	if($id == 5){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/5.gif"> Priest';}
	if($id == 6){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/6.gif"> Death Knight';}
	if($id == 7){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/7.gif"> Shaman';}
	if($id == 8){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/8.gif"> Mage';}
	if($id == 9){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/9.gif"> Warlock';}
	if($id == 10){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/10.gif"> Monk';}
	if($id == 11){ return '<img src= "'.$_SESSION['website_address'].'application/images/stats/11.gif"> Druid';}
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
	  return "هم اکنون";
   elseif($difference == 45 && $periods[$j] == "سال")
      return "تعیین نشده";
   else
	  return "$difference $periods[$j] پیش";
}

function get_character_status($online)
{
	if($online == 1)
		return '<img src= "'.$_SESSION['website_address'].'application/images/icons/up.png"> آنلاین';
	else
		return '<img src= "'.$_SESSION['website_address'].'application/images/icons/down.png"> آفلاین';
}

function send($url,$api,$amount,$redirect){
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,"$url");
	curl_setopt($ch,CURLOPT_POSTFIELDS,"api=$api&amount=$amount&redirect=$redirect");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	$res = curl_exec($ch);
	curl_close($ch);
	return $res;
}
function get($url,$api,$trans_id,$id_get){
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,"$url");
	curl_setopt($ch,CURLOPT_POSTFIELDS,"api=$api&id_get=$id_get&trans_id=$trans_id");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	$res = curl_exec($ch);
	curl_close($ch);
	return $res;
}

function limit_words($string, $word_limit)
{
    $words = explode(" ",$string);
    return implode(" ", array_splice($words, 0, $word_limit));
}
?>