const form = document.querySelector('.form');
const username =  document.querySelector('#username');
const email = document.querySelector('#email');
const password = document.querySelector('#password');
const password2 = document.querySelector('#password2');
const small = document.querySelector('.small');

// Shwoing error message
function showError(input, message){
	const formControl = input.parentElement;
	formControl.className = 'form-control error';
	const small = formControl.querySelector('small');
	small.innerHTML = message;
}

// Showing success message
function showSuccess(input, message){
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}

// Email validatiy check

function isValid(email){
	 const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  		return re.test(email);
}


// Select parent wrapper
form.addEventListener('submit', function(e){
	e.preventDefault();
	if (username.value === '') {
		showError(username, 'Username is required');
	}
	else if(username.value.length < 5 ){
		showError(username, 'Username must be 6 charecter!!');
	}
	else{
		showSuccess(username);
	}

	if (email.value === '') {
		showError(email, 'Email is required');
	}else if(!isValid(email.value)){
		showError(email, 'Email is Invalid');
	}

	else{
		showSuccess(email);
	}

	if (password.value === '') {
		showError(password, 'password is required');
	}
	else if(password.value.length < 6){
		showError(password, 'Password must be 8 charecter!~');
	}

	else{
		showSuccess(password);
	}

	if (password2.value === '') {
		showError(password2, 'Confirmation password is required');
	}
	else if(password2.value != password.value){
		showError(password2, 'Confirmation password is Not match');
	}
	else if(password2.value.length < 6){
		showError(password2, 'Password Should be 8 charecter!')
	}

	else{
		showSuccess(password2);
	}


})