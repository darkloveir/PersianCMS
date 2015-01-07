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
include ("application/languages/".$_SESSION['language']."/404.php");
?>
<div class="content-title"><h3><?= $p_404['notfound'] ?></h3></div>
<div class="news-info"></div>
<div class="content-body">
   <div class="text">
    <div id="mws-error-page">
          <h1><?= $p_404['error'] ?> <span><?= $p_404['404'] ?></span></h1>
          <h5><?= $p_404['pagenotfound'] ?></h5>
          <p><?= $p_404['redirect1'] ?> <a href="index.php"> <?= $p_404['redirect2'] ?></a> <?= $p_404['redirect3'] ?></p>
      </div>
   </div>
</div>
<div class="content-footer"></div>
<div class="content-end">&nbsp;</div>