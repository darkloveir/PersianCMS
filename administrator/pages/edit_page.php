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
                 <div class="panel grid_8">
                    <div class="panel-header">
                    	<span><i class="icon-edit"></i> ویرایش</span>
                    </div>
                    <div class="panel-body no-padding">
                     <?php
						$db_setup = mysql_select_db($db_website, $_SESSION['connection_setup'])or die(mysql_error());
						$page = $_GET['id'];
						if(isset($_POST['editpage'])){
							$_page = $_POST['page'];
							$_name = $_POST['name'];
							
							$_title = $_POST['title'];
							$_content = $_POST['content'];
							$_author = $_SESSION['gamemaster'];
							$_datetime = 0;
							if($_datetime == "") {
								$_datetime == NULL;
							} else {
								$_datetime = strtotime($_POST['datetime']);
							}
							
							$_type = 1;
							if(isset($_POST['type'])){
								$_type = 0;
							}
							
							$query = mysql_query("UPDATE `pages` SET `page` = '$_page', `name` = '$_name', `type` = '$_type', `title` = '$_title', `content` = '$_content', `author` = '$_author', `datetime` = '$_datetime' WHERE page = '$page';")or die(mysql_error());
							echo '<a href="panel.php?page=pages"><div id="validate-success" class="form-message success	">انجام شد.</div></a>';
						}
						
						$query = mysql_query("SELECT * FROM pages WHERE page = '$page'")or die(mysql_error());
						$result = mysql_fetch_assoc($query);
						$num = mysql_num_rows($query);
						if($num == 0){
							echo "صفحه مورد نظر یافت نشد. شاید قبلا پاک شده باشد.";
							die;
						}
						
						$name = $result['name'];
						$type = $result['type'];
						$title = $result['title'];
						$content = $result['content'];
						$author = $result['author'];
						$datetime = $result['datetime'];
						$author = $_SESSION['gamemaster'];
						$calendar = new jCalendar;
						?>
                        <form class="form" id="validate" action="" method="post">
						<div id="validate-error" class="form-message error" style="display:none;"></div>
							<div class="form-inline">
									<div class="form-row">
										<label class="form-label">نام فایل</label>
										<div class="form-item">
											<input type="text" class="required small" name="page" id="page" placeholder="نام اصلی یا نام فایل" value="<?= $page ?>">
										</div>
									</div>
									<div class="form-row">
										<label class="form-label">نام صفحه</label>
										<div class="form-item">
											<input type="text" class="required small" name="name" id="name" placeholder="نام فایل به فارسی" value="<?= $name ?>">
										</div>
									</div>
									<div class="form-row">
										<label class="form-label">نوع</label>
										<div class="form-item">
											<input class="ibutton" type="checkbox" name="type" id="type" data-label-on="به صورت فایل" data-label-off="به صورت دیتابیسی">
                                            <p><b>پیشفروض: </b><?php if($type == 0) echo"به صورت فایل"; else echo "به صورت دیتابیسی"; ?></p>
										</div>
                                        
									</div>
                                    <div class="form-row">
                                        <label class="form-label">عنوان</label>
                                        <div class="form-item">
											<input type="text" class="medium" name="title" id="title" placeholder="عنوان خود صفحه را انتخاب کنید." value="<?= $title ?>">
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
										<label class="form-label">متن</label>
										<div class="form-item">
											<textarea class="ckeditor" name="content" rows="6" name="content" id="content"><?= $result['content'] ?></textarea>
										</div>
									</div>
								</div>
								<div class="button-row">
									<input type="submit" name="editpage" id="editpage" value="ويرايش" class="btn btn-danger">
								</div>
                        </form>
                    </div>
                  </div>