$(document).ready(function(e) {
	
$('#choose_register').click(function()
{
	$('#login_form').hide();
	$('.header span').html('');
	$('#register_form').show();
})
$('#choose_login').click(function()
{
	$('#register_form').hide();
	$('#login_form').show();
})
function ajax(action)
{
	if(action=='login')
	{
		email=$('#email').val();
		password=$('#password').val();
		if(warning(email,password)==false)
			{
				return false;
			}
		data="email="+email+"&password="+password;
		//console.log(data);
		data_type="json";
		controller="access/login";
	}
	else if(action=='register')
	{
		lastname=$('#lastname').val();
		firstname=$('#firstname').val();
		email=$('#reg_email').val();
		password=$('#reg_password').val();
		confpassword=$('#reg_confpassword').val();
		if(reg_warning(lastname+firstname,email,password,confpassword)==false)
			{
				return false;
			}
		data="email="+email+"&password="+password+"&lastname="+lastname+"&firstname"+firstname;
		//console.log(data);
		data_type="json";
		controller="access/register";
	}
	
	$.ajax({
		url:controller,
		async:true,
		type:"post",
		data:data,
		dataType:data_type,
		success: function(kq){
			if(action=='login')
			{
				if(kq.status)
				{
					//alert(kq.url);
					window.location.href=kq.url;
				}
				else
				{
					$('.header span').html('Email hoặc mật khẩu không chính xác! vui lòng kiểm tra lại');
				}
			}
			else if(action=='register')
			{
				if(kq.status==1)
				{
					$('#choose_login').click();
					$('.header span').html('Đăng ký thành công. Bạn vui lòng vào kiểm tra email để kích hoạt!');
				}
				else
				{
					$('.header span').html('Email đã tồn tại, vui lòng kiểm tra lại');
				}
			} 
		},
	});
} 
$('#login').click(function()
{
	ajax("login");
	return false;
})
$('#register').click(function()
{
	ajax("register");
	return false;
})
$('html').click(function(){
	reset_warning();
	$('.header span').html('');
})
function warning(email,password)
	{
		if(email=="") 
		{
			$('.email_error').css('width','180px');
			$('.email_error').html('<span class="warning">Bạn chưa nhập email!</span>');
			return false;
		}
		else 
		{
			check_mail=/^[0-9A-Za-z]+[0-9A-Za-z_]*@[\w\d.]+.\w{2,4}$/;
       	    if(!check_mail.test(email))
			{
				$('.email_error').css('width','180px');
				$('.email_error').html('<span class="warning">Định dạng email sai!</span>');
				return false;
			}
			else
			{
				$('.email_error').css('width','0');
				$('.email_error').html('');
			}	
		}
		if(password=="") 
		{
			$('.password_error').css('width','180px');
			$('.password_error').html('<span class="warning">Bạn chưa nhập mật khẩu!</span>');
			return false;
		}
		else
		{
			$('.password_error').css('width','0');
			$('.password_error').html('');
		}
	}
	
function reg_warning(name,email,password,confpassword)
	{
		if(name=="")
		{
			 $('.reg_name_error').css('width','180px');
			 $('.reg_name_error').html('<span class="warning">Tên bạn là gì?</span>');
			 return false;
		}
		else 
		{
			check_name=/[0-9\.,<>?\/:;"\'{}\[\]\|`~\!@#\$%\^\&\*\(\)\_\-\+\=]/;
			//Không nhận kí tự đặc biệt- Nhận tiếng việt
			if(check_name.test(name))
			{
				$('.reg_name_error').css('width','180px');
				$('.reg_name_error').html('<span class="warning">Tên không hợp lệ</span>');
				return false;
			}
			else
			{
				$('.reg_name_error').css('width','0');
				$('#reg_name_error').html('');
			}
		}
		if(email=="") 
		{
			$('.reg_email_error').css('width','180px');
			$('.reg_email_error').html('<span class="warning">Bạn chưa nhập email!</span>');
			return false;
		}
		else 
		{
			check_mail=/^[0-9A-Za-z]+[0-9A-Za-z_]*@[\w\d.]+.\w{2,4}$/;
       	    if(!check_mail.test(email))
			{
				$('.reg_email_error').css('width','180px');
				$('.reg_email_error').html('<span class="warning">Định dạng email sai!</span>');
				return false;
			}
			else
			{
				$('.reg_email_error').css('width','0');
				$('.reg_email_error').html('');
			}	
		}
		if(password=="") 
		{
			$('.reg_password_error').css('width','180px');
			$('.reg_password_error').html('<span class="warning">Bạn chưa nhập mật khẩu!</span>');
			return false;
		}
		else
		{
			 if(password.length<6)
			 {
				 $('.reg_password_error').css('width','180px');
				 $('.reg_password_error').html('<span class="warning">Mật khẩu quá ngắn</span>');
				 return false;
			 }
			 else
			 {
				 check_pass=/[0-9a-zA-Z_]/;
				 if(!check_pass.test(password))
				 {
					$('.reg_password_error').css('width','180px');
					$('.reg_password_error').html('<span class="warning">Có ký tự đặc biệt</span>');
					return false;
				 } 
				 else
				 {
					 $('.password_error').css('width','0');
					 $('.password_error').html('');
				 }
			 }
			
		}
		if(password!=confpassword)
		{
			$('.reg_confpassword_error').css('width','180px');
			$('.reg_confpassword_error').html('<span class="warning">Mật khẩu không khớp</span>');
			return false;
		} 
		else 
		{
			$('.reg_confpassword_error').css('width','0');
			$('.reg_confpassword_error').html('');
		}
	}
function reset_warning()
	{
		$('.email_error').css('width','0');
		$('.password_error').css('width','0');
		$('.email_error').html('');	
		$('.password_error').html('');
		$('.reg_email_error').css('width','0');
		$('.reg_password_error').css('width','0');
		$('.reg_email_error').html('');	
		$('.reg_password_error').html('');
		$('.reg_name_error').css('width','0');
		$('.reg_confpassword_error').css('width','0');
		$('.reg_name_error').html('');	
		$('.reg_confpassword_error').html('');
	} 
});