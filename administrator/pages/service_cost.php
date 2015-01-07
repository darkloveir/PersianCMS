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
                    	<span><i class="icon-edit"></i> هزینه سرویس ها</span>
                    </div>
                    <div class="panel-body no-padding">
                     <?php
						$db_setup = mysql_select_db($db_website, $_SESSION['connection_setup'])or die(mysql_error());
						mysql_query("SET NAMES 'utf8'");
						if(isset($_POST['editcost'])){
							$rename_dp = $_POST['rename_dp'];
							$rename_vp = $_POST['rename_vp'];
							
							$changerace_dp = $_POST['changerace_dp'];
							$changerace_vp = $_POST['changerace_vp'];
							
							$changefaction_dp = $_POST['changefaction_dp'];
							$changefaction_vp = $_POST['changefaction_vp'];
							
							$changeappear_dp = $_POST['changeappear_dp'];
							$changeappear_vp = $_POST['changeappear_vp'];
							
							$unban_dp = $_POST['unban_dp'];
							
							$query = mysql_query("UPDATE `service_name` SET `dp` = '$rename_dp', `vp` = '$rename_vp' WHERE name = 'rename';")or die(mysql_error());
							$query = mysql_query("UPDATE `service_name` SET `dp` = '$changerace_dp', `vp` = '$changerace_vp' WHERE name = 'changerace';")or die(mysql_error());
							$query = mysql_query("UPDATE `service_name` SET `dp` = '$changefaction_dp', `vp` = '$changefaction_vp' WHERE name = 'changefaction';")or die(mysql_error());
							$query = mysql_query("UPDATE `service_name` SET `dp` = '$changeappear_dp', `vp` = '$changeappear_vp' WHERE name = 'changeappear';")or die(mysql_error());
							$query = mysql_query("UPDATE `service_name` SET `dp` = '$unban_dp' WHERE name = 'unban';")or die(mysql_error());
							echo '<a href="panel.php?page=service_cost"><div id="validate-success" class="form-message success	">انجام شد.</div></a>';
						}
						?>
                        <form class="form" id="validate" action="" method="post">
						<div id="validate-error" class="form-message error" style="display:none;"></div>
							<div class="form-inline">
									<div class="form-row">
										<label class="form-label">تغییر نام</label>
										<div class="form-item">
                                        <?php
										$query = mysql_query("SELECT * FROM `service_name` WHERE `name` = 'rename';")or die(mysql_error());
										mysql_query("SET NAMES 'utf8'");
										$result = mysql_fetch_assoc($query);
										$rename_dp = $result['dp'];
										$rename_vp = $result['vp'];
										?>
											<input type="text" class="required small" name="rename_dp" id="rename_dp" placeholder="مقدار امتیاز ویژه مورد نیاز برای تغییر نام" value="<?= $rename_dp ?>"> امتیاز ویژه
                                            <input type="text" class="required small" name="rename_vp" id="rename_vp" placeholder="مقدار امتیاز رای مورد نیاز برای تغییر نام" value="<?= $rename_vp ?>"> امتیاز رای
										</div>
									</div>
									<div class="form-row">
										<label class="form-label">تغییر نژاد</label>
										<div class="form-item">
                                        <?php
										$query = mysql_query("SELECT * FROM `service_name` WHERE `name` = 'changerace';")or die(mysql_error());
										mysql_query("SET NAMES 'utf8'");
										$result = mysql_fetch_assoc($query);
										$changerace_dp = $result['dp'];
										$changerace_vp = $result['vp'];
										?>
											<input type="text" class="required small" name="changerace_dp" id="changerace_dp" placeholder="مقدار امتیاز ویژه مورد نیاز برای تغییر نژاد" value="<?= $changerace_dp ?>"> امتیاز ویژه
                                            <input type="text" class="required small" name="changerace_vp" id="changerace_vp" placeholder="مقدار امتیاز رای مورد نیاز برای تغییر نژاد" value="<?= $changerace_vp ?>"> امتیاز رای
										</div>
									</div>
                                    <div class="form-row">
										<label class="form-label">تغییر فرقه</label>
										<div class="form-item">
                                        <?php
										$query = mysql_query("SELECT * FROM `service_name` WHERE `name` = 'changefaction';")or die(mysql_error());
										mysql_query("SET NAMES 'utf8'");
										$result = mysql_fetch_assoc($query);
										$changefaction_dp = $result['dp'];
										$changefaction_vp = $result['vp'];
										?>
											<input type="text" class="required small" name="changefaction_dp" id="changefaction_dp" placeholder="مقدار امتیاز ویژه مورد نیاز برای تغییر فرقه" value="<?= $changefaction_dp ?>"> امتیاز ویژه
                                            <input type="text" class="required small" name="changefaction_vp" id="changefaction_vp" placeholder="مقدار امتیاز رای مورد نیاز برای تغییر فرقه" value="<?= $changefaction_vp ?>"> امتیاز رای
										</div>
									</div>
                                    <div class="form-row">
										<label class="form-label">تغییر شکل</label>
										<div class="form-item">
                                        <?php
										$query = mysql_query("SELECT * FROM `service_name` WHERE `name` = 'changeappear';")or die(mysql_error());
										mysql_query("SET NAMES 'utf8'");
										$result = mysql_fetch_assoc($query);
										$changeappear_dp = $result['dp'];
										$changeappear_vp = $result['vp'];
										?>
											<input type="text" class="required small" name="changeappear_dp" id="changeappear_dp" placeholder="مقدار امتیاز ویژه مورد نیاز برای تغییر شکل" value="<?= $changeappear_dp ?>"> امتیاز ویژه
                                            <input type="text" class="required small" name="changeappear_vp" id="changeappear_vp" placeholder="مقدار امتیاز رای مورد نیاز برای تغییر شکل" value="<?= $changeappear_vp ?>"> امتیاز رای
										</div>
									</div>
                                    <div class="form-row">
										<label class="form-label">پرداخت جریمه</label>
										<div class="form-item">
                                        <?php
										$query = mysql_query("SELECT * FROM `service_name` WHERE `name` = 'unban';")or die(mysql_error());
										mysql_query("SET NAMES 'utf8'");
										$result = mysql_fetch_assoc($query);
										$unban_dp = $result['dp'];
										?>
											<input type="text" class="required small" name="unban_dp" id="unban_dp" placeholder="مقدار امتیاز ویژه مورد نیاز برای پرداخت جریمه" value="<?= $unban_dp ?>"> امتیاز ویژه
										</div>
									</div>
								</div>
								<div class="button-row">
									<input type="submit" name="editcost" id="editcost" value="ويرايش" class="btn btn-danger">
								</div>
                        </form>
                    </div>
                  </div>