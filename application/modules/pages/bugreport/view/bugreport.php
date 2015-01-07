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
include "application/modules/pages/bugreport/control/bugreport.php";
include ("application/languages/".$_SESSION['language']."/bugreport.php");
?>
<div class="content-title"><h3><?= $p_bugreport['1'] ?></h3></div>
<div class="news-info"></div>
<div class="content-body">
   <div class="text">
    <?= (isset($message)) ? $message : ''; ?>
    <form class="form-horizontal" method="post" id="form" action="">
        <div class="form-group">
          <label for="mozo" class="col-sm-2 control-label"><?= $p_bugreport['2'] ?></label>
          <div class="col-sm-5">
               <input type="text" class="form-control" id="mozo" name="mozo"  placeholder="<?= $p_bugreport['3'] ?>">
         </div>
        </div>
      <div class="form-group">
          <label class="col-sm-2 control-label"><?= $p_bugreport['4'] ?></label>
              <div class="col-sm-5">
                <select class="form-control" id="olaviat" name="olaviat" data-bv-notempty data-bv-notempty-message="<?= $p_bugreport['5'] ?>">
                      <option value="">-- <?= $p_bugreport['6'] ?> --</option>
                      <option value="زیاد"><?= $p_bugreport['7'] ?></option>
                      <option value="متوسط"><?= $p_bugreport['8'] ?></option>
                      <option value="کم"><?= $p_bugreport['9'] ?></option>
                  </select>
              </div>
			  </div>
      <div class="form-group">
          <label class="col-sm-2 control-label"><?= $p_bugreport['10'] ?></label>
              <div class="col-sm-5">
                <select class="form-control" id="noebug" name="noebug" data-bv-notempty data-bv-notempty-message="<?= $p_bugreport['11'] ?>">
                      <option value=""><?= $p_bugreport['12'] ?></option>
                      <option value="وبسایت"><?= $p_bugreport['13'] ?></option>
                      <option value="سرور"><?= $p_bugreport['14'] ?></option>
                  </select>
              </div>
			  </div>
        <div class="form-group">
          <label for="report" class="col-sm-2 control-label"><?= $p_bugreport['15'] ?></label>
          <div class="col-sm-5">
                <textarea class="form-control required" id="report" name="report" placeholder=" '<?= $p_bugreport['16'] ?>" rows="5"></textarea>
         </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label"><?= $p_bugreport['17'] ?></label>
          <div class="col-sm-5">
                <?= dsp_crypt(0,1); ?>
              </div>
             <div class="col-sm-5">
               <input type="text" class="form-control required" id="captcha" name="captcha" placeholder="<?= $p_bugreport['18'] ?>"
                     data-bv-message="<?= $p_bugreport['19'] ?>"
                     required data-bv-notempty-message="<?= $p_bugreport['20'] ?>"
                     pattern="^[0-9]+$" data-bv-regexp-message="<?= $p_bugreport['21'] ?>"
                     data-bv-stringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="6" data-bv-stringlength-message="<?= $p_bugreport['22'] ?>">
             </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label"></label>
            <div class="col-sm-5">
              <input type="hidden" name="info" />
              <button type="submit" class="btn btn-primary" id="send" name="send"><?= $p_bugreport['23'] ?></button>
            </div>
        </div>
     </form>
   </div>
<div class="content-title"><h3><?= $p_bugreport['24'] ?></h3></div>
<div class="news-info">
</div>
<div class="content-body">
   <div class="text">
      <div class="col-md-13">
        <table class="table">
          <thead>
            <tr>
              <th><?= $p_bugreport['25'] ?></th>
			  <th width="50%"><?= $p_bugreport['26'] ?></th>
              <th><?= $p_bugreport['27'] ?></th>
              <th><?= $p_bugreport['28'] ?></th>
            </tr>
          </thead>
          <tbody>
          <?php
          select_db($db_website);
          $query = mysql_query("SELECT * FROM bugreport");
          while($result = mysql_fetch_assoc($query)) { ?>
            <tr>
              
              <td><?= $result['mozo']; ?></td>
			  <td><a href="forum_thread/<?= $result['id'] ?>"><?= limit_words($result['report'], 5); ?></a></td>
              <td><?= $result['olaviat']; ?></td>
              <td><?= $result['noebug']; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>

   </div>
</div>
<div class="content-footer"></div>
</div>
