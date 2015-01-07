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
						<span><i class="icon-edit"></i> دیدگاه ها</span>
					</div>
					<div class="panel-body no-padding">
					<?php
					if(isset($_GET['delete']))
					{
						$db_setup = mysql_select_db($db_website, $_SESSION['connection_setup']) or die(mysql_error());
						$query = mysql_query("DELETE FROM comments WHERE id=".$_GET['delete']."") or die(mysql_error());
						echo '<div id="validate-success" class="form-message success">با موفقیت حذف شد.</div>';
					}
					if(isset($_GET['active']))
					{
						$db_setup = mysql_select_db($db_website, $_SESSION['connection_setup']) or die(mysql_error());
						$query = mysql_query("UPDATE `comments` SET `active` = '1' WHERE id=".$_GET['active']."") or die(mysql_error());
						echo '<div id="validate-success" class="form-message success">با موفقیت پذیرفته شد.</div>';
					}
					if(isset($_GET['deactive']))
					{
						$db_setup = mysql_select_db($db_website, $_SESSION['connection_setup']) or die(mysql_error());
						$query = mysql_query("UPDATE `comments` SET `active` = '0' WHERE id=".$_GET['deactive']."") or die(mysql_error());
						echo '<div id="validate-success" class="form-message success">با موفقیت انجام شد.</div>';
					}
					?>
						<table class="datatable-fn table">
							<thead>
								<tr>
									<th><i class="icon-check"></i> وضعیت</th>
									<th><i class="icon-file"></i> متن</th>
									<th><i class="icon-calendar"></i> زمان ارسال</th>
									<th><i class="icon-newspaper"></i> خبر</th>
									<th><i class="icon-official"></i> نویسنده</th>
									<th><i class="icon-wrench"></i> تنظمیات</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$db_setup = mysql_select_db($db_website, $_SESSION['connection_setup']);
								mysql_query("SET NAMES 'utf8'");
								$query = mysql_query('SELECT * FROM comments');
								while($row = mysql_fetch_assoc($query))
								{
								?>

								<tr>
									<td><?php if($row['active'] == 1) echo "<span class='badge badge-success'>پذیرفته شده</span>"; else echo "<span class='badge badge-important'>پذیرفته نشده</span>";?></td>
									<td><?= $row['comment']; ?></td>
									<td><?= ago($row['datetime']); ?></td>
									<td><a href="panel.php?page=edit_news&id=<?= $row['newsid'] ?>">کلیک کنید</td>
									<td><?= $row['author'] ?></td>
									<td>
										<span class="btn-group">
											<a href="panel.php?page=comments&delete=<?= $row['id'] ?>" class="btn btn-medium btn-danger" onclick="return confirm('آیا مطمئن هستید ؟');" rel="tooltip" data-placement="top" value="Top" data-original-title="پاک کردن کامل این دیدگاه"><i class="icon-trash"></i></a>
											<a href="panel.php?page=comments&active=<?= $row['id'] ?>" class="btn btn-medium btn-success" rel="tooltip" data-placement="top" value="Top" data-original-title="پذیرفتن دیدگاه"><i class="icon-ok-sign"></i></a>
											<a href="panel.php?page=comments&deactive=<?= $row['id'] ?>" class="btn btn-medium btn-warning" rel="tooltip" data-placement="top" value="Top" data-original-title="نپذیرفتن دیدگاه"><i class="icon-remove-sign"></i></a>
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