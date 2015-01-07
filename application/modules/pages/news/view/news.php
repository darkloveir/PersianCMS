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
include ("application/languages/".$_SESSION['language']."/news.php");

$comments;
$setting['paged_item'] = 10;
if(isset($_GET['id']) && !is_numeric($_GET['id'])){
  redirect("news");
}

if(isset($_GET['pageid']) && !is_numeric($_GET['pageid'])){
  redirect("news");
}


if(isset($_GET['pageid'])) { $page = mysql_real_escape_string($_GET['pageid']); }

if(empty($page)){
  $page = 1;
}
$start = ($page - 1) * $setting['paged_item'];
	  
if(isset($_GET['id'])){
  $newsid = mysql_real_escape_string($_GET['id']);
  $news_query = mysql_query("SELECT * FROM news WHERE id = ".$newsid." ORDER BY id DESC LIMIT $start, ".$setting['paged_item']."");
}else{
	$news_query = mysql_query("SELECT * FROM news WHERE lang = '".$_SESSION['language']."' ORDER BY id DESC LIMIT $start, ".$setting['paged_item']."");
}

while ($result = mysql_fetch_array($news_query)){
  $date_now = strtotime(date("Y-m-d H:i:s", time()));
  $date_news = $result['datetime'];
  $datetime = $date_news - 8990;
  $_date = $date_now - $datetime;
  if($_date > 0){
	$comments = $result['comments'];
?>
	<div class="article-wrapper">
		<div class="content-title">
			<div class="news-img">
			  <img src="<?= $_SESSION['website_address'].$result['imgurl']; ?>" width="40px" height="40px"/>
			</div>
			<h3><?= $result['title']; ?></h3>
		 </div>
		<div class="news-info">
		  <div class="information">
			<font class="news-information"><?= $p_news['1'] ?></font> :
			<?= ago($datetime); ?>
			
			<font class="news-information"><?= $p_news['2'] ?></font> : 
			<?= $result['author']; ?>
			
			<font class="news-information"><?= $p_news['3'] ?></font> : 
			<?= $result['comments']; ?>
		  </div>
		</div>
		<div class="content-body">
		  <div class="text">
		  <?php 
          
          if(isset($_GET['id'])){
              echo $result['content']; 
              echo "<br /><br />";
              echo $result['content-full']; 
          }else{
              echo $result['content']; 
          }
		   if(!isset($_GET['id']))
		   {
			  ?>
			  <a href="news/<?php echo $result['id']; ?>" class="readmoreline"><span class="arrow"></span><?= $p_news['4'] ?></a>
			  <?php 
			  } 
			else
			{
			  if(isset($result['editedby']))
			  {
				echo '<span style="float:left;"> » <font color="#FFED00">آخرین ویرایش توسط </font> : <font color="#00C522">'.$result['editedby'].'</font></span>';
			  }
			}
                
            ?>
		  </div>
		</div>
		<div class="content-footer"></div>
	</div>
		
<?php 
	}
  } 
  if(!isset($_GET['id']))
	{
	  echo '<div class="content-end">
	  <div class="btn-group" role="group" aria-label="...">';
	  $total = mysql_query("SELECT id FROM news WHERE lang = '".$_SESSION['language']."'")
	  or die(mysql_error());
	  $count = mysql_num_rows($total);
	  
	  if($count - $setting['paged_item'] > 0)
	  {
		$paged_total = ceil($count / $setting['paged_item']);
		$paged_last = $paged_total;
		$paged_middle = $page + 4;
		$paged_start = $paged_middle - 4;
		
		if($page > 1)
		{
			$paged_result = '<div class="btn btn-primary"><a href="'.$website_address.'?pageid=1" title="صفحه نخست">نخست</a></div>'."\n";                            
		}
		else
		{
			$paged_result = '<div class="btn btn-primary">نخست</div>'."\n";        
		}
		
		if($page > 1)
		{
			$paged_perv = $page - 1;
			$paged_result .= '<div class="btn btn-primary"><a href="'.$website_address.'?pageid='.$paged_perv.'" title="صفحه قبلی">قبلی</a></div>'."\n";
		}
		else
		{
			$paged_result .= '<div class="btn btn-primary">قبلی</div>'."\n";
		}
		
		for ($i=$paged_start-2; $i<=$paged_middle; $i++)
		{
			if ($i > 0 && $i <= $paged_last)
			{
				if($i == $page)
				{
					$paged_result .= '<div class="btn btn-primary btn-lg active"><a href="'.$website_address.'?pageid='.$i.'" title="صفحه '.$i.'">'.$i.'</a></div>'."\n";
				}
				else
				{
					$paged_result .= '<div class="btn btn-primary"><a href="'.$website_address.'?pageid='.$i.'" title="صفحه '.$i.'">'.$i.'</a></div>'."\n";
				}
			}
		}
		
		if($page <= $paged_last - 1)
		{
			$paged_next = $page + 1;
			$paged_result .= '<div class="btn btn-primary"><a href="'.$website_address.'?pageid='.$paged_next.'" title="صفحه بعدی">بعدی</a></div>'."\n";
		}
		else
		{
			$paged_result .= '<div class="btn btn-primary">بعدی</div>'."\n";
		}
		
		if($page <= $paged_last - 1)
		{
			$paged_result .= '<div class="btn btn-primary"><a href="'.$website_address.'?pageid='.$paged_last.'" title="صفحه آخر">آخر</a></div>'."\n";
		}
		else
		{
			$paged_result .= '<div class="btn btn-primary">آخر</div>'."\n";
		}
		$paged_result .= '<div class="btn btn-primary"> صفحه: '.$page.' از '.$paged_total.'</div>'."\n";
		echo $paged_result;        
				
	}
	else
	{
		echo 'صفحه ای وجود ندارد!'."\n";
	}
   echo "&nbsp;</div>";
  }
  if(isset($_GET['id']))
  {
	$id = $_GET['id'];
	$query = mysql_query("SELECT * FROM news WHERE id = '$id'") or die(mysql_error());
	$result = mysql_num_rows($query);
	$fetch = mysql_fetch_assoc($query);
	if($result == 0)
	{
		redirect("news");
	}
	echo "<div class='comment'>";

  $cryptinstall="application/plugins/crypt/cryptographp.fct.php";
  include_once $cryptinstall;
  if(isset($_POST['comment']))
  {
		$newsid = mysql_real_escape_string($_GET['id']);
		$author = mysql_real_escape_string($_SESSION['username']);
		$commenttext = mysql_real_escape_string($_POST['text']);
		$datetime = strtotime(date('Y-m-d H:i:s'));
	  
		$result = 1;
		if($_POST['name'] == "" && $_POST['text'] == "")
		   $result = -1;
		if (!chk_crypt($_POST['captcha']))
			$result = -2;
	  
		if($result == 1)
		{
			  mysql_query("set names utf8");
			  $comment_insert_query = mysql_query("INSERT INTO comments (newsid, author, datetime, comment) VALUES ('$newsid', '$author', '$datetime', '$commenttext')") or die(mysql_error());
			  $comment_update_query = mysql_query('UPDATE news SET comments = '.$comments.' WHERE id = '.$newsid.'') or die(mysql_error());
			  $message = "<p class='success'>دیدگاه شما با موفقیت ثبت شد و پس از تایید مدیر نمایش داده میشود.</p>";
		} else {
			switch($result)
			{
				
				case -1: $message = '<p class="error">تمامی فیلد ها را پر کنید.</p>'; break;
				case -2: $message = '<p class="error">تصوير امنيتي را به درستي وارد نکرديد</p>'; break;
				case -3: $message = '<p class="error">نام کاربری یا رمز عبور اشتباه است</p>'; break;
				default: $message = '<p class="error">خطایی نامعلوم رخ داده است لطفا دوباره سعی کنید. اگر باز هم دچار این خطا شدید با مدیریت تماس بگیرید.</p>'; break;
			}
		}
	}
	if($_SESSION['username'] != "")
	{
		if($fetch['commentallow'] == 1)
		{
		 ?>
		 <p><?= $p_news['5'] ?></p>
		 <form class="form-horizontal" method="post" id="comment" action="">
		  <?= (isset($message)) ? $message : ''; ?>
		  <div class="form-group">
			<label for="text" class="col-sm-2 control-label"><?= $p_news['6'] ?></label>
			<div class="col-sm-5">
				<textarea name="text" class="form-control required" id="text" name="text" placeholder="<?= $p_news['7'] ?>" rows="5"></textarea>
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-sm-2 control-label"></label>
			<div class="col-sm-5">
				<?= dsp_crypt(0,1); ?>
			</div>
		  </div>
		  <div class="form-group">
		  <label for="captcha" class="col-sm-2 control-label"><?= $p_news['8'] ?></label>
			<div class="col-sm-5">
			  <input type="text" class="form-control required" id="captcha" name="captcha" placeholder="<?= $p_news['9'] ?>">
			</div>
		  </div>
		  <div class="form-group">
		  <label class="col-sm-2 control-label"></label>
			<div class="col-sm-5">
			  <input type="hidden" name="comment" />
			  <button type="submit" class="btn btn-primary" id="send" name="send"><?= $p_news['10'] ?></button>
			</div>
		  </div>
		</form>
		<?php
		}
		else
		{
			?>
			<div class="comments-error-gate">
				<center>
					<p><?= $p_news['11'] ?></p>
				</center>
			</div>
			<?php
		}
	}
	else
	{
		?>
		<div class="comments-error-gate">
		<center>
			<p><?= $p_news['12'] ?> <a href="<?= $_SESSION['website_address'] ?>login"><?= $p_news['13'] ?></a> <?= $p_news['14'] ?></p>
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#loginModal"><?= $p_news['15'] ?></button>
		</center>
		</div>
		<?php
	}
	?>
<script type="text/javascript">
$(document).ready(function() {
	$('#comment').bootstrapValidator({
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
			fields: {
				name: {
					message: '<?= $p_news['16'] ?>',
					validators: {
						notEmpty: {
							message: '<?= $p_news['17'] ?>'
						},
						regexp: {
							regexp: /^[a-zA-Z0-9_\.آابپتثجچحخدذرزژسشصضطظعغفق  کگلمنوهی ]+$/,
							message: '<?= $p_news['18'] ?>'
						}
					}
				},
				captcha: {
					message: '<?= $p_news['19'] ?>',
					validators: {
						notEmpty: {
							message: '<?= $p_news['20'] ?>'
						},
						stringLength: {
							min: 6,
							max: 6,
							message: '<?= $p_news['21'] ?>'
						},
						regexp: {
							regexp: /^[0-9]+$/,
							message: '<?= $p_news['22'] ?>'
						}
					}
				},
				text: {
					validators: {
						stringLength: {
							min: 10,
							max: 500,
							message: '<?= $p_news['23'] ?>'
						},
						regexp: {
							regexp: /^[a-zA-Z0-9_\.آابپتثجچحخدذرزژسشصضطظعغفق  کگلمنوهی ]+$/,
							message: '<?= $p_news['24'] ?>'
						},
						notEmpty: {
							message: '<?= $p_news['25'] ?>'
						}
					}
				}
			}
	});
});
</script>
<ul>
	 <?php
	  $comments_query = mysql_query("SELECT * FROM comments WHERE newsid = ".$newsid." ORDER BY id ASC");
	  while ($result_comments = mysql_fetch_array($comments_query))
	  {
		if($result_comments['active'] == 1)
		{
		  ?>
		  <li>
			 <div class="comment-body">
				<div class="comment-avatar"><img src="<?= $_SESSION['website_address'].$website_address ?>application/images/avatar/0-0.jpg" width="45px" height="45px"/></div>
				<div class="comment-info">
				   <div class="comment-title"><font color="#FFED00"><?= $result_comments['author']; ?></font> <?= $p_news['26'] ?> </div>
				   <div class="comment-datetime"><font color="#323232"><?= ago($result_comments['datetime']);  ?></font></div>
				</div>
				<div class="comment-text"><?= $result_comments['comment']; ?></div>
				<div class="comment-foot"></div>
			 </div>
		  </li>
		  <?php
		}
	 }
 }
 echo "</div>";
echo "</ul>";
?>