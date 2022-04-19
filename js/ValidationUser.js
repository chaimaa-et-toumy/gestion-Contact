let form = document.getElementById('form');
let username = document.getElementById('username');
let password = document.getElementById('password1');
let password2 = document.getElementById('password2');

function invalid (element, message) {
    let inputControl = element.parentElement;
    let errorDisplay = inputControl.querySelector('.error');
    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}
function success (element){
    let inputControl = element.parentElement;
    let errorDisplay = inputControl.querySelector('.error');
    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};
let exp =/^[A-Za-z0-9]{3,}$/;

function validateInputs (){
    let usernameValue = username.value.trim();
    let passwordValue = password.value.trim();
    let password2Value = password2.value.trim();
    // var i = 0;

    if(usernameValue === '') {
        invalid(username, 'Username is required');
        return false;
    } 
	else if (exp.test(usernameValue) == false){
		invalid(username, 'this username should contain only numbers and letters');
        return false;
	} 
	// else {
    //     success(username);
    //     i++; 
    // }

    else if(passwordValue === '') {
        invalid(password, 'Password is required');
        return false
    }
    else if (passwordValue.length < 6 ) {
        invalid(password, 'Password must be at least 6 character.');
        return false;
    }
    //  else {
    //     success(password);
    //     i++; 
    // }

    else if(password2Value === '') {
        invalid(password2, 'Please confirm your password');
        return false;
    } 
    else if (password2Value !== passwordValue) {
        invalid(password2, "enter same password");
        return false;
    }
    //  else {
    //     success(password2);
    //     i++; 
    // }

    // if (i == 4) {
    //     form.submit(); 
    // }
    else{
        return true;

    }
};
