<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<meta name="csrf-token" content="<?php echo csrf_token() ?>" />
	<title>Winku Social Network Toolkit</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16"> 
    
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">
	<!-- jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
 
	
</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
	<div class="container-fluid pdng0">
		<div class="row merged">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="land-featurearea">
					<div class="land-meta">
						<h1>Winku</h1>
						<p>
							Winku is free to use for as long as you want with two active projects.
						</p>
						<div class="friend-logo">
							<span><img src="images/wink.png" alt=""></span>
						</div>
						<a href="#" title="" class="folow-me">Follow Us on</a>
					</div>	
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="login-reg-bg">
					<div class="log-reg-area sign">
						<h2 class="log-title">Login</h2>
							<p>
								Don’t use Winku Yet? <a href="#" title="">Take the tour</a> or <a href="#" title="">Join now</a>
							</p>
						<form method="post" action="/validate">
							<div class="form-group">	
							  <input type="text" id="input" name="email" required="required"/>
							  <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
							  <input type="password" name="password" required="required"/>
							  <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
							</div>
							<input type="hidden" name="_token" value="<?php echo csrf_token()?>"/>							  
							<div class="checkbox">
							  <label>
								<input type="checkbox" checked="checked"/><i class="check-box"></i>Always Remember Me.
							  </label>
							</div>
							<a href="#" title="" class="forgot-pwd">Forgot Password?</a>
							<div class="submit-btns">
								<button class="mtr-btn signin" type="submit"><span>Login</span></button>
								<button class="mtr-btn signup" type="button"><span>Register</span></button>
								
							</div>
						</form>
						<a href="/oauth2/google" style="background-color: #dd4b39;color: white;width: 100%;text-align: center;padding: 12px;border: none;border-radius: 4px;margin: 50px 0;opacity: 0.85;display: inline-block;font-size: 17px;line-height: 20px;text-decoration: none;">
									<i class="fa fa-google fa-fw"></i> 
									Login with Google+
					</a>
					</div>
					
					<div class="log-reg-area reg">
						<h2 class="log-title">Register</h2>
							<p>
								Don’t use Winku Yet? <a href="#" title="">Take the tour</a> or <a href="#" title="">Join now</a>
							</p>
						<form method="post" action="/registerAccount">
							<div class="form-group">	
							  <input type="text" required="required" name="firstname" id="firstname"/>
							  <label class="control-label" for="input" id="lbfirstname">First Name</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
							  <input type="text" required="required" name="lastname" id="lastname"/>
							  <label class="control-label" for="input" id="lblastname">Last Name</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
							  <input type="password" required="required" name="password" id="password"/>
							  <label class="control-label" for="input" id="lbpassword">Password</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
							  <input type="password" required="required" name="confirm_pass" id="confirm_pass"/>
							  <label class="control-label" for="input" id="lbconfirm_pass">Confirm Password</label><i class="mtrl-select"></i>
							</div>
							<div class="form-radio">
							  <div class="radio">
								<label>
								  <input type="radio" name="gender" checked="checked" value="0"/><i class="check-box"></i>Male
								</label>
							  </div>
							  <div class="radio">
								<label>
								  <input type="radio" name="gender" value="1"/><i class="check-box"></i>Female
								</label>
							  </div>
							</div>
							<div class="form-group">	
							  <input type="email" required="required" name="email" id="email"/>
							  <label class="control-label" for="input" id="lbemail"><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6c29010d05002c">[email&#160;protected]</a></label><i class="mtrl-select"></i>
							</div>
							<div class="checkbox">
							  <label>
								<input type="checkbox" checked="checked" name="Terms" value="1" required="required"/><i class="check-box"></i>Accept Terms & Conditions ?
							  </label>
							</div>
							<input type="hidden" name="_token" id="token" value="<?php echo csrf_token()?>"/>
							<a href="#" title="" class="already-have">Already have an account</a>
							<div class="submit-btns">
								<button class="mtr-btn" type="submit"><span>Register</span></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
	<script>
		$('input').click(function(){

			var id = $(this).attr("id");

			$("#" + id).focusout(function(){

				if($.trim($("#" + id).val()) == ""){
					if(!$("#lb" + id).text().includes("không thể rỗng")){
						$("#lb" + id).text($("#lb" + id).text() + " không thể rỗng").css("color","red");
					}
				}

				if($("#password").val() !== $("#confirm_pass").val())
				{
					$("#lbconfirm_pass").text("Mật khẩu không trùng khớp").css("color","red");
				}
				else if($("#password").val() === $("#confirm_pass").val() && $("#confirm_pass").val() !== "")
				{
					$("#lbconfirm_pass").text("Confirm Password").css("color","#007bff");
				}
				
			});

			$("#" + id).focusin(function(){
				if($("#lb" + id).text().includes("không thể rỗng")){
					$("#lb" + id).text($("#lb" + id).text().substr(0,$("#lb" + id).text().indexOf("không thể rỗng"))).css("color","#007bff");
				}	
			});
		});



		$("form:eq(1)").submit(function(event){
			if($("#lbconfirm_pass").css("color") == "rgb(255, 0, 0)"){
				event.preventDefault();
			}else if($("#lbemail").css("color") == "rgb(255, 0, 0)"){
				event.preventDefault();
			}else if($("#lbfirstname").css("color") == "rgb(255, 0, 0)"){
				event.preventDefault();
			}else if($("#lblastname").css("color") == "rgb(255, 0, 0)"){
				event.preventDefault();
			}else if($("#lbpassword").css("color") == "rgb(255, 0, 0)"){
				event.preventDefault();
			}			
		});



		$('input').change(function(){
			
			var value = $(this).val();
			var key = $(this).attr("name");
			var arrKey = [];
			var arrValue = [];
			
			if(key === "firstname" || key === "lastname" && $('#firstname').val() !== "" && $('#lastname').val() !== ""){
				arrKey.push("firstname","lastname");
				arrValue.push($('#firstname').val(),$('#lastname').val());

				$.ajax({
				type:'POST',
				url:"/ajaxCheckData",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    			},
				data:{key:arrKey,value:arrValue},
				success:function(data){
					if(data[2] !== "0"){
						$("#lb"+ data[0]).text($("#lb"+ data[0]).text() + " đã tồn tại").css("color","red");
						$("#lb"+ data[1]).text($("#lb"+ data[1]).text() + " đã tồn tại").css("color","red");
					}
					else{
						if($("#lb" + data[0]).text().includes("đã tồn tại") && $("#lb" + data[1]).text().includes("đã tồn tại")){
							$("#lb" + data[0]).text($("#lb" + data[0]).text().substr(0,$("#lb" + data[0]).text().indexOf("đã tồn tại"))).css("color","#007bff");
							$("#lb" + data[1]).text($("#lb" + data[1]).text().substr(0,$("#lb" + data[1]).text().indexOf("đã tồn tại"))).css("color","#007bff");
						}	
					}
					
				}
				});
			}

			if(value !== "" && key == "email"){
				
				$.ajax({
				type:'POST',
				url:"/ajaxCheckData",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    			},
				data:{key:key,value:value},
				success:function(data){

					if(data.charAt(data.length - 1) != 0){
						$("#lb"+ data).text($("#lb"+ data).text() + " đã tồn tại").css("color","red");
					}else{
						if($("#lb" + data.split("0",1)).text().includes(" đã tồn tại")){
							$("#lb" + data.split("0",1)).text($("#lb" + data.split("0",1)).text().substr(0,$("#lb" + data.split("0",1)).text().indexOf("đã tồn tại"))).css("color","#007bff");
						}
					}
				}
				});
			}			
		});
	</script>


	<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/main.min.js"></script>
	<script src="js/script.js"></script>
</body>	

</html>