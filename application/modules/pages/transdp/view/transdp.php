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
include "application/modules/pages/transdp/control/transdp.php";
?>
<div class="content-title"><h3>انتقال شارژ</h3></div>
<div class="news-info"></div>
<div class="content-body">
   <div class="text">
   <?= (isset($message)) ? $message : ''; ?>
   <div class="messages"><p>لطفا نام کاربری مقصد را که میخواهید به آن مقدار شارژ مورد نظر خود را انتقال دهید را وارد کنید.</p></div>
   <form class="form-horizontal" method="post" id="transcharge" action=""
                    data-bv-message="This value is not valid"
                    data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
         <div class="form-group">
          <label for="username" class="col-sm-3 control-label">نام کاربری مقصد</label>
          <div class="col-sm-5">
            <input type="text" class="form-control required" id="username" name="username" placeholder="نام کاربری خود را وراد کنید"
                                 data-bv-message="نام کاربری مقصد مورد نظر"
                                 required data-bv-notempty-message="نام کاربری ضروری میباشد و نمیتواند خالی باشد !">
         </div>
        </div>
        <div class="form-group">
          <label for="amount" class="col-sm-3 control-label">مقدار</label>
          <div class="col-sm-5">
             <select class="form-control" name="amount" id="amount" data-bv-notempty data-bv-notempty-message="انتخاب مبلغ ضروری میباشد.">
                      <option value="">-- مبلغ مورد نظر --</option>
                      <option value="1000">1000 ریال</option>
                      <option value="2000">2000 ریال</option>
                      <option value="3000">3000 ریال</option>
                      <option value="5000">5000 ریال</option>
                      <option value="10000">10000 ریال</option>
                      <option value="20000">20000 ریال</option>
                      <option value="50000">50000 ریال</option>
                      <option value="100000">100000 ریال</option>
                  </select>
         </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">کد ملی</label>
          <div class="col-sm-5">
               <input type="text" class="form-control required" id="mellicode" name="mellicode" placeholder="کد ملی را بدون خط فاصله وارد کنید."
                 data-bv-message="این کد معتبر نیست !"
                 required data-bv-notempty-message="کد ملی ضروری میباشد و نمیتواند خالی باشد !"
                 pattern="^[1234567890]+$" data-bv-regexp-message="کد وارد شده اشتباه است !"
                 data-bv-stringlength="true" data-bv-stringlength-min="9" data-bv-stringlength-max="11" data-bv-stringlength-message="تعداد رقم ها اشتباه است !">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label"></label>
          <div class="col-sm-5">
              <?= dsp_crypt(0,1); ?>
          </div>
        </div>
        <div class="form-group">
        <label class="col-sm-3 control-label">کد امنیتی</label>
          <div class="col-sm-5">
            <input type="text" class="form-control required" id="captcha" name="captcha" placeholder="کد امنیتی بالا را وارد کنید"
                                 data-bv-message="این کد معتبر نیست !"
                                 required data-bv-notempty-message="کد امنیتی ضروری میباشد و نمیتواند خالی باشد !"
                                 pattern="^[0-9]+$" data-bv-regexp-message="کد امنیتی فقط شامل اعداد میباشد !"
                                 data-bv-stringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="6" data-bv-stringlength-message="کد امنیتی شامل 6 کاراکتر میباشد !">
          </div>
        </div>
        
        <div class="form-group">
        <label class="col-sm-3 control-label"></label>
          <div class="col-sm-5">
            <input type="hidden" name="transcharge" />
            <button type="submit" class="btn btn-primary" id="send" name="send">انتقال شارژ</button>
          </div>
        </div>
      </form>
   </div>
</div>
<div class="content-footer"></div>
<div class="content-end">&nbsp;</div>
