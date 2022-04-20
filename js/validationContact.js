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
    inputControl.classList.remove('success');
    return false;
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
      return  invalid(username, 'Username is required');
    } 
	else if (expname.test(usernameValue) == false){
	return invalid(username, 'enter a valid name');
	} 
	else {
      success(username);
    }
     if(phoneValue === '') {
       return invalid(phone, 'phone is required');
    } 
    else if (expphone.test(phoneValue) == false){
		return invalid(phone, 'enter a valid phone');
       


    } 
    else {
        success(phone);
       
    }

     if(emailValue === '') {
        return invalid(email, 'enter a valid email');
      

    }   else if (expEmail.test(emailValue) == false){
        return invalid(email, 'enter a valid email');
           

    
        }
         else {
        success(email);
     }
    
  if(adresseValue === '') {
    return invalid(adresse, 'enter a valid adresse');
        


    }   else if (expadresse.test(adresseValue) == false){
        return	invalid(adresse, 'enter a valid adresse');

    
        } 
    
        else {
        success(adresse);
    }

    // if (i == 4) 
    //     form.submit(); 
    // else{
    //     return true;
    // }
}
