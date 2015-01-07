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
include "application/modules/pages/panel/control/panel.php";
include "application/functions/pcalendar.class.php";

$p = new PersianCalendar();

?>
<div class="content-title"><h3>پنل کاربری</h3></div>
<div class="news-info"></div>
<div class="content-body">
   <div class="text">
      <div id="lobby-1">
              <h4><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> نام کاربری</h4>
              <p><?= $arrayedResult['username']; ?></p>
              <h4><span class="glyphicon glyphicon-user" aria-hidden="true"></span> مالک حساب</h4>
              <p><?= $arrayedResult2['fname']. " " .$arrayedResult2['lname']; ?></p>
              <h4><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> کشور</h4>
              <p><?= $arrayedResult2['country']; ?></p>
        </div>
        <div id="lobby-2">
              <h4><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> امتیاز رای</h4>
              <p><?= $arrayedResult2['vp']; ?> امتیاز</p>
              <h4><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> امتیاز ویژه</h4>
              <p><?= $arrayedResult2['dp']; ?> امتیاز</p>
              <h4><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> عضویت</h4>
              <p><?= ago(strtotime($arrayedResult['joindate'])); ?></p>
        </div>
        <div id="lobby-2">
              <h4><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> وضعیت اکانت</h4>
              <p><?= $status ?></p>
              <h4><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> آخرین ورود</h4>
              <p><?= ago(strtotime($arrayedResult['last_login'])); ?></p>
              <h4><span class="glyphicon glyphicon-star" aria-hidden="true"></span> رتبه حساب</h4>
              <p><?= $rank ?></p>
        </div>
        <div role="tabpanel">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="<?= $website_address ?>#account" aria-controls="account" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-user"></span> خدمات اکانت</a></li>
            <li role="presentation"><a href="<?= $website_address ?>#character" aria-controls="character" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-user"></span> خدمات هیرو</a></li>
            <li role="presentation"><a href="<?= $website_address ?>#gamecard" aria-controls="gamecard" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-usd"></span> خدمات گیم کارت</a></li>
            <li role="presentation"><a href="<?= $website_address ?>#other" aria-controls="other" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-wrench"></span> خدمات دیگر</a></li>
          </ul>
          
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="account">
                <div class="child-service">
                    <a href="<?= $website_address ?>changepassword" class="service-link">
                      <span class="service-icon">
                        <img src="<?= $website_address ?>application/images/icons/password.png" />
                      </span>
                      <span class="service-details">
                        <span class="service-title">تغییر رمز عبور </span>
                        <span class="service-desc">برای تغییر رمز عبور حساب خود میتوانید از اینجا آن را تغییر دهید.</span>
                      </span>
                    </a>
                </div>
                <div class="child-service">
                    <a href="<?= $website_address ?>changemail" class="service-link">
                      <span class="service-icon">
                        <img src="<?= $website_address ?>application/images/icons/email.png" />
                      </span>
                      <span class="service-details">
                        <span class="service-title">تغییر ایمیل</span>
                        <span class="service-desc">از این طریق میتوانید ایمیل خود را ویرایش کنید.(ایمیل اصلی که هنگام ساخت اکانت استفاده کرده اید غیر قابل ویرایش میباشد).</span>
                      </span>
                    </a>
                </div>
                <div class="child-service">
                    <a href="<?= $website_address ?>premium" class="service-link">
                      <span class="service-icon">
                        <img src="<?= $website_address ?>application/images/icons/premium.png" />
                      </span>
                      <span class="service-details">
                        <span class="service-title">اکانت ویژه</span>
                        <span class="service-desc">با استفاده از این سرویس شما میتوانید با ریت بالاتری بازی کنید.</span>
                      </span>
                    </a>
                </div>
                <div class="child-service">
                    <a href="<?= $website_address ?>unban" class="service-link">
                      <span class="service-icon">
                        <img src="<?= $website_address ?>application/images/icons/banned.png" />
                      </span>
                      <span class="service-details">
                        <span class="service-title">پرداخت جریمه</span>
                        <span class="service-desc">اکانت شما مسدود شده است و میخواهید آن را آزاد کنید از اینجا میتوانید.</span>
                      </span>
                    </a>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="character">
                <div class="child-service">
                    <a href="<?= $website_address ?>unstuck" class="service-link">
                      <span class="service-icon">
                        <img src="<?= $website_address ?>application/images/icons/unstuck.png" />
                      </span>
                      <span class="service-details">
                        <span class="service-title">نجات هیرو </span>
                        <span class="service-desc">از این روش میتوانید هیرو خود را از هر باگی نجات دهید..</span>
                      </span>
                    </a>
                </div>
                <div class="child-service">
                    <a href="<?= $website_address ?>rename" class="service-link">
                      <span class="service-icon">
                        <img src="<?= $website_address ?>application/images/icons/rename.png" />
                      </span>
                      <span class="service-details">
                        <span class="service-title">ویرایش نام</span>
                        <span class="service-desc">شاید شما هیرویی داشته باشید که از نام راضی نباشید و میخواهید آن را تغییر دهید. از این روش میتوانید.</span>
                      </span>
                    </a>
                </div>
                <div class="child-service">
                    <a href="<?= $website_address ?>changerace" class="service-link">
                      <span class="service-icon">
                        <img src="<?= $website_address ?>application/images/icons/changerace.png" />
                      </span>
                      <span class="service-details">
                        <span class="service-title">ویرایش نسل هیرو</span>
                        <span class="service-desc">شما میتوانید نسل هیرو خود را در نژاد خود تغییر دهید یعنی اگر نژاد شما Alliance باشد, فقط میتوانید نسل هایی که از نژاد Alliance هستند را انتخاب کنید. مثلا : از Human به Night Elf.</span>
                      </span>
                    </a>
                </div>
                <div class="child-service">
                    <a href="<?= $website_address ?>changefaction" class="service-link">
                      <span class="service-icon">
                        <img src="<?= $website_address ?>application/images/icons/changefaction.png" />
                      </span>
                      <span class="service-details">
                        <span class="service-title">ویرایش نژاد هیرو</span>
                        <span class="service-desc">شما میتوانید نژاد هیرو خود را از این روش تغییر دهید. مانند: از Alliance به Horde. و از Horde به Alliance.</span>
                      </span>
                    </a>
                </div>
                <div class="child-service">
                    <a href="<?= $website_address ?>changeappear" class="service-link">
                      <span class="service-icon">
                        <img src="<?= $website_address ?>application/images/icons/changeappear.png" />
                      </span>
                      <span class="service-details">
                        <span class="service-title">تغییر شکل هیرو</span>
                        <span class="service-desc">شما از این طریق میتوانید شکل و جنسیت هیرو خود را تغییر دهید.</span>
                      </span>
                    </a>
                </div>
                <div class="child-service">
                    <a href="<?= $website_address ?>teleport" class="service-link">
                      <span class="service-icon">
                        <img src="<?= $website_address ?>application/images/icons/teleport.png" />
                      </span>
                      <span class="service-details">
                        <span class="service-title">تله پورت هیرو</span>
                        <span class="service-desc">انتقال هیرو شما به شهر های بازی.</span>
                      </span>
                    </a>
                </div>
                <div class="child-service">
                    <a href="<?= $website_address ?>transfer" class="service-link">
                      <span class="service-icon">
                        <img src="<?= $website_address ?>application/images/icons/transfer.png" />
                      </span>
                      <span class="service-details">
                        <span class="service-title">انتقال هیرو</span>
                        <span class="service-desc">انتقال هیرو از این اکانت به اکانت دیگر.</span>
                      </span>
                    </a>
                </div>
                <div class="child-service">
                    <a href="<?= $website_address ?>gold" class="service-link">
                      <span class="service-icon">
                        <img src="<?= $website_address ?>application/images/icons/gift.png" />
                      </span>
                      <span class="service-details">
                        <span class="service-title">خرید طلا</span>
                        <span class="service-desc">خرید طلا یا همان گلد برای هیرو خود.</span>
                      </span>
                    </a>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="gamecard">
            	<div class="child-service">
                    <a href="<?= $website_address ?>pay" class="service-link">
                      <span class="service-icon">
                        <img src="<?= $website_address ?>application/images/icons/pay.png" />
                      </span>
                      <span class="service-details">
                        <span class="service-title">شارژ حساب کاربری</span>
                        <span class="service-desc">شارژ حساب کاربری از روش درگاه Payline.</span>
                      </span>
                    </a>
                </div>
                <div class="child-service">
                    <a href="<?= $website_address ?>transcost" class="service-link">
                      <span class="service-icon">
                        <img src="<?= $website_address ?>application/images/icons/transcost.png" />
                      </span>
                      <span class="service-details">
                        <span class="service-title">انتقال شارژ</span>
                        <span class="service-desc">انتقال شارژ اکانت خود به اکانت هایی دیگر.</span>
                      </span>
                    </a>
                </div>
                <div class="child-service">
                    <a href="<?= $website_address ?>cost" class="service-link">
                      <span class="service-icon">
                        <img src="<?= $website_address ?>application/images/icons/cost.png" />
                      </span>
                      <span class="service-details">
                        <span class="service-title">تراکنش ها</span>
                        <span class="service-desc">نمایش تراکنش های موفق و ناموفق.</span>
                      </span>
                    </a>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="other">
            	<div class="child-service">
                    <a href="<?= $website_address ?>changetheme" class="service-link">
                      <span class="service-icon">
                        <img src="<?= $website_address ?>application/images/icons/theme.png" />
                      </span>
                      <span class="service-details">
                        <span class="service-title">ویرایش پوسته</span>
                        <span class="service-desc">از اینجا میتوانید یک پوسته انتخاب کنید هر وقت با این حساب وارد سایت میشوید پوسته به تغییر میکند.</span>
                      </span>
                    </a>
                </div></div>
          </div>
       </div>
   </div>
</div>
<div class="content-footer"></div>
<div class="content-end">&nbsp;</div>
