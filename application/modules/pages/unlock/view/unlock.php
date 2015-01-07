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
include ("application/languages/".$_SESSION['language']."/unlock.php");
include "application/modules/pages/unlock/control/unlock.php";
?>
<div class="content-title"><h3><?= $p_unlock['1'] ?></h3></div>
<div class="news-info"></div>
<div class="content-body">
   <div class="text">
	<?= (isset($message)) ? $message : ''; ?>
	<div class="messages"><p><?= $p_unlock['2'] ?></p></div>
	<form class="form-horizontal" method="post" id="unlock" action=""
					data-bv-message="This value is not valid"
					data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
					data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
					data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
          <div class="form-group">
             <label for="fname" class="col-sm-2 control-label"><?= $p_unlock['3'] ?></label>
             <div class="col-sm-5">
                  <input type="text" class="form-control" id="fname" name="fname"  placeholder="<?= $p_unlock['4'] ?>"
                         data-bv-message="<?= $p_unlock['5'] ?>"
                         required data-bv-notempty-message="<?= $p_unlock['6'] ?>">
            </div>
            <div class="col-sm-5">
                 <input type="text" class="form-control" id="lname" name="lname"  placeholder="<?= $p_unlock['7'] ?>"
                       data-bv-message="<?= $p_unlock['8'] ?>"
                       required data-bv-notempty-message="<?= $p_unlock['9'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?= $p_unlock['10'] ?></label>
            <div class="col-sm-5">
                <select class="form-control" name="question" id="question" data-bv-notempty data-bv-notempty-message="<?= $p_unlock['11'] ?>">
                    <option value="">-- <?= $p_unlock['12'] ?> --</option>
                    <option value="1"><?= $p_unlock['13'] ?></option>
                    <option value="2"><?= $p_unlock['14'] ?></option>
                    <option value="3"><?= $p_unlock['15'] ?></option>
                    <option value="4"><?= $p_unlock['16'] ?></option>
                    <option value="5"><?= $p_unlock['17'] ?></option>
                    <option value="6"><?= $p_unlock['18'] ?></option>
                    <option value="7"><?= $p_unlock['19'] ?></option>
                </select>
            </div>
            <div class="col-sm-5" >
                <input type="text" class="form-control required" id="answer" name="answer" placeholder="<?= $p_unlock['20'] ?>"
                   data-bv-message="<?= $p_unlock['21'] ?>"
                   required data-bv-notempty-message="<?= $p_unlock['22'] ?>"
                   pattern="^[a-z]+$" data-bv-regexp-message="<?= $p_unlock['23'] ?>">
           </div>
        </div>
		<div class="form-group">
		  <label class="col-sm-2 control-label"></label>
		  <div class="col-sm-5">
			  <?= dsp_crypt(0,1); ?>
		  </div>
		</div>
		<div class="form-group">
		<label class="col-sm-2 control-label"><?= $p_unlock['24'] ?></label>
		  <div class="col-sm-5">
			<input type="text" class="form-control required" id="captcha" name="captcha" placeholder="<?= $p_unlock['25'] ?>"
								 data-bv-message="<?= $p_unlock['26'] ?>"
								 required data-bv-notempty-message="<?= $p_unlock['27'] ?>"
								 pattern="^[0-9]+$" data-bv-regexp-message="<?= $p_unlock['28'] ?>"
								 data-bv-stringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="6" data-bv-stringlength-message="<?= $p_unlock['29'] ?>">
		  </div>
		</div>
		<div class="form-group">
		<label class="col-sm-2 control-label"></label>
		  <div class="col-sm-5">
			<input type="hidden" name="unlock" />
			<button type="submit" class="btn btn-primary" id="send" name="send"><?= $p_unlock['1'] ?></button>
		  </div>
		</div>
	  </form>
   </div>
</div>
<div class="content-footer"></div>
<div class="content-end">&nbsp;</div>
<script type="text/javascript">
  $(document).ready(function() {
	  $('#unlock').bootstrapValidator();
  });
</script>