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
				<div id="panel">
					<div class="panel grid_8">
						<div class="panel-header">
							<span><i class="icon-support"></i> درخواست ها</span>
						</div>
						<div class="panel-body no-padding">
							<table class="datatable-fn table">
								<thead>
									<tr>
										<th><i class="icon-user"></i> نام</th>
										<th><i class="icon-icon-envelope"></i> پیغام</th>
										<th><i class="icon-calendar"></i> تاریخ ارسال</th>
										<th><i class="icon-calendar"></i> آخرین ویرایش</th>
										<th><i class="icon-comment"></i> یادداشت مدیر</th>
										<th><i class="icon-comments"></i> پاسخ</th>
										<th><i class="icon-stats"></i> وضعیت</th>
										<th><i class="icon-cog"></i> تنظمیات</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$calendar = new jCalendar;  
									$db_setup = mysql_select_db($db_characters, $_SESSION['connection_setup']);
									$query = mysql_query('SELECT * FROM gm_tickets ORDER BY lastModifiedTime DESC');
									while($row = mysql_fetch_assoc($query))
									{
									?>
									<tr class="read">
										<td><?= $row['name'] ?></td>
										<td><?= limit_words($row['message'], 5); ?>...</td>
										<td><?php echo $calendar->date("H:i | Y,M d", $row['createTime'] , 12600); ?></td>
										<td><?php echo $calendar->date("H:i | Y,M d", $row['createTime'] , 12600); ?></td>
										<td><?= limit_words($row['comment'], 5); ?>...</td>
										<td><?= limit_words($row['response'], 5); ?>...</td>
										<td>
											<?php 
											if($row['viewed'] == 1)  
												echo "<span class='badge badge-success'>بررسی شده</span> "; 
												
											if($row['completed'] == 1)  
												echo "<span class='badge badge-success'>اتمام کار</span> "; 
											else
												echo "<span class='badge badge-important'>معلق</span> "; 
											?>
											
										</td>
										<td>
											<span class="btn-group">
												<a href="#" class="btn btn-medium btn-danger"  rel="tooltip" data-placement="top" value="Top" title="بستن درخواست"><i class="icon-blocked"></i></a>
												<a href="#" class="btn btn-medium btn-success" rel="tooltip" data-placement="top" value="Top" title="اتمام کار درخواست"><i class="icon-ok-sign"></i></a>
												<a href="#" class="btn btn-medium btn-primary dropdown-toggle" data-toggle="dropdown"><i class="icon-th-list"></i></a>
												<ul class="dropdown-menu pull-right">
													<li><a href="#"><i class="icon-comment"></i> پاسخ دادن</a></li>
													<li><a href="#"><i class="icon-ok"></i> امضا کردن</a></li>
													<li><a href="#"><i class="icon-trash"></i> حذف کردن</a></li>
												</ul>
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
				</div>
