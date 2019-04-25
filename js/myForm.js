window.addEventListener("load", function(event){

	function submitForm(evt){
		var usernameField = document.getElementById("username");
		var username = usernameField.value;
		var usernameError = document.getElementById("usernameError");

		var emailField = document.getElementById("email");
		var email = emailField.value;
		var emailError = document.getElementById("emailError");

		var passwordField = document.getElementById("password");
		var password = passwordField.value;
		var passwordError = document.getElementById("passwordError");

		var nameField = document.getElementById("name");
		var name = nameField.value;
		var nameError = document.getElementById("nameError");

		var langButton = document.getElementsByName("lang[]");
		var langChecked = false;
		var langError = document.getElementById("langError");
		


		

		var valid = true;

		//console.log(username);

		usernameError.innerHTML = "";
		emailError.innerHTML = "";
		passwordError.innerHTML = "";
		nameError.innerHTML = "";
		langError.innerHTML = "";

		/*-----------------------------------------------------------------------------*/
		if(name ===""){
			nameError.innerHTML = "Name is a required field";
			valid = false;
		}

		/*-----------------------------------------------------------------------------*/
		if(username ===""){
			usernameError.innerHTML = "Username is a required field";
			valid = false;
		}

		/*-----------------------------------------------------------------------------*/
		if(email ===""){
			emailError.innerHTML = "Email is a required field";
			valid = false;
		}
		else if(!isValidEmailFormat(email)){
			emailError.innerHTML = "This is not a valid email";
			valid = false;
		}

		/*-----------------------------------------------------------------------------*/
		if(password ===""){
			passwordError.innerHTML = "Password is a required field";
			valid = false;
		}

		/*-----------------------------------------------------------------------------*/
		 langChecked = validateCheckBoxes(langButton, 1, 3);

		 if(!langChecked){
		 	langError.innerHTML = "Please choose at least one language";
		 	valid = false;
		}

		/*-----------------------------------------------------------------------------*/
		if(!valid){
			evt.preventDefault();
		}
		
	}
	var submitBtn = document.getElementById("submit");
	submitBtn.addEventListener("click", submitForm);
});