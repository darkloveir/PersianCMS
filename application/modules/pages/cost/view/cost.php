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
include "application/modules/pages/cost/control/cost.php";
include ("application/languages/".$_SESSION['language']."/cost.php");
?>
<div class="content-title"><h3><?= $p_cost['1'] ?></h3></div>
<div class="news-info">
    <div class="information">
      <font class="news-information"><?= $p_cost['2'] ?></font> :
      <?= $dp; ?> <?= $p_cost['11'] ?> 
      <font class="news-information"><?= $p_cost['3'] ?></font> :
      <?= $success; ?> 
      <font class="news-information"><?= $p_cost['4'] ?></font> :
      <?= $unsuccess; ?>
      &nbsp;
    </div>
</div>
<div class="content-body">
   <div class="text">
      <div class="col-md-13">
        <table class="table table-condensed">
          <thead>
            <tr>
              <th><?= $p_cost['5'] ?></th>
              <th><?= $p_cost['6'] ?></th>
              <th><?= $p_cost['7'] ?></th>
              <th><?= $p_cost['8'] ?></th>
              <th><?= $p_cost['9'] ?></th>
              <th><?= $p_cost['10'] ?></th>
            </tr>
          </thead>
          <tbody>
          <?php while($result = mysql_fetch_assoc($query)) { ?>
            <tr>
              <td><?= $result['id_get']; ?></td>
              <td><?= $result['trans_id']; ?></td>
              <td><?= $result['amount']; ?></td>
              <td><?= $result['description']; ?></td>
              <td><?= ago($result['stamp']); ?></td>
              <td><?php if($result['status'] == 0) echo "<font color='red'>ناموفق</font>"; else echo "<font color='green'>موفق</font>"; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>

   </div>
</div>
<div class="content-footer"></div>
<div class="content-end">&nbsp;</div>
