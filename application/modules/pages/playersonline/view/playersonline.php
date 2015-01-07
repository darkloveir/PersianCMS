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
include "application/modules/pages/playersonline/control/playersonline.php";
?>
<div class="content-title"><h3>بازيکنان آنلاين</h3></div>
<div class="news-info">
    <div class="information">
      <font class="news-information">تعداد بازیکنان آنلاین</font> :
      <?= $rows; ?> بازیکن
    </div>
</div>
<div class="content-body">
   <div class="text">
      <div class="col-md-13">
        <table class="table table-condensed">
          <thead>
            <tr>
              <th>نام هیرو</th>
              <th>کلاس</th>
              <th>نژاد</th>
              <th>لول</th>
              <th>لتنسی</th>
            </tr>
          </thead>
          <tbody>
          <?php while($result = mysql_fetch_assoc($query)) { ?>
            <tr>
              <td><?= $result['name']; ?></td>
              <td><?= get_race_icon($result['race'], $result['gender']); ?></td>
              <td><?= get_class_icon($result['class']); ?></td>
              <td><?= $result['level']; ?></td>
              <td><?= $result['latency']; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
   </div>
</div>
<div class="content-footer"></div>
<div class="content-end">&nbsp;</div>
