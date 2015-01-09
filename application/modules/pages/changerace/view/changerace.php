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
include "application/modules/pages/changerace/control/changerace.php";
include ("application/languages/".$_SESSION['language']."/changerace.php");
?>
<div class="content-title"><h3><?= $p_changerace['1'] ?></h3></div>
	<div class="news-info">
      <div class="information">
          <font class="news-information"><?= $p_changerace['31'] ?></font> :
          <?= number_format($vp); ?> <?= $p_changerace['32'] ?> <?= number_format($dp); ?> <?= $p_changerace['33'] ?>
          <font class="news-information"><?= $p_changerace['34'] ?></font> :
          <?= number_format($_vp); ?> <?= $p_changerace['35'] ?> <?= number_format($_dp); ?> <?= $p_changerace['36'] ?>
          &nbsp;
      </div>
     </div>
<div class="content-body">
   <div class="text">
    <div class="messages">

    </div>
     <form class="form wzd-default " method="post" id="changerace" action=""
                    data-bv-message="This value is not valid"
                    data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                    <?= (isset($message)) ? $message : ''; ?>
        <fieldset class="wizard-step form-inline">
            <legend class="wizard-label"><i class="icol-accept"></i> <?= $p_changerace['6'] ?></legend>
            <h2><?= $p_changerace['7'] ?></h2>
            <p><?= $p_changerace['8'] ?></p>
        </fieldset>
        
        <fieldset class="wizard-step form-inline">
            <legend class="wizard-label"><i class="icol-accept"></i> <?= $p_changerace['9'] ?></legend>
            <h2><?= $p_changerace['10'] ?></h2>
            <p><?= $p_changerace['11'] ?></p>
            <img src="<?= $website_address ?>application/images/service/changerace/select_hero.jpg" class="img-border" />
        </fieldset>
        
        <fieldset class="wizard-step form-inline">
            <legend class="wizard-label"><i class="icol-user"></i> <?= $p_changerace['12'] ?></legend>
            <h2><?= $p_changerace['13'] ?></h2>
            <p><?= $p_changerace['14'] ?></p>
            <img src="<?= $website_address ?>application/images/service/changerace/login.jpg" class="img-border" />
        </fieldset>
        
        <fieldset class="wizard-step form-inline">
            <legend class="wizard-label"><i class="icol-user"></i> <?= $p_changerace['15'] ?></legend>
            <h2><?= $p_changerace['16'] ?></h2>
            <p><?= $p_changerace['17'] ?></p>
            <img src="<?= $website_address ?>application/images/service/changerace/customize.jpg" class="img-border" />
        </fieldset>
        
        <fieldset class="wizard-step form-inline">
            <legend class="wizard-label"><i class="icol-user"></i> <?= $p_changerace['18'] ?></legend>
            <h2><?= $p_changerace['19'] ?></h2>
            <p><?= $p_changerace['20'] ?></p>
            <div class="form-group col-sm-12">
              <label class="col-sm-2 control-label"><?= $p_changerace['39'] ?></label>
              <div class="col-sm-5">
                  <select class="form-control" id="method" name="method">
                      <option value="dp"><?= $p_changerace['37'] ?></option>
                      <option value="vp"><?= $p_changerace['38'] ?></option>
                  </select>
              </div>
            </div>
            <div class="form-group col-sm-12">
              <label class="col-sm-2 control-label"></label>
              <div class="col-sm-5">
                  <?= dsp_crypt(0,1); ?>
              </div>
            </div>
            <div class="form-group col-sm-12">
            <label class="col-sm-2 control-label"><?= $p_changerace['21'] ?></label>
              <div class="col-sm-5">
                <input type="text" class="form-control required" id="captcha" name="captcha" placeholder="<?= $p_changerace['22'] ?>"
                                     data-bv-message="<?= $p_changerace['23'] ?>"
                                     required data-bv-notempty-message="<?= $p_changerace['24'] ?>"
                                     pattern="^[0-9]+$" data-bv-regexp-message="<?= $p_changerace['25'] ?>"
                                     data-bvstringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="6" data-bv-stringlength-message="<?= $p_changerace['26'] ?>">
               <input type="hidden" name="changerace" />
              </div>
            </div>
        </fieldset>
    </form>
   </div>
</div>
<div class="content-footer"></div>
<div class="content-end">&nbsp;</div>
<script type="text/javascript">
  $(document).ready(function() {
      $('#send').bootstrapValidator();
  });
</script>