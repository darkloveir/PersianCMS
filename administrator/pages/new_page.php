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
                    	<span><i class="icon-edit"></i> برگه جدید</span>
                    </div>
                    <div class="panel-body no-padding">
                     <?php
						$db_setup = mysql_select_db($db_website, $_SESSION['connection_setup'])or die(mysql_error());
						if(isset($_POST['newpage'])){
							$_page = $_POST['page'];
							$_name = $_POST['name'];
							
							$_title = $_POST['title'];
							$_content = $_POST['content'];
							$_author = $_SESSION['gamemaster'];
							$_datetime = strtotime($_POST['datetime']);
							$_lang = $_POST['lang'];
							$_type = 1;
							if(isset($_POST['type']))
							{
								$_type = 0;
							}
							
							$query = mysql_query("INSERT INTO `pages` (`page`, `name`, `type`, `title`, `content`, `author`, `datetime`, `lang`) VALUES ('$_page', '$_name', $_type, '$_title', '$_content', '$_author', $_datetime, '$_lang');")or die(mysql_error());
							echo '<a href="panel.php?page=pages"><div id="validate-success" class="form-message success	">انجام شد.</div></a>';
						}
						?>
                        <form class="form" id="validate" action="" method="post">
						<div id="validate-error" class="form-message error" style="display:none;"></div>
							<div class="form-inline">
									<div class="form-row">
										<label class="form-label">نام فایل</label>
										<div class="form-item">
											<input type="text" class="required small" name="page" id="page" placeholder="نام اصلی یا نام فایل">
										</div>
									</div>
									<div class="form-row">
										<label class="form-label">نام صفحه</label>
										<div class="form-item">
											<input type="text" class="required small" name="name" id="name" placeholder="نام فایل به فارسی">
										</div>
									</div>
									<div class="form-row">
										<label class="form-label">نوع</label>
										<div class="form-item">
											<input class="ibutton" type="checkbox" name="type" id="type" data-label-on="به صورت فایل" data-label-off="به صورت دیتابیسی">
										</div>
                                        
									</div>
                                    <div class="form-row">
                                        <label class="form-label">عنوان</label>
                                        <div class="form-item">
											<input type="text" class="medium" name="title" id="title" placeholder="عنوان خود صفحه را انتخاب کنید.">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <label class="form-label">زمان انتشار</label>
                                        <div class="form-item">
                                            <input type="text" class="required dtpicker medium" readonly name="datetime" id="datetime" placeholder="براي انتخاب زمان انتشار کليک کنيد.">
                                        </div>
                                    </div>
                                    <div class="form-row">
										<label class="form-label">متن</label>
										<div class="form-item">
											<textarea class="ckeditor" name="content" rows="6" name="content" id="content"></textarea>
										</div>
									</div>
                                    <div class="form-row">
                                        <label class="form-label">زبان برگه</label>
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
										این برگه فقط برای زبانی که انتخاب کرده اید نمایش داده میشود. در غیر اینصورت با خطا مواجه میشوید.
                                    </div>
								</div>
								<div class="button-row">
									<input type="submit" name="newpage" id="newpage" value="ارسال" class="btn btn-danger">
								</div>
                        </form>
                    </div>
                  </div>