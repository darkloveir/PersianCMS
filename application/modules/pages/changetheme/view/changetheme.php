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
include "application/modules/pages/changetheme/control/changetheme.php";
include ("application/languages/".$_SESSION['language']."/changetheme.php");
?>
<link rel="stylesheet" type="text/css" href="application/modules/pages/changetheme/css/style.css">
<div class="content-title"><h3><?= $p_changetheme['1'] ?></h3></div>
<div class="news-info"></div>
<div class="content-body">
   <div class="text">
   <?= (isset($message)) ? $message : ''; ?>
   <div class="messages"><?= $p_changetheme['2'] ?></div>
    <div class="row" id="rows">
    <?php
	 while($result = mysql_fetch_assoc($query)) { ?>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="<?= $website_address ?>application/themes/<?= $result['name']; ?>/<?= $_SESSION['dir']; ?>/screenshot.jpg" alt="<?= $result['name']; ?>" class="img-thumbnail">
          <div class="caption">
            <h3><?= $result['title']; ?></h3>
            <p><?= $result['description']; ?></p>
            <p>
              <a href="changetheme&theme=<?= $result['name']; ?>" class="btn btn-success btn-medium" role="button"><?= $p_changetheme['3'] ?></a>
            </p>
          </div>
        </div>
      </div>
     <?php } ?>
    </div>
   </div>
</div>
<div class="content-footer"></div>
<div class="content-end">&nbsp;</div>