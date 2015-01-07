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
include "application/modules/pages/get_result/control/get_result.php";
include ("application/languages/".$_SESSION['language']."/get_result.php");
?>
<div class="content-title"><h3><?= $p_get_result['1'] ?></h3></div>
<div class="news-info"></div>
<div class="content-body">
   <div class="text">
   <?= (isset($message)) ? $message : ''; ?>
   <div class="messages"><p><?= $p_get_result['2'] ?>p></div>
    <table width="80%" border="0" align="center" cellpadding="3" cellspacing="3">
    <form action="index.php" method="post">
    <br/>
      <tr>
        <td width="28%"><?= $p_get_result['3'] ?></td>
        <td width="72%" align="right"><?= number_format($trans_id) ?></td>
      </tr>
      <tr>
        <td width="28%"><?= $p_get_result['4'] ?></td>
        <td width="72%" align="right"><?= number_format($id_get) ?></td>
      </tr>
      <tr>
        <td width="28%"><?= $p_get_result['5'] ?></td>
        <td width="72%" align="right"><?= number_format($amount) ?></td>
      </tr>
    </form>
    </table>
   </div>
</div>
<div class="content-footer"></div>
<div class="content-end">&nbsp;</div>