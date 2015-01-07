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
$cryptinstall="application/plugins/crypt/cryptographp.fct.php";
include_once $cryptinstall;
?>
  <div class="sidebar-module">
    <div class="sidebar-title">
      <?= $p_login['1'] ?>
    </div>
    <div class="sidebar-body">
    <form class="form-horizontal" method="post" id="login" action="login">
      <div class="form-group">
        <label for="username" class="col-sm-4 control-label"><?= $p_login['3'] ?></label>
        <div class="col-sm-7">
          <input type="text" class="form-control required" id="username" name="username" placeholder="<?= $p_login['6'] ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="password" class="col-sm-4 control-label"><?= $p_login['4'] ?></label>
        <div class="col-sm-7">
          <input type="password" class="form-control required" id="password" name="password" placeholder="<?= $p_login['9'] ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 control-label"></label>
        <div class="col-sm-7">
            <?= dsp_crypt(0,1); ?>
        </div>
      </div>
      <div class="form-group">
      <label for="captcha" class="col-sm-4 control-label"><?= $p_login['5'] ?></label>
        <div class="col-sm-7">
          <input type="text" class="form-control required" id="captcha" name="captcha" placeholder="<?= $p_login['12'] ?>">
        </div>
      </div>
      <div class="form-group">
      <label class="col-sm-4 control-label"></label>
        <div class="col-sm-7">
          <input type="hidden" name="login" />
          <button type="submit" class="btn btn-primary" id="send" name="send"><?= $p_login['1'] ?></button>
        </div>
      </div>
    </form>
<script type="text/javascript">
$(document).ready(function() {
$('#login').bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
        fields: {
            username: {
                message: '<?= $p_login['7'] ?>',
                validators: {
                    notEmpty: {
                        message: '<?= $p_login['8'] ?>'
                    },
                }
            },
            captcha: {
                message: '<?= $p_login['13'] ?>',
                validators: {
                    notEmpty: {
                        message: '<?= $p_login['14'] ?>'
                    },
                    stringLength: {
                        min: 6,
                        max: 6,
                        message: '<?= $p_login['16'] ?>'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: '<?= $p_login['15'] ?>'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: '<?= $p_login['emptypass'] ?>'
                    }
                }
            }
        }
});
});
</script>
    </div>
  </div>