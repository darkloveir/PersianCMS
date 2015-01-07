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
include "application/modules/pages/charbanlist/control/charbanlist.php";
include ("application/languages/".$_SESSION['language']."/charbanlist.php");
?>
<div class="content-title"><h3><?= $p_charbanlist['1'] ?></h3></div>
<div class="news-info">
    <div class="information">
      <font class="news-information"><?= $p_charbanlist['2'] ?></font> :
      <?= $rows; ?> <?= $p_charbanlist['3'] ?>
    </div>
</div>
<div class="content-body">
   <div class="text">
      <div class="col-md-13">
        <table class="table table-condensed">
          <thead>
            <tr>
              <th><?= $p_charbanlist['4'] ?></th>
              <th><?= $p_charbanlist['5'] ?></th>
              <th><?= $p_charbanlist['6'] ?></th>
              <th><?= $p_charbanlist['7'] ?></th>
              <th><?= $p_charbanlist['8'] ?></th>
            </tr>
          </thead>
          <tbody>
          <?php while($result = mysql_fetch_assoc($query)) { 
            $guid = $result['guid'];
            $q = mysql_query("SELECT * FROM characters WHERE guid = $guid;");
            $r = mysql_fetch_array($q);
            $name = $r['name'];
          ?>
            <tr>
              <td><?= $name; ?></td>
              <td><?= ago($result['bandate']); ?></td>
              <td><?= $c->date('j F Y', $result['unbandate']); ?></td>
              <td><?= $result['bannedby']; ?></td>
              <td><?= $result['banreason']; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
   </div>
</div>
<div class="content-footer"></div>
<div class="content-end">&nbsp;</div>
