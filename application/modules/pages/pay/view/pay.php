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
include "application/modules/pages/pay/control/pay.php";
?>
<div class="content-title"><h3>شارژ حساب کاربری</h3></div>
<div class="news-info"></div>
<div class="content-body">
   <div class="text">
   <?= (isset($message)) ? $message : ''; ?>
   <div class="messages"><p>لطفا مبلغ خود را انتخاب کنید.</p></div>
   <form class="form-horizontal" method="post" id="pay" action=""
                    data-bv-message="This value is not valid"
                    data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
        <div class="form-group">
          <label for="amount" class="col-sm-2 control-label">مقدار</label>
          <div class="col-sm-5">
             <select class="form-control" name="amount" id="amount" data-bv-notempty data-bv-notempty-message="انتخاب مبلغ ضروری میباشد.">
                      <option value="">-- مبلغ خود را انتخاب کنید --</option>
                      <option value="10000">10000 ريال</option>
                      <option value="20000">20000 ريال</option>
                      <option value="30000">30000 ريال</option>
                      <option value="50000">50000 ريال</option>
                      <option value="100000">100000 ريال</option>
                      <option value="200000">200000 ريال</option>
                      <option value="500000">500000 ريال</option>
                  </select>
         </div>
        </div>
        <div class="form-group">
          <label for="password" class="col-sm-2 control-label">توضیحات</label>
          <div class="col-sm-5">
            <textarea class="form-control required" id="text" name="text" placeholder="متن خود را وارد کنید..." rows="5"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">کد امنیتی</label>
          <div class="col-sm-5">
              <?= dsp_crypt(0,1); ?>
          </div>
        </div>
        <div class="form-group">
        <label class="col-sm-2 control-label"></label>
          <div class="col-sm-5">
            <input type="text" class="form-control required" id="captcha" name="captcha" placeholder="کد امنیتی بالا را وارد کنید"
                                 data-bv-message="این کد معتبر نیست !"
                                 required data-bv-notempty-message="کد امنیتی ضروری میباشد و نمیتواند خالی باشد !"
                                 pattern="^[0-9]+$" data-bv-regexp-message="کد امنیتی فقط شامل اعداد میباشد !"
                                 data-bv-stringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="6" data-bv-stringlength-message="کد امنیتی شامل 6 کاراکتر میباشد !">
          </div>
        </div>
        <div class="form-group">
        <label class="col-sm-2 control-label"></label>
          <div class="col-sm-5">
            <input type="hidden" name="pay" />
            <button type="submit" class="btn btn-primary" id="send" name="send">پرداخت</button>
          </div>
        </div>
      </form>
   </div>
</div>
<div class="content-footer"></div>
<div class="content-end">&nbsp;</div>
