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
                    	<span><i class="icon-pictures"></i> اسلايد شو</span>
                    </div>
					<div class="panel-toolbar">
                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <a href="panel.php?page=add_slideshow" class="btn"><i class="icol-add"></i> اضافه کردن</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                    <?php
					if(isset($_GET['delete']))
					{
						$db_setup = mysql_select_db($db_website, $_SESSION['connection_setup']) or die(mysql_error());
						$query = mysql_query("DELETE FROM slideshow WHERE id=".$_GET['delete']."") or die(mysql_error());
						echo '<div id="validate-success" class="form-message success">با موفقیت حذف شد.</div>';
					}
					?>
                		<ul class="thumbnails gallery">
						<?php
						$db_setup = mysql_select_db($db_website, $_SESSION['connection_setup']);
						mysql_query("SET NAMES 'utf8'");
						$query = mysql_query('SELECT * FROM slideshow');
						while($row = mysql_fetch_assoc($query))
						{
						?>
                			<li>
                            	<span class="thumbnail"><img src="../<?= $row['imgurl'] ?>" alt="<?= $row['label'] ?>"></span>
                                <span class="gallery-overlay">
                                    <a href="../<?= $row['imgurl'] ?>" rel="prettyPhoto[gallery1]" class="gallery-btn"><i class="icon-search"></i></a>
                                    <a href="panel.php?page=edit_slideshow&id=<?= $row['id'] ?>" class="gallery-btn"><i class="icon-pencil"></i></a>
                                    <a href="panel.php?page=slideshow&delete=<?= $row['id'] ?>" class="gallery-btn"  onclick="return confirm('آیا مطمئن هستید ؟');"><i class="icon-trash"></i></a>
                                </span>
                			</li>
				  <?php } ?>
                		</ul>
                    </div>
				</div>
                