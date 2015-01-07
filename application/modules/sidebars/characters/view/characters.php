<div class="sidebar-module">
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
include ("application/languages/".$_SESSION['language']."/characters.php");
include "application/modules/sidebars/characters/control/characters.php";
?>
  <div class="sidebar-title"><?= $characters['1'] ?></div>
  <div class="sidebar-body">
        <div class="form-group">
          <div class="col-sm-3 character-avatar" style="background-image:url(<?= $website_address ?>application/images/avatar/<?= number_format($race) ?>-<?= number_format($gender) ?>.jpg)"></div>
          <div class="col-sm-8">
              <form class="form-horizontal" method="post" id="characters" action="">
                  <div class="input-group">
                      <select class="form-control" name="character" id="character">
                          <option value=""><?= $characters['2'] ?></option>
                          <?php while($data = mysql_fetch_assoc($query)) { ?>
                              <option value="<?= $data['name'] ?>"><?= $data['name'] ?></option>
                          <?php } ?>
                      </select>
                      <span class="input-group-btn">
                          <input type="hidden" name="characters" />
                          <button type="submit" class="btn btn-primary" id="send" name="send"><?= $characters['3'] ?></button>
                      </span>
                   </div>
              </form>
              <?php if(isset($_SESSION['main_char'])) { ?>
              <div class="form-group">
                  <label class="col-sm-4 control-label"><?= $characters['4'] ?></label>
                  <div class="col-sm-8">
                   <label class="control-label"><?= $main_char; ?></label>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-4 control-label"><?= $characters['5'] ?></label>
                  <div class="col-sm-8">
                   <label class="control-label"><?= get_race_icon($race, $gender); ?></label>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-4 control-label"><?= $characters['6'] ?></label>
                  <div class="col-sm-8">
                   <label class="control-label"><?= get_class_icon($class); ?></label>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-4 control-label"><?= $characters['7'] ?></label>
                  <div class="col-sm-8">
                   <label class="control-label"><?= $level; ?></label>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-4 control-label"><?= $characters['8'] ?></label>
                  <div class="col-sm-8">
                   <label class="control-label"><?= get_character_status($online); ?></label>
                  </div>
              </div>
              <?php } ?>
          </div>
        </div>
  </div>
</div>