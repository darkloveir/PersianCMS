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
                    	<span><i class="icon-edit"></i> اضافه کردن اسلایدشو</span>
                    </div>
                    <div class="panel-body no-padding">
                     <?php
						$db_setup = mysql_select_db($db_website, $_SESSION['connection_setup'])or die(mysql_error());
						mysql_query("SET NAMES 'utf8'");
						$id = $_GET['id'];
						if(isset($_POST['addslideshow'])){
							$label = $_POST['label'];
							$imgurl = $_POST['imgurl'];
							$lang = $_POST['lang'];
							
							$query = mysql_query("INSERT INTO `slideshow`(`label`, `imgurl`, `lang`) VALUES ('$label', '$imgurl', '$lang')")or die(mysql_error());
							echo '<a href="panel.php?page=slideshow"><div id="validate-success" class="form-message success	">انجام شد.</div></a>';
						}
						?>
                        <form class="form" id="validate" action="" method="post">
						<div id="validate-error" class="form-message error" style="display:none;"></div>
							<div class="form-inline">
									<div class="form-row">
										<label class="form-label">متن اسلاید</label>
										<div class="form-item">
											<input type="text" class="required small" name="label" id="label" placeholder="نامی که روی اسلاید نمایش داده میشود" value="<?= $label ?>">
										</div>
									</div>
									<div class="form-row">
										<label class="form-label">لينک تصوير</label>
										<div class="form-item">
											<input type="text" class="required large" name="imgurl" id="imgurl" placeholder="ادرس تصویر در پوشه اصلی وبسایت" value="<?= $imgurl ?>">
										</div>
									</div>
                                    <div class="form-row">
                                        <label class="form-label">زبان اسلایدشو</label>
                                        <div class="mws-form-item">
                    					<select class="required medium" name="lang" id="lang">
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
									<input type="submit" name="addslideshow" id="addslideshow" value="اضافه کردن" class="btn btn-success">
								</div>
                        </form>
                    </div>
                  </div>