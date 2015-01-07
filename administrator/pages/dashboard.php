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
					<div class="panel grid_4">
						<div class="panel-header">
							<span><i class="icon-book"></i> خلاصه وبسايت</span>
						</div>
						<div class="panel-body no-padding">
							<ul class="summary clearfix">
								<li>
									<span class="key"><i class="icon-support"></i> درخواست ها</span>
									<span class="val">
										<span class="text-nowrap"><i class="icol-cross"></i> <?php num_rows($db_characters, "SELECT * FROM gm_tickets WHERE completed = 0 OR viewed = 0"); ?> بررسي نشده</span>
										<span class="text-nowrap"><i class="icol-accept"></i> <?php num_rows($db_characters, "SELECT * FROM gm_tickets WHERE completed = 1 OR viewed = 1"); ?> بررسي شده</span>
									</span>
								</li>
								<li>
									<span class="key"><i class="icon-legal"></i> مشکل ها</span>
									<span class="val">
										<span class="text-nowrap"><?php num_rows($db_characters, "SELECT * FROM bugreport"); ?></span>
									</span>
								</li>
								<li>
									<span class="key"><i class="icon-install"></i> در آمد کل</span>
									<span class="val">
										<span class="text-nowrap"><?php echo get_all($db_website, "SELECT * FROM pay_information"); ?> ریال</span>
									</span>
								</li>
								<li>
									<span class="key"><i class="icon-key"></i> آخرين ورود</span>
									<span class="val">
										<span class="text-nowrap"><?php $r = fetch_assoc($db_auth, "SELECT * FROM account WHERE username = '".$_SESSION['gamemaster']."'"); echo ago(strtotime($r['joindate'])); ?></span>
									</span>
								</li>
								<li>
									<span class="key"><i class="icon-monitor"></i> سيستم عامل</span>
									<span class="val">
										<span class="text-nowrap"><?php echo getOS(); ?></span>
									</span>
								</li>
								<li>
									<span class="key"><i class="icon-globe"></i> مرورگر</span>
									<span class="val">
										<span class="text-nowrap"><?php echo getBrowser(); ?></span>
									</span>
								</li>
							</ul>
						</div>
					</div>
					
					<div class="panel grid_4">
						<div class="panel-header">
							<span><i class="icon-book"></i> خلاصه اکانت ها</span>
						</div>
						<div class="panel-body no-padding">
							<ul class="summary clearfix">
								<li>
									<span class="key"><i class="icon-business-card"></i> اکانت ها</span>
									<span class="val">
										<span class="text-nowrap"><?php num_rows($db_auth, "SELECT * FROM account"); ?></span>
									</span>
								</li>
								<li rel="tooltip">
									<span class="key"><i class="icon-user"></i> تعداد مديران</span>
									<span class="val">
										<span class="text-nowrap"><?php num_rows($db_auth, "SELECT * FROM account inner join account_access on account.id = account_access.id WHERE account_access.gmlevel >= 1"); ?></span>
									</span>
								</li>
								<li rel="tooltip">
									<span class="key"><i class="icon-user"></i> تعداد توقيفي ها</span>
									<span class="val">
										<span class="text-nowrap"><?php num_rows($db_auth, "SELECT * FROM account_banned WHERE active = 1"); ?></span>
									</span>
								</li>
								<li rel="tooltip">
									<span class="key"><i class="icon-user"></i> آيپي هاي توقيفي</span>
									<span class="val">
										<span class="text-nowrap"><?php num_rows($db_auth, "SELECT * FROM ip_banned"); ?></span>
									</span>
								</li>
								<li>
									<span class="key"><i class="icon-add-contact"></i> آخرين اکانت</span>
									<span class="val">
										<span class="text-nowrap"><?php $r = fetch_assoc($db_auth, "SELECT * FROM account ORDER BY `joindate` DESC LIMIT 1"); echo $r['username']; ?></span>
									</span>
								</li>
								<li rel="tooltip" data-placement="top" data-original-title="آخرين زمان اکانت ساخته شده">
									<span class="key"><i class="icon-calendar"></i> آخرين زمان اکانت</span>
									<span class="val">
										<span class="text-nowrap"><?php $r = fetch_assoc($db_auth, "SELECT * FROM account ORDER BY `joindate` DESC LIMIT 1"); echo ago(strtotime($r['joindate'])); ?></span>
									</span>
								</li>
							</ul>
						</div>
					</div>

				</div>
