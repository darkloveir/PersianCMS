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
include ("application/languages/".$_SESSION['language']."/login.php");
include "application/modules/pages/login/control/login.php";

?>
<div class="content-title"><h3><?= $p_login['1'] ?></h3></div>
<div class="news-info"></div>
<div class="content-body">
   <div class="text">
	<?= (isset($message)) ? $message : ''; ?>
	<div class="messages"><p><?= $p_login['2'] ?></p></div>
	<form class="form-horizontal" method="post" id="login" action=""
					data-bv-message="This value is not valid"
					data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
					data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
					data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
		<div class="form-group">
		  <label for="username" class="col-sm-2 control-label"><?= $p_login['3'] ?></label>
		  <div class="col-sm-5">
			<input type="text" class="form-control required" id="username" name="username" placeholder="<?= $p_login['6'] ?>"
								 data-bv-message="<?= $p_login['7'] ?>"
								 required data-bv-notempty-message="<?= $p_login['8'] ?>">
		 </div>
		</div>
		<div class="form-group">
		  <label for="password" class="col-sm-2 control-label"><?= $p_login['4'] ?></label>
		  <div class="col-sm-5">
			<input type="password" class="form-control required" id="password" name="password" placeholder="<?= $p_login['9'] ?>"
								 data-bv-message="<?= $p_login['10'] ?>"
								 required data-bv-notempty-message="<?= $p_login['11'] ?>">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-sm-2 control-label"></label>
		  <div class="col-sm-5">
			  <?= dsp_crypt(0,1); ?>
		  </div>
		</div>
		<div class="form-group">
		<label class="col-sm-2 control-label"><?= $p_login['5'] ?></label>
		  <div class="col-sm-5">
			<input type="text" class="form-control required" id="captcha" name="captcha" placeholder="<?= $p_login['12'] ?>"
								 data-bv-message="<?= $p_login['13'] ?>"
								 required data-bv-notempty-message="<?= $p_login['14'] ?>"
								 pattern="^[0-9]+$" data-bv-regexp-message="<?= $p_login['15'] ?>"
								 data-bv-stringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="6" data-bv-stringlength-message="<?= $p_login['16'] ?>">
		  </div>
		</div>
		<div class="form-group">
		<label class="col-sm-2 control-label"></label>
		  <div class="col-sm-5">
			<input type="hidden" name="login" />
			<button type="submit" class="btn btn-primary" id="send" name="send"><?= $p_login['1'] ?></button>
		  </div>
		</div>
	  </form>
   </div>
</div>
<div class="content-footer"></div>
<div class="content-end">&nbsp;</div>
<script type="text/javascript">
  $(document).ready(function() {
	  $('#login').bootstrapValidator();
  });
</script>