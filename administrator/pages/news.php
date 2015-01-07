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
				<div class="panel grid_8 collapsible" id="news">
					<div class="panel-header">
						<span><i class="icon-edit"></i> خبر</span>
					</div>
					<div class="panel-body no-padding">
					<?php
					if(isset($_GET['delete']))
					{
						$db_setup = mysql_select_db($db_website, $_SESSION['connection_setup']) or die(mysql_error());
						$query = mysql_query("DELETE FROM news WHERE id=".$_GET['delete']."") or die(mysql_error());
						echo '<div id="validate-success" class="form-message success">با موفقیت حذف شد.</div>';
					}
					?>
						<table class="datatable-fn table">
							<thead>
								<tr>
									<th><i class="icon-check"></i> عنوان</th>
									<th><i class="icon-file"></i> متن</th>
									<th><i class="icon-calendar"></i> تاریخ</th>
									<th><i class="icon-newspaper"></i> دیدگاه ها</th>
									<th><i class="icon-official"></i> نویسنده</th>
									<th><i class="icon-wrench"></i> تنظمیات</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$calendar = new jCalendar;  
								$db_setup = mysql_select_db($db_website, $_SESSION['connection_setup']);
								mysql_query("SET NAMES 'utf8'");
								$query = mysql_query('SELECT * FROM news');
								while($row = mysql_fetch_assoc($query))
								{
								?>

								<tr>
									<td><span class="badge badge-info"><?= $row['lang'] ?></span ><?= $row['title'] ?></td>
									<td><?= strip_tags(limit_words($row['content'], 10)); ?>...</td>
									<td><?php echo $calendar->date("l j F Y | h:i:s", $row['datetime']); ?></td>
									<td><?= $row['comments'] ?></td>
									<td><?= $row['author'] ?></td>
									<td>
										<span class="btn-group">
											<a href="panel.php?page=news&delete=<?= $row['id'] ?>" id="jui-dialog-btn" class="btn btn-medium btn-danger" onclick="return confirm('آیا مطمئن هستید ؟');"><i class="icon-trash"></i></a>
											<a href="panel.php?page=edit_news&id=<?= $row['id'] ?>" class="btn btn-medium btn-success"><i class="icon-edit"></i></a>
										</span>
									</td>
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>