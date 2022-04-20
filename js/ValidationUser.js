let   form = document.getElementById('form');
let username = document.getElementById('username');
let password = document.getElementById('password1');
let password2 = document.getElementById('password2');


// document.getElementById("create").addEventListener('click', (e) => {
//     validateInputs();
//     e.preventDefault();
// });

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
function validateInputs (event){
    let usernameValue = username.value.trim();
    let passwordValue = password.value.trim();
    let password2Value = password2.value.trim();
    var i = 0;

    if(usernameValue === '') {
        invalid(username, 'Username is required');
        event.preventDefault();

    } 
	else if (exp.test(usernameValue) == false){
		invalid(username, 'this username should contain only numbers and letters');
        event.preventDefault();

	} 
	else {
        success(username);
        i++; 
    }

    if(passwordValue === '') {
        invalid(password, 'Password is required');
        event.preventDefault();

    } else if (passwordValue.length < 6 ) {
        invalid(password, 'Password must be at least 6 character.');
        event.preventDefault();

    } else {
        success(password);
        i++; 
    }

    if(password2Value === '') {
        invalid(password2, 'Please confirm your password');
        event.preventDefault();

    } else if (password2Value !== passwordValue) {
        invalid(password2, "enter same password");
        event.preventDefault();

    } else {
        success(password2);
        i++; 
    }

    if (i == 4) 
        form.submit(); 
};
