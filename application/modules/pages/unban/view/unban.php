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
include "application/modules/pages/unban/control/unban.php";
include ("application/languages/".$_SESSION['language']."/unban.php");
?>
<div class="content-title"><h3><?= $p_unban['1'] ?></h3></div>
	<div class="news-info">
      <div class="information">
            <font class="news-information"><?= $p_unban['2'] ?></font> :
			  <?= number_format($amount); ?> <?= $p_unban['3'] ?> 
              <font class="news-information"><?= $p_unban['4'] ?></font> :
              <?= number_format($dp); ?> <?= $p_unban['5'] ?>
            &nbsp;
      </div>
     </div>
<div class="content-body">
   <div class="text">
    <?= (isset($message)) ? $message : ''; ?>
    <div class="messages">
      <p><?= $p_unban['6'] ?> <?= number_format($db); ?> <?= $p_unban['7'] ?> </p>
      <p><?= $p_unban['8'] ?></p>
      <p><span class="label label-danger"><?= $p_unban['9'] ?></span> <?= $p_unban['10'] ?>	</p>
      <p><span class="label label-warning"><?= $p_unban['11'] ?></span> <?= $p_unban['12'] ?><a href="bannedlist"><?= $p_unban['13'] ?></a> <?= $p_unban['14'] ?></p>
    </div>
    <form class="form-horizontal" method="post" id="unban" action=""
                    data-bv-message="This value is not valid"
                    data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
        <div class="form-group">
          <label class="col-sm-2 control-label"></label>
          <div class="col-sm-5">
              <?= dsp_crypt(0,1); ?>
          </div>
        </div>
        <div class="form-group">
        <label class="col-sm-2 control-label"><?= $p_unban['15'] ?></label>
          <div class="col-sm-5">
            <input type="text" class="form-control required" id="captcha" name="captcha" placeholder="<?= $p_unban['16'] ?>"
                                 data-bv-message="<?= $p_unban['17'] ?>"
                                 required data-bv-notempty-message="<?= $p_unban['18'] ?>"
                                 pattern="^[0-9]+$" data-bv-regexp-message="<?= $p_unban['19'] ?>"
                                 data-bv-stringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="6" data-bv-stringlength-message="<?= $p_unban['20'] ?>">
          </div>
        </div>
        <div class="form-group">
        <label class="col-sm-2 control-label"></label>
          <div class="col-sm-5">
            <input type="hidden" name="unban" />
            <button type="submit" class="btn btn-primary" id="send" name="send"><?= $p_unban['21'] ?></button>
          </div>
        </div>
      </form>
   </div>
</div>
<div class="content-footer"></div>
<div class="content-end">&nbsp;</div>
<script type="text/javascript">
  $(document).ready(function() {
      $('#unban').bootstrapValidator();
  });
</script>