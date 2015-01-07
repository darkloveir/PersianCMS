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
include "application/modules/pages/changemail/control/changemail.php";
include ("application/languages/".$_SESSION['language']."/changemail.php");
?>
<div class="content-title"><h3><?= $p_changemail['1'] ?></h3></div>
<div class="news-info"></div>
<div class="content-body">
   <div class="text">
	<?= (isset($message)) ? $message : ''; ?>
	<div class="messages"></div>
	<form class="form-horizontal" method="post" id="changemail" action=""
					data-bv-message="This value is not valid"
					data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
					data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
					data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
		<div class="form-group">
		  <label for="oldemail" class="col-sm-3 control-label"><?= $p_changemail['2'] ?></label>
		  <div class="col-sm-5">
			<input type="email" class="form-control required" id="oldemail" name="oldemail" placeholder="<?= $p_changemail['3'] ?>"
			data-bv-message="<?= $p_changemail['4'] ?>"
			required data-bv-notempty-message="<?= $p_changemail['5'] ?>">
		  </div>
		</div>
		<div class="form-group">
		  <label for="email" class="col-sm-3 control-label"><?= $p_changemail['6'] ?></label>
		  <div class="col-sm-5">
			   <input type="email" class="form-control" id="email" name="email" placeholder="<?= $p_changemail['7'] ?>"
					 data-bv-message="<?= $p_changemail['8'] ?>"
					 required data-bv-notempty-message="<?= $p_changemail['9'] ?>"
					 pattern='^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$' data-bv-regexp-message="<?= $p_changemail['10'] ?>" />                        
		  </div>
		</div>
		<div class="form-group">
		  <label for="confirmEmail" class="col-sm-3 control-label"><?= $p_changemail['11'] ?></label>
		  <div class="col-sm-5">
			  <input type="email" class="form-control" id="confirmEmail" name="confirmEmail" placeholder="<?= $p_changemail['12'] ?>"
					 required data-bv-notempty-message="<?= $p_changemail['13'] ?>"
					 data-bv-identical="true" data-bv-identical-field="email" data-bv-identical-message="<?= $p_changemail['14'] ?>" />
		  </div>
		</div>
		<div class="form-group">
			  <label for="question" class="col-sm-3 control-label"><?= $p_changemail['15'] ?></label>
			  <div class="col-sm-5">
				  <select class="form-control" name="question" id="question" data-bv-notempty data-bv-notempty-message="<?= $p_changemail['16'] ?>">
					  <option value=""><?= $p_changemail['17'] ?></option>
					  <option value="1"><?= $p_changemail['18'] ?></option>
					  <option value="2"><?= $p_changemail['19'] ?></option>
					  <option value="3"><?= $p_changemail['20'] ?></option>
					  <option value="4"><?= $p_changemail['21'] ?></option>
					  <option value="5"><?= $p_changemail['22'] ?></option>
					  <option value="6"><?= $p_changemail['23'] ?></option>
					  <option value="7"><?= $p_changemail['24'] ?></option>
				  </select>
			  </div>
		</div>
		<div class="form-group">
			  <label for="answer" class="col-sm-3 control-label"><?= $p_changemail['25'] ?></label>
			  <div class="col-sm-5" >
				  <input type="text" class="form-control required" id="answer" name="answer" placeholder="<?= $p_changemail['26'] ?>"
					 data-bv-message="<?= $p_changemail['27'] ?>"
					 required data-bv-notempty-message="<?= $p_changemail['28'] ?>"
					 pattern="^[a-zابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی]+$" data-bv-regexp-message="<?= $p_changemail['29'] ?>">
			 </div>
		</div>
		<div class="form-group">
		  <label class="col-sm-3 control-label"></label>
		  <div class="col-sm-5">
			  <?= dsp_crypt(0,1); ?>
		  </div>
		</div>
		<div class="form-group">
		<label class="col-sm-3 control-label"><?= $p_changemail['30'] ?></label>
		  <div class="col-sm-5">
			<input type="text" class="form-control required" id="captcha" name="captcha" placeholder="<?= $p_changemail['31'] ?>"
								 data-bv-message="<?= $p_changemail['32'] ?>"
								 required data-bv-notempty-message="<?= $p_changemail['33'] ?>"
								 pattern="^[0-9]+$" data-bv-regexp-message="<?= $p_changemail['34'] ?>"
								 data-bv-stringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="6" data-bv-stringlength-message="<?= $p_changemail['35'] ?>">
		  </div>
		</div>
		<div class="form-group">
		<label class="col-sm-3 control-label"></label>
		  <div class="col-sm-5">
			<input type="hidden" name="changemail" />
			<button type="submit" class="btn btn-primary" id="send" name="send"><?= $p_changemail['36'] ?></button>
		  </div>
		</div>
	  </form>
   </div>
</div>
<div class="content-footer"></div>
<div class="content-end">&nbsp;</div>
<script type="text/javascript">
  $(document).ready(function() {
	  $('#changemail').bootstrapValidator();
  });
</script>