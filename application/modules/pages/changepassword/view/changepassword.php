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
include "application/modules/pages/changepassword/control/changepassword.php";
include ("application/languages/".$_SESSION['language']."/changepassword.php");
?>
<div class="content-title"><h3><?= $p_changepassword['1'] ?></h3></div>
<div class="news-info"></div>
<div class="content-body">
   <div class="text">
    <?= (isset($message)) ? $message : ''; ?>
    <div class="messages"><p><?= $p_changepassword['2'] ?></p></div>
    <form class="form-horizontal" method="post" id="changepassword" action=""
                    data-bv-message="This value is not valid"
                    data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
        <div class="form-group">
          <label for="oldpassword" class="col-sm-3 control-label"><?= $p_changepassword['3'] ?></label>
          <div class="col-sm-5">
            <input type="password" class="form-control required" id="oldpassword" name="oldpassword" placeholder="<?= $p_changepassword['4'] ?>"
            data-bv-message="<?= $p_changepassword['5'] ?>"
            required data-bv-notempty-message="<?= $p_changepassword['6'] ?>">
         </div>
        </div>
        <div class="form-group">
          <label for="password" class="col-sm-3 control-label"><?= $p_changepassword['7'] ?></label>
          <div class="col-sm-5">
            <input type="password" class="form-control required" id="password" name="password" placeholder="<?= $p_changepassword['8'] ?>"
                                 data-bv-message="<?= $p_changepassword['9'] ?>"
                                 required data-bv-notempty-message="<?= $p_changepassword['10'] ?>"
                                 pattern="^[a-zA-Z0-9!@#$%^&*()_+?.]+$" data-bv-regexp-message="<?= $p_changepassword['11'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="confirmPassword" class="col-sm-3 control-label"><?= $p_changepassword['12'] ?></label>
          <div class="col-sm-5">
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="<?= $p_changepassword['13'] ?>"
                     required data-bv-notempty-message="<?= $p_changepassword['14'] ?>"
                     data-bv-identical="true" data-bv-identical-field="password" data-bv-identical-message="<?= $p_changepassword['15'] ?>" />
          </div>
        </div>
        <div class="form-group">
          <label for="reg_mail" class="col-sm-3 control-label"><?= $p_changepassword['16'] ?></label>
          <div class="col-sm-5">
            <input type="email" class="form-control" id="reg_mail" name="reg_mail" placeholder="<?= $p_changepassword['17'] ?>"
                     required data-bv-notempty-message="<?= $p_changepassword['18'] ?>"
                     data-bv-identical="true" data-bv-identical-field="email" data-bv-identical-message="<?= $p_changepassword['19'] ?>" />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label"></label>
          <div class="col-sm-5">
              <?= dsp_crypt(0,1); ?>
          </div>
        </div>
        <div class="form-group">
        <label class="col-sm-3 control-label"><?= $p_changepassword['20'] ?></label>
          <div class="col-sm-5">
            <input type="text" class="form-control required" id="captcha" name="captcha" placeholder="<?= $p_changepassword['21'] ?>"
                                 data-bv-message="<?= $p_changepassword['22'] ?>"
                                 required data-bv-notempty-message="<?= $p_changepassword['23'] ?>"
                                 pattern="^[0-9]+$" data-bv-regexp-message="<?= $p_changepassword['24'] ?>"
                                 data-bv-stringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="6" data-bv-stringlength-message="<?= $p_changepassword['25'] ?>">
          </div>
        </div>
        <div class="form-group">
        <label class="col-sm-3 control-label"></label>
          <div class="col-sm-5">
            <input type="hidden" name="changepassword" />
            <button type="submit" class="btn btn-primary" id="send" name="send"><?= $p_changepassword['26'] ?></button>
          </div>
        </div>
      </form>
   </div>
</div>
<div class="content-footer"></div>
<div class="content-end">&nbsp;</div>
<script type="text/javascript">
  $(document).ready(function() {
      $('#changepassword').bootstrapValidator();
  });
</script>