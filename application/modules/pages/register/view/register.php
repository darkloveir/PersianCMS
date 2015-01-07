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
include ("application/languages/".$_SESSION['language']."/register.php");
include "application/modules/pages/register/control/register.php";
?>
<div class="content-title"><h3><?= $p_register['title'] ?></h3></div>
<div class="news-info"></div>
<div class="content-body">
   <div class="text">
   	<?= (isset($message)) ? $message : ''; ?>
    <div class="messages"></div>
    <form class="form-horizontal" method="post" id="register">
        <div class="form-group">
          <label for="username" class="col-sm-2 control-label"><?= $p_register['user'] ?></label>
          <div class="col-sm-5">
               <input type="text" class="form-control" id="username" name="username"  placeholder="<?= $p_register['user2'] ?>" required
                     pattern="^[a-zA-Z0-9_\.]+$" data-bv-regexp-message="<?= $p_register['erroruser'] ?>">
          </div>
          <div class="col-sm-5">
            <input type="text" class="form-control required" id="recruiter" name="recruiter" placeholder="<?= $p_register['recruiter'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="col-sm-2 control-label"><?= $p_register['pass'] ?></label>
          <div class="col-sm-5">
          		<input type="password" class="form-control" id="password" name="password" placeholder="<?= $p_register['pass2'] ?>"
                     data-bv-message="<?= $p_register['errorpass'] ?>"
                     required data-bv-notempty-message="<?= $p_register['errorpass2'] ?>"
                     pattern="^[a-zA-Z0-9!@#$%^&*()_+?.]+$" data-bv-regexp-message="<?= $p_register['errorpass3'] ?>"
                     data-bv-stringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="16" data-bv-stringlength-message="<?= $p_register['errorpass6'] ?>"/>
          </div>
          <div class="col-sm-5">
              <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="<?= $p_register['pass3'] ?>"
                     required data-bv-notempty-message="<?= $p_register['errorpass4'] ?>"
                     data-bv-identical="true" data-bv-identical-field="password" data-bv-identical-message="<?= $p_register['errorpass5'] ?>" />
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-2 control-label"><?= $p_register['email'] ?></label>
          <div class="col-sm-5">
               <input type="email" class="form-control" id="email" name="email" placeholder="<?= $p_register['erroremail'] ?>"
                     required data-bv-notempty-message="<?= $p_register['erroremail2'] ?>"
                     pattern='^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$' data-bv-regexp-message="<?= $p_register['erroremail5'] ?>" />
          </div>
          <div class="col-sm-5">
              <input type="email" class="form-control" id="confirmEmail" name="confirmEmail" placeholder="<?= $p_register['erroremail3'] ?>"
                     required data-bv-notempty-message="<?= $p_register['erroremail2'] ?>"
                     data-bv-identical="true" data-bv-identical-field="email" data-bv-identical-message="<?= $p_register['erroremail4'] ?>" />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label"><label class="col-sm-2 control-label"><?= $p_register['Securitycode'] ?></label></label>
          <div class="col-sm-5">
                <?= dsp_crypt(0,1); ?>
              </div>
             <div class="col-sm-5">
               <input type="text" class="form-control required" id="captcha" name="captcha" placeholder="<?= $p_register['Securitycode1'] ?>"
                     data-bv-message="<?= $p_register['errorcode'] ?>"
                     required data-bv-notempty-message="<?= $p_register['errorcode1'] ?>"
                     pattern="^[0-9]+$" data-bv-regexp-message="<?= $p_register['errorcode2'] ?>"
                     data-bv-stringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="6" data-bv-stringlength-message="<?= $p_register['errorcode3'] ?>">
             </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label"></label>
            <div class="col-sm-5">
              <input type="hidden" name="register" />
              <button type="submit" class="btn btn-primary" id="send" name="send"><?= $p_register['create'] ?></button>
            </div>
        </div>
     </form>
   </div>
</div>
<div class="content-footer"></div>
<div class="content-end">&nbsp;</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#register')
	.bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                message: '<?= $p_register['erroruser2'] ?>',
                validators: {
                    notEmpty: {
                        message: '<?= $p_register['erroruser3'] ?>'
                    },
                    remote: {
                        type: 'POST',
                        url: 'application/modules/pages/register/control/remote.php',
                        message: '<?= $p_register['erroruser4'] ?>',
                        delay: 1000,
						data: {
                            type: 'username'
                        }
                    }
                }
            },
			recruiter: {
                message: '<?= $p_register['erroruser5'] ?>',
                validators: {
                    remote: {
                        type: 'POST',
                        url: 'application/modules/pages/register/control/remote.php',
                        message: '<?= $p_register['erroruser6'] ?>',
                        delay: 1000,
						data: {
                            type: 'recruiter'
                        }
                    }
                }
            },
            email: {
                validators: {
                    remote: {
                        type: 'POST',
                        url: 'application/modules/pages/register/control/remote.php',
                        message: '<?= $p_register['erroremail6'] ?>',
                        delay: 2000,
						data: {
                            type: 'email'
                        }
                    }
                }
            }
        }
    });
});
</script>