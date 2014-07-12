function validate_login_form ()
{
	var validate = true;
	var expRegName = /^[a-zA-Z]{1,20}$/;

	if (!document.loginForm.inputUsername.value) {
		alert("Provide your Username to login.");
		document.loginForm.inputUsername.focus ();
		validate = false;
	}
	else if (!expRegName.exec(document.loginForm.inputUsername.value)) {
		alert("The Username provided is wrong.");
		document.loginForm.inputUsername.focus ();
		validate = false;
	}
	else if (!document.loginForm.inputPassword.value) {
		alert("Provide your Password to login.");
		document.loginForm.inputPassword.focus ();
		validate = false;
	}

	if (validate) {
		var query = "Username=" + document.loginForm.inputUsername.value;
		query += "&Password=" + document.loginForm.inputPassword.value;

		var xmlhttp;
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest ();
		}
		else if (window.ActiveXObject) {
			xmlhttp = new ActiveXObject ("Microsoft.XMLHTTP");
		}

		if (xmlhttp) {
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4) {
					if (xmlhttp.status == 200) {
						if (xmlhttp.responseText == 'Okey') {
							window.location = "posts";
						}
						else {
							alert (xmlhttp.responseText);
						}
					}
				}
			};
			xmlhttp.open ("POST", "login/login", true);
			xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xmlhttp.send (query);
		}
	}
}

function summit_login_form (event)
{
	if (event.keyCode == 13)
		validate_login_form ();
}

window.onload = function() {
	document.loginForm.buttonLogin.onclick = validate_login_form;
	document.loginForm.inputPassword.onkeypress = summit_login_form;
	document.loginForm.inputUsername.onkeypress = summit_login_form;
}
