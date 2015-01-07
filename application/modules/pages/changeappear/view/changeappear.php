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
include ("application/languages/".$_SESSION['language']."/changeappear.php");
include "application/modules/pages/changeappear/control/changeappear.php";
?>
<div class="content-title"><h3><?= $p_appear['1'] ?></h3></div>
	<div class="news-info">
    	<div class="information">
          <font class="news-information"><?= $p_appear['31'] ?></font> :
          <?= number_format($vp); ?> <?= $p_appear['32'] ?> <?= number_format($dp); ?> <?= $p_appear['33'] ?>
          <font class="news-information"><?= $p_appear['34'] ?></font> :
          <?= number_format($_vp); ?> <?= $p_appear['35'] ?> <?= number_format($_dp); ?> <?= $p_appear['36'] ?>
          &nbsp;
        </div>
     </div>
<div class="content-body">
   <div class="text">
    <div class="messages">

    </div>
     <form class="form wzd-default " method="post" id="changeappear" action=""
                    data-bv-message="This value is not valid"
                    data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                    <?= (isset($message)) ? $message : ''; ?>
        <fieldset class="wizard-step form-inline">
            <legend class="wizard-label"><i class="icol-accept"></i> <?= $p_appear['4'] ?></legend>
            <h2><?= $p_appear['5'] ?></h2>
            <p><?= $p_appear['6'] ?></p>
        </fieldset>
        
        <fieldset class="wizard-step form-inline">
            <legend class="wizard-label"><i class="icol-accept"></i> <?= $p_appear['7'] ?></legend>
            <h2><?= $p_appear['8'] ?></h2>
            <p><?= $p_appear['9'] ?></p>
            <img src="<?= $website_address ?>application/images/service/changeappear/select_hero.jpg" class="img-border" />
        </fieldset>
        
        <fieldset class="wizard-step form-inline">
            <legend class="wizard-label"><i class="icol-user"></i> <?= $p_appear['10'] ?></legend>
            <h2><?= $p_appear['11'] ?></h2>
            <p><?= $p_appear['12'] ?></p>
            <img src="<?= $website_address ?>application/images/service/changeappear/login.jpg" class="img-border" />
        </fieldset>
        
        <fieldset class="wizard-step form-inline">
            <legend class="wizard-label"><i class="icol-user"></i> <?= $p_appear['13'] ?></legend>
            <h2><?= $p_appear['14'] ?></h2>
            <p><?= $p_appear['15'] ?></p>
            <img src="<?= $website_address ?>application/images/service/changeappear/customize.jpg" class="img-border" />
        </fieldset>
        
        <fieldset class="wizard-step form-inline">
            <legend class="wizard-label"><i class="icol-user"></i> <?= $p_appear['16'] ?></legend>
            <h2><?= $p_appear['17'] ?></h2>
            <p><?= $p_appear['18'] ?></p>
            <div class="form-group col-sm-12">
              <label class="col-sm-2 control-label"><?= $p_appear['39'] ?></label>
              <div class="col-sm-5">
                  <select class="form-control" id="method" name="method">
                      <option value="dp"><?= $p_appear['37'] ?></option>
                      <option value="vp"><?= $p_appear['38'] ?></option>
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
            <label class="col-sm-2 control-label"><?= $p_appear['19'] ?></label>
              <div class="col-sm-5">
                <input type="text" class="form-control required" id="captcha" name="captcha" placeholder="<?= $p_appear['20'] ?>"
                                     data-bv-message="<?= $p_appear['21'] ?>"
                                     required data-bv-notempty-message="<?= $p_appear['22'] ?>"
                                     pattern="^[0-9]+$" data-bv-regexp-message="<?= $p_appear['23'] ?>"
                                     data-bvstringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="6" data-bv-stringlength-message="<?= $p_appear['24'] ?>">
               <input type="hidden" name="changeappear" />
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