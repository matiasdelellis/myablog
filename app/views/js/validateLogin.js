function validate_login_form ()
{
	var login = true;
	var expRegName = /^[a-zA-Z]{1,20}$/;

	if (!document.loginForm.inputUsername.value) {
		alert("Provide your Username to login.");
		document.loginForm.inputUsername.focus ();
		login = false;
	}
	else if (!expRegName.exec(document.loginForm.inputUsername.value)) {
		alert("The Username provided is wrong.");
		document.loginForm.inputUsername.focus ();
		login = false;
	}
	else if (!document.loginForm.inputPassword.value) {
		alert("Provide your Password to login.");
		document.loginForm.inputPassword.focus ();
		login = false;
	}

	if (login) {
		document.loginForm.submit ();
	}
}

function summit_login_form (event)
{
	if (event.charCode == 13)
		validate_login_form ();
}

window.onload = function() {
	document.loginForm.buttonLogin.onclick = validate_login_form;
	//document.loginForm.inputPassword.onkeypress = summit_login_form(event);
}

	$("inputPassword").keypress(function (event) {
		if(event.which == 13) {
			validate_login_form ();
			event.preventDefault();
		}
	});
