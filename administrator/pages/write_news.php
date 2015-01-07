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
?>
				<div class="panel grid_8 collapsible" id="writenews">
                	<div class="panel-header">
                    	<span><i class="icon-pencil-2"></i> نوشتن خبر</span>
                    </div>
                    <div class="panel-body no-padding">
						<?php
						if(isset($_POST['writenews']))
						{
							$calendar = new jCalendar;
							$title = $_POST['title'];
							$datetime = strtotime($_POST['datetime']);
							$imgurl = $_POST['imgurl'];
							$content = $_POST['content'];
							$content_full = $_POST['content_full'];
							$lang = $_POST['lang'];
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
								
							$author = $_SESSION['gamemaster'];
							$db_setup = mysql_select_db($db_website, $_SESSION['connection_setup']);
							mysql_query("SET NAMES 'utf8'");
							$query = mysql_query("INSERT INTO `news` (`title`, `imgurl`, `content`, `content-full`, `datetime`, `commentallow`, `author`, `pinned`, `lang`) VALUES ('$title', '$imgurl', '$content', '$content_full', '$datetime' ,$comment, '$author', $pinned, '$lang');") or die(mysql_error());
							echo '<a href="panel.php?page=news"><div id="validate-success" class="form-message success">ارسال شد</div></a>';
						}
						$text_content = '<h3><img alt="" src=" " style="border-style:solid; border-width:0px; float:left; height:100px; margin:10px; width:100px" />متن عنوان خود را وارد کنید</h3><p>متن اصلی خود را وارد کنید.</p>';
						?>
                    	<form class="form" id="validate" action="" method="post">
						<div id="validate-error" class="form-message error" style="display:none;"></div>
							<div class="form-inline">
									<div class="form-row">
										<label class="form-label">عنوان</label>
										<div class="form-item">
											<input type="text" class="required small" name="title" id="title" placeholder="عنوان خبر خود را وارد کنيد">
										</div>
									</div>
									<div class="form-row">
										<label class="form-label">زمان انتشار</label>
										<div class="form-item">
											<input type="text" class="required dtpicker medium" readonly name="datetime" id="datetime" placeholder="براي انتخاب زمان انتشار کليک کنيد.">
										</div>
										زمان نشان داده شدن این پست.	
									</div>
									<div class="form-row">
										<label class="form-label">لينک تصوير</label>
										<div class="form-item">
											<input type="text" class="required url large" name="imgurl" id="imgurl" placeholder="آدرس تصوير را وارد کنيد">
										</div>
										لینک تصویر برای پست.
									</div>
									<div class="form-row">
										<label class="form-label">متن</label>
										<div class="form-item">
											<textarea class="ckeditor" name="content" rows="6" name="content" id="content"><?= $text_content; ?></textarea>
										</div>
									</div>
									<div class="form-row">
										<label class="form-label">ادامه متن</label>
										<div class="form-item">
											<textarea class="ckeditor" rows="6" name="content_full" id="content_full"></textarea>
										</div>
									</div>
									<div class="form-row">
                                        <label class="form-label">ارسال ديدگاه</label>
                                        <div class="form-item">
                                            <input class="ibutton" type="checkbox" name="comment" id="comment" data-label-on="بلي" data-label-off="خير">
                                        </div>
										اجازه دادن به کاربر برای نوشتن دیدگاه
                                    </div>
									<div class="form-row">
                                        <label class="form-label">پين شود</label>
                                        <div class="form-item">
                                            <input class="ibutton" type="checkbox" name="pinned" id="pinned" data-label-on="بلي" data-label-off="خير">
                                        </div>
										نمایش این خبر در 3 خبر پین شده در صفحه نخست.
                                    </div>
                                    <div class="form-row">
                                        <label class="form-label">زبان خبر</label>
                                        <div class="mws-form-item">
                    					<select class="medium" name="lang" id="lang">
                                        <?php
											$db_setup = mysql_select_db($db_website, $_SESSION['connection_setup']);
											mysql_query("SET NAMES 'utf8'");
											$query = mysql_query('SELECT * FROM languages');
											while($row = mysql_fetch_assoc($query))
											{
												echo '<option value="'.$row['lang'].'">'.$row['name'].'</option>';
											}
										?>
                    					</select>
                    				</div>
										این خبر فقط برای زبانی که انتخاب کرده اید نمایش داده میشود.
                                    </div>
								</div>
								<div class="button-row">
									<input type="submit" name="writenews" id="writenews" value="ارسال" class="btn btn-danger">
								</div>
                        </form>
                    </div>
                </div> 