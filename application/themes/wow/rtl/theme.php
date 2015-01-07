<!doctype html>
<html lang="fa">
  <head>
    <!-- Viewport Metatag -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="shortcut icon" href="<?= $website_address; ?>application/images/icon.png" type="image/x-icon"/>
        
    <!-- Plugin Stylesheets first to ease overrides -->
    <link rel="stylesheet" href="<?= $website_address; ?>application/plugins/bootstrap/css_rtl/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= $website_address; ?>application/plugins/validator/dist/css/bootstrapValidator.css"/>
    <link rel="stylesheet" href="<?= $website_address; ?>application/plugins/wizard/wizard.css"/>
    
    <!-- Required Stylesheets -->
    <link rel="stylesheet" href="<?= $website_address; ?>application/themes/<?= $website_theme; ?>/<?= $dir; ?>/styles.css"/>
    
    <!-- JavaScript -->
    <script src="<?= $website_address; ?>application/themes/<?= $website_theme; ?>/<?= $dir; ?>/js/jquery.js" type="text/javascript"></script>
    <script src="<?= $website_address; ?>application/themes/<?= $website_theme; ?>/<?= $dir; ?>/js/jquery.carouFredSel-6.2.0-packed.js" type="text/javascript"></script>
    
	<!-- Plugin Scripts -->
	<script src="<?= $website_address; ?>application/plugins/bootstrap/js/bootstrap.js" type="text/javascript"></script>
	<?php if(isset($_GET['page'])) { ?><script src="application/plugins/validator/vendor/jquery/jquery.min.js" type="text/javascript" ></script><?php } ?>
    <script src="<?= $website_address; ?>application/plugins/validator/dist/js/bootstrapValidator.js" type="text/javascript"></script>
	<script src="<?= $website_address; ?>application/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="<?= $website_address; ?>application/plugins/wizard/wizard.min.js"></script>
    <!-- Required JavaScript -->
	<script src="<?= $website_address; ?>application/themes/<?= $website_theme; ?>/<?= $dir; ?>/js/script.js" type="text/javascript"></script>
    <title><?= $website_title; ?></title>

  </head>
  <body>
	<!-- Wrapper -->
    <div id="wrapper">
          <!-- Service -->
          <div id="service">
            <div class="home"><a href=""><span id="homebutton"></span></a></div>
            <div class="welcome"><span id="msg"><?php if($_SESSION['username'] == "") { echo"مهمان گرامی خوش امدید,"; } else { echo "بازیکن عزیز, ".$_SESSION['username']." خوش آمدید."; } ?></span></div>
            <div class="account"><a href="<?php if($_SESSION['username'] == "") { echo"login"; } else { echo "logout"; } ?>"><span id="logout" class="glyphicon glyphicon-off"></span></a></div>
            <div id="account_nav" style="display: none;">
              <?php if($_GET['page'] != "login" && $_SESSION['username'] == "") {  sidebar("login", "ورود به سیستم", 1); }?>
            </div>
            
            <script type="text/javascript">
            $("#service").bind("mouseenter", function(e) { $("#account_nav").show(); });
            $("#account_nav").bind("mouseleave", function(e) {
                e = e || window.event;
                var rel = (e.relatedTarget) ? e.relatedTarget : e.toElement;
                while (rel.tagName != "BODY") {
                    if (rel.id == this.id) {
                        e.preventDefault();
                    }
                    rel = rel.parentNode;
                }
                $(this).hide();
            });
            </script>
          </div>
		  <!-- Header -->
          <div id="header">
			<!-- Search -->
            <div class="search">
              <form method="get">
                <div>
                  <div class="ui-typeahead-ghost">
					<input type="hidden" name="page" value="search" />
                    <input type="text" class="form-control" name="search" id="search-field" maxlength="200" tabindex="40" alt="جستو جوی..." placeholder="جستوجو ..." />
                    <input type="submit" class="search-button" value="" tabindex="41" />
                  </div>
				  <script>
				  $(document).ready(function() {
					  $(".search-button").bind("mouseenter", function(e) { $("#search-field").slideToggle(100); });
					  $("#search-field").bind("mouseleave", function(e) {
						  e = e || window.event;
						  var rel = (e.relatedTarget) ? e.relatedTarget : e.toElement;
						  while (rel.tagName != "BODY") {
							  if (rel.id == this.id) {
								  e.preventDefault();
							  }
							  rel = rel.parentNode;
						  }
						  $(this).slideToggle(100);
					  });
				  });
				  </script>
                </div>
              </form>
            </div>
			<!-- Logo -->
            <div id="logo">
            	<img src="application/themes/<?= $website_theme; ?>/<?= $dir; ?>/images/logo.png" />
            </div>
			<!-- Navigation Menu -->
            <div id="navigation">
              <?php select_db($db_website); navigation(0, 1, 0); ?>
            </div>
			
			<!-- Create Account Button -->
			<?php if($_SESSION['username'] == "") { ?><button type="button" id="createaccount" data-toggle="modal" data-target="#registerModal"></button> <?php } ?>
			
			<!-- User Panel Button -->
			<?php if($_SESSION['username'] != "") { ?><a href="panel" id="userpanel"></a><?php } ?>
          </div>
		  <!-- Main Content -->
          <div class="content">
          <?php if(get_page() == "") slideshow(); ?>
            <div class="sidebar-content">
               <div class="sidebar-content-inner">
                  <div class="featured-news-container">
                    <?php if(get_page() == "") featured_news(); ?>
                  </div>
                  <div class="blog-articles">
                    <?php select_db($db_website); show_page(); ?>
                  </div>
                </div>
            </div>
			<!-- Right Sidebar -->
            <div class="sidebar-right">
              <?php if($_SESSION['username'] != "" && get_page() != "") { sidebar("characters","مدیریت هیرو ها"); } ?>
			  <?php sidebar("menu","دسته بندی"); ?>
            </div>
          </div>
          <!-- Footer -->
          <div id="footer">
          <div id="start-footer"></div> 
            <div id="sitemap">
              <div class="column">
                <h3>
                  <span class="glyphicon glyphicon-home"></span> خانه
                </h3>
                <ul>
                  <li><a href="aboutserver">درباره سرور</a></li>
                  <li><a href="shop">فروشگاه</a></li>
                  <li><a href="support">پشتیبانی</a></li>
                  <li><a href="recoverypassword">بازیابی رمز عبور</a></li>
                  <li><a href="getgame">دریافت بازی</a></li>
                </ul>
              </div>
              <div class="column">
                <h3>
                  <span class="glyphicon glyphicon-comment"></span> تالارگفتمان
                </h3>
                <ul>
                  <li><a href="forum_categ/1">اطلاعیه</a></li>
                  <li><a href="forum_categ/2">گفتوگوی عمومی</a></li>
                  <li><a href="forum_categ/3">مشکلات</a></li>
                  <li><a href="forum_categ/4">پیشنهادات</a></li>
                </ul>
              </div>
              <div class="column">
                <h3>
                  <span class="glyphicon glyphicon-user"></span> اکانت
                </h3>
                <ul>
                  <li><a href="cantlogin">نمیتوانم وارد بشوم</a></li>
                  <li><a href="register">ثبت نام</a></li>
                  <li><a href="panel">مدیریت حساب</a></li>
                  <li><a href="security">امنیت حساب</a></li>
                  <li><a href="hacked">هک شده ام !</a></li>
                </ul>
              </div>
              <div class="column">
                <h3>
                  <span class="glyphicon glyphicon-wrench"></span> پشتیبانی
                </h3>
                <ul>
                  <li><a href="contact">تماس با ما</a></li>
                  <li><a href="about">درباره ما</a></li>
                  <li><a href="join">دعوت به همکاری</a></li>
                  <li><a href="faq">پرسش های متداول</a></li>
                </ul>
              </div>
              <div class="column">
                <h3>
                  <span class="glyphicon glyphicon-usd"></span> خدمات گیم کارت
                </h3>
                <ul>
                  <li><a href="pay">شارژ حساب</a></li>
                  <li><a href="transcharge">انتقال موجودی</a></li>
                  <li><a href="cost">تراکنش ها</a></li>
                  <li><a href="cost">نمایش موجودی</a></li>
                </ul>
              </div>
            </div>
            <div id="copyright">
            	<center>
                	<p>تمامی حقوق این وبسایت محفوظ میباشد و کپی برداری از منابع آن بدون ذکر منبع پیگرد قانونی دارد.</p>
                    <p>قدرت گرقته از PersianCMS.</p>
                    <p>تمامی منابع متعلق به شرکت بلیزارد میباشد.</p>
                </center>
            </div>
          </div>
    </div>
    <?php include ("application/languages/".$_SESSION['language']."/login.php");?>
    <!-- Modal Login -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">ورود به سیستم</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="post" id="_login" action=""
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
			<script type="text/javascript">
              $(document).ready(function() {
                  $('#_login').bootstrapValidator();
              });
            </script>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
    <?php include ("application/languages/".$_SESSION['language']."/register.php");?>
	<!-- Modal register -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">ساخت اکانت</h4>
          </div>
          <div class="modal-body">
            <div class="messages"></div>
                <form class="form-horizontal" method="post" id="_register">
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
				<script type="text/javascript">
                $(document).ready(function() {
                    $('#_register')
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
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
  </body>
</html>