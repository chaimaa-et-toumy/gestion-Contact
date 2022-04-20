let   form = document.getElementById('form');
let username = document.getElementById('namee');
let phone = document.getElementById('phonee');
let email = document.getElementById('emaile');
let adresse = document.getElementById('adressee');



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
}



function validateContact(){
    let usernameValue = username.value;
    let phoneValue = phone.value;
    let emailValue = email.value;
    let adresseValue = adresse.value;
    let expname =/^[A-Za-z]{3,}$/;
let expEmail =/[a-z][0-9]*@[a-z]+\.[a-z]{2,3}/;
let expphone = /^[0-9]{10,}$/;
let expadresse = /^[A-Za-z]{10,}$/;

    // var i = 0;

    if(usernameValue === '') {
        invalid(username, 'Username is required');
        console.log("test");
        return false;
        

    } 
	else if (expname.test(usernameValue) == false){
		invalid(username, 'enter a valid name');
        return false;

	} 
	// else {
    //     success(username);
    //     i++; 
    // }

    else if(phoneValue === '') {
        invalid(phone, 'phone is required');
        return false;

    } 
    else if (expphone.test(phoneValue) == false){
		invalid(phone, 'enter a valid phone');
        return false;


    } 
    // else {
    //     success(phone);
    //     i++; 
    // }

    else if(emailValue === '') {
        invalid(email, 'enter a valid email');
        return false;


    }   else if (expEmail.test(emailValue) == false){
        	invalid(email, 'enter a valid email');
            return false;

    
        }
        //  else {
        // success(email);
        // i++; 
    
   else if(adresseValue === '') {
        invalid(adresse, 'enter a valid adresse');
        return false;


    }   else if (expadresse.test(adresseValue) == false){
        	invalid(adresse, 'enter a valid adresse');
            return false;

    
        } 
    
        // else {
        // success(adresse);
        // i++; 
    // }

    // if (i == 4) 
    //     form.submit(); 
    else{
        return true;
    }
};
