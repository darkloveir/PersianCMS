/*
 * MWS Admin v2.1 - Login JS
 * This file is part of MWS Admin, an Admin template build for sale at ThemeForest.
 * All copyright to this file is hold by Mairel Theafila <maimairel@yahoo.com> a.k.a nagaemas on ThemeForest.
 * Last Updated:
 * December 08, 2012
 *
 */
 
(function($) {
	$(document).ready(function() {	
	  $(".login-button").click(function() {
			var username = $(".login-username").val();
			var password = $(".login-password").val();
			var send = true;
			$(".messages").html("<div class='form-message info'>لطفا صبر کنید...</div>");
			if(username == "" && password == "")
			{
				$("#login").effect("shake", {distance: 10, times: 3}, 1000);
				$(".messages").html("<div class='form-message warning'>نام کاربری خود را وارد کنید.</div>");
			}
			else
			{
			  $.post("include/login.php", {username:username, password:password, send:send}, function(data) {
				$(".messages").html(data);
				switch(data)
				{
					case "1":
					  $("#login").effect("shake", {distance: 50, times: 1}, 1000);
					  $(".messages").html("<div class='form-message success'><a href=''>شما با موفقیت وارد شدید</a></div>");
					break;
					
					case "2":
					  $("#login").effect("shake", {distance: 10, times: 3}, 300);
					  $(".messages").html("<div class='form-message error'>نام کاربری یا رمز عبور اشتباه میباشد.</div>");
					break;
					
					case "3":
					  $("#login").effect("shake", {distance: 10, times: 3}, 1000);
					  $(".messages").html("<div class='form-message warning'>نام کاربری خود را وارد کنید.</div>");
					break;
				}
			  });
			}
		});
		$.fn.placeholder && $('[placeholder]').placeholder();
	});
}) (jQuery);
