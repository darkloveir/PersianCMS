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
				if(isset($_GET['id']))
				{
				?>
				<div class="panel grid_8 collapsible" id="editnews">
                	<div class="panel-header">
                    	<span><i class="icon-pencil-2"></i> ويرايش خبر</span>
                    </div>
                    <div class="panel-body no-padding">
					<?php
					if(isset($_POST['editnews']))
					{
						$id = $_GET['id'];
						$title = $_POST['title'];
						$imgurl = $_POST['imgurl'];
						$content = $_POST['content'];
						$content_full = $_POST['content_full'];
						$datetime = strtotime($_POST['datetime']);
						
						$comment = 0;
						$pinned = 0;
						if($_POST['comment'] == true)
							$comment = 1;
						else
							$comment = 0;
						
						if($_POST['pinned'] == true)
							$pinned = 1;
						else
							$pinned = 0;
							
						$editedby = $_SESSION['gamemaster'];
						$db_setup = mysql_select_db($db_website, $_SESSION['connection_setup']);
						mysql_query("SET NAMES 'utf8'");
						$query = mysql_query("UPDATE `news` SET `title` = '$title', `imgurl` = '$imgurl', `content` = '$content', `content-full` = '$content_full', `datetime` = '$datetime', `commentallow` = $comment, `editedby` = '$editedby', `pinned` = '$pinned' WHERE `id` = $id;") or die(mysql_error());
						echo '<a href="panel.php?page=news"><div id="validate-success" class="form-message success	">انجام شد.</div></a>';
					}
						$calendar = new jCalendar;
						$db_setup = mysql_select_db($db_website, $_SESSION['connection_setup']) or die(mysql_error());
						mysql_query("SET NAMES 'utf8'");
						$query = mysql_query("SELECT * FROM news WHERE id = ".$_GET['id']."") or die(mysql_error());
						$result = mysql_fetch_assoc($query) or die('<a href="panel.php?page=news"><div id="validate-error" class="form-message error">پيدا نشد.</div></a>');
					
					?>
                    	<form class="form" id="validate" action="" method="post">
						<div id="validate-error" class="form-message error" style="display:none;"></div>
							<div class="form-inline">
									<div class="form-row">
										<label class="form-label">عنوان</label>
										<div class="form-item">
											<input type="text" class="required small" name="title" id="title" placeholder="عنوان خبر خود را وارد کنيد" value="<?= $result['title'] ?>">
										</div>
									</div>
									<div class="form-row">
										<label class="form-label">زمان انتشار</label>
										<div class="form-item">
											<label class="form-label"><?= $calendar->date("l j F Y ساعت h:i:s", $result['datetime']); ?></label>
											<input type="text" class="required dtpicker medium" readonly name="datetime" id="datetime" placeholder="براي انتخاب زمان انتشار کليک کنيد.">
										</div>
									</div>
									<div class="form-row">
										<label class="form-label">ديدگاه ها</label>
										<div class="form-item">
											<label class="form-label"><?= $result['comments'] ?></label>
										</div>
									</div>
									<div class="form-row">
										<label class="form-label">نويسنده</label>
										<div class="form-item">
											<label class="form-label"><?= $result['author'] ?></label>
										</div>
									</div>
									<div class="form-row">
										<label class="form-label">ويرايشگر</label>
										<div class="form-item">
											<label class="form-label"><?= $result['editedby'] ?></label>
										</div>
									</div>
									<div class="form-row">
										<label class="form-label">لينک تصوير</label>
										<div class="form-item">
											<input type="text" class="required url large" name="imgurl" id="imgurl" placeholder="آدرس تصوير را وارد کنيد" value="<?= $result['imgurl'] ?>">
											<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 130px; line-height: 20px;">
												<img src="<?= $result['imgurl'] ?>" id="news_image">
											</div>
										</div>
									</div>
									<div class="form-row">
										<label class="form-label">متن</label>
										<div class="form-item">
											<textarea class="ckeditor" name="content" rows="6" name="content" id="content"><?= $result['content'] ?></textarea>
										</div>
									</div>
									<div class="form-row">
										<label class="form-label">ادامه متن</label>
										<div class="form-item">
											<textarea class="ckeditor" rows="6" name="content_full" id="content_full"><?= $result['content-full'] ?></textarea>
										</div>
									</div>
									<div class="form-row">
                                        <label class="form-label">ارسال ديدگاه</label>
                                        <div class="form-item">
                                                <input class="ibutton" type="checkbox" name="comment" id="comment" data-label-on="بلي" data-label-off="خير">
                                            </ul>
                                        </div>
                                    </div>
									<div class="form-row">
                                        <label class="form-label">پين شود</label>
                                        <div class="form-item">
                                            <input class="ibutton" type="checkbox" name="pinned" id="pinned" data-label-on="بلي" data-label-off="خير">
                                        </div>
                                    </div>
								</div>
								<div class="button-row">
									<input type="submit" name="editnews" id="editnews" value="ويرايش" class="btn btn-danger">
								</div>
                        </form>
                    </div>
                </div> 
				<?php
				}
				else
				{
					header("location: ?page=news");
				}
				?>
