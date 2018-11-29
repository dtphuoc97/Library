<!DOCTYPE html>
<html>
<head>
	<title>Access</title>
	<?php include('head.php'); ?>
</head>
<body>
	<div class="my-topbar">
		<?php include('topbar.php'); ?>
	</div>
	<div class="my-center">

		<div class="container mt-3"> 
		
			<div id="wrapper">
		        <form id="login_form" action="<?php echo base_url('access/login'); ?>" method="post">
		         
		            <div class="header">
		            <h1>Login with yours account</h1>
		            <span></span>
		            </div>
		         
		            <div class="content">
		            <input type="text" class="input email" placeholder="Email" id="email" name="email" />
		            <div class="user_icon trans"></div>
		            <div class="email_error error trans"></div>
		            <input type="password" class="input password" placeholder="Mật khẩu" id="password" name="password" />
		            <div class="pass_icon trans"></div> 
		            <div class="password_error error trans"></div>      
		            </div>
		     
		            <div class="footer">
		            <input type="button"  value="Register" class="register mr-3" id="choose_register"/>
		            <input type="submit"  value="Login" class="button" id="login"/>
		            </div>
		         
		        </form>
		
		        <form id="register_form">
		         
		            <div class="header">
		            <h1>Register new account</h1>
		            <span></span>
		            </div>
		         
		            <div class="content">
		            	<div class="row">
			            	<input type="text" class="input name col-6" placeholder="Last name" id="lastname" />
			             	<input type="text" class="input name col-6" placeholder="First name" id="firstname" />
			             	<div class="reg_name_error error trans"></div>
		       			</div>
			            
			            <!---------->
			            <div class="row">
				            <input type="text" class="input email" placeholder="Email" id="reg_email" />
				            <div class="reg_email_error error trans"></div>
				        </div>
			            <!---------->
			            <div class="row">
				            <input type="password" class="input password" placeholder="Mật khẩu" id="reg_password" />  
				            <div class="reg_password_error error trans"></div>
				        </div>
			            <!---------->
			            <div class="row">
				            <input type="password" class="input confpassword" placeholder="Xác nhận mật khẩu" id="reg_confpassword" />  
				            <div class="reg_confpassword_error error trans"></div>
			            </div>       
		            </div>
		     
		            <div class="footer">
		            <input type="button"  value="Login" class="register mr-3" id="choose_login"/>
		            <input type="submit"  value="Register" class="button" id="register"/>		            
		            </div>
		         
		        </form>
			</div>	
		</div>


	</div>
</body>
</html>