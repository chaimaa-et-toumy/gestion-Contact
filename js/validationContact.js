let   form = document.getElementById('form');
let username = document.getElementById('username');
let phone = document.getElementById('phone');
let email = document.getElementById('email');
let adresse = document.getElementById('adresse');



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

let expname =/^[A-Za-z]{3,}$/;
let expEmail =/[a-z][0-9]*@[a-z]+\.[a-z]{2,3}/;
let expphone = /^[0-9]{10,}$/;
let expadresse = /^[A-Za-z]{10,}$/;

function validateContact(event){
    let usernameValue = username.value.trim();
    let phoneValue = phone.value.trim();
    let emailValue = email.value.trim();
    let adresseValue = adresse.value.trim();

    var i = 0;

    if(usernameValue === '') {
        invalid(username, 'Username is required');

    } 
	else if (expname.test(usernameValue) == false){
		invalid(username, 'enter a valid name');
	} 
	else {
        success(username);
        i++; 
    }

    if(phoneValue === '') {
        invalid(phone, 'phone is required');
        event.preventDefault();

    } 
    else if (expphone.test(phoneValue) == false){
		invalid(phone, 'enter a valid phone');

    } else {
        success(phone);
        i++; 
    }

    if(emailValue === '') {
        invalid(email, 'enter a valid email');

    }   else if (expEmail.test(emailValue) == false){
        	invalid(email, 'enter a valid email');
    
        } else {
        success(email);
        i++; 
    }
    if(adresseValue === '') {
        invalid(adresse, 'enter a valid adresse');

    }   else if (expadresse.test(adresseValue) == false){
        	invalid(adresse, 'enter a valid adresse');
    
        } else {
        success(adresse);
        i++; 
    }

    if (i == 4) 
        form.submit(); 
};
