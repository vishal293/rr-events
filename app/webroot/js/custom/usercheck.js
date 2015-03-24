$('#submit').click(function(){

	var password = $('#UserPassword').val();
	var confirm = $('#UserCnfPassword').val();


	if(password.length < 8)
	{
		alert('Password should be more than 8 characters');
		$('#UserPassword').focus();
		return false;
	}
	if(password != confirm)
	{
		alert('Password do not match. Make sure passwords are same');
		$('#UserCnfPassword').focus();
		return false;
	}

 });