function buy_details(){
	var regbuy= /^[0-9]{1,4}$/;
	var quantity = $("#quantity").val();

	if (quantity=="")
	{
		$("#status3").html('<p class="alert alert-warning" role="alert"><b>Quantity no. cant be empty</b></p>');
		$("#quantity").focus();
	} 
	else if(!quantity.match(regbuy))
	{
		$("#status3").html('<p class="alert alert-warning" role="alert"><b>Enter valid quantity</b></p>');
		$("#quantity").focus();
	}


}

function register_details(){
	var reg_name = /^[A-Z][a-z]*$/;
	var reg_mail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var mob_no = /^[0-9]{10}$/;
	var fname = $("#fname").val();
	var lname = $("#lname").val();
	var mail = $("#mail").val();
	var phone = $("#phone").val();
	var Class = $("#Class").val();
	var pwd = $('#pwd').val();
	var cpwd = $('#cpwd').val();

	if(fname=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>First name cant be empty</b></p>');
		$("#fname").focus();
	}

	else if(lname=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Last name cant be empty</b></p>');
		$("#lname").focus();
	} 

	else if(mail=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Email id cant be empty</b></p>');
		$("#mail").focus();
	} 

	else if(!mail.match(reg_mail))
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Enter valid email id</b></p>');
		$("#mail").focus();
	} 

	else if(phone=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Mobile no. cant be empty</b></p>');
		$("#phone").focus();
	} 

	else if(!phone.match(mob_no))
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Enter valid mobile number</b></p>');
		$("#phone").focus();
	}

	else if(Address=="")
	{
		$("#Address").html('<p class="alert alert-warning" role="alert"><b>Address cant be empty</b></p>');
		$("#Class").focus();
	}

	else if(pwd=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Password cant be empty</b></p>');
		$("#pwd").focus();
	}

	else if(cpwd=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Enter confirm password</b></p>');
		$("#cpwd").focus();
	}


	else if(pwd != cpwd)
	{
		$("#status").html('<p class="alert alert-danger" role="alert"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;<b>Passwords dont match</b></p>');
		$("#cpwd").focus();
	} 

	else
	{
		$("#status").html('<p class="alert alert-success" role="alert"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;<b>Registered Successfully! Please Log in to continue</b></p>');
	}
}
