/* LOGIN SHOW AND HIDDEN */
const signUp = document.getElementById('sign-up'), 
signIn = document.getElementById('sign-in');
loginIn = document.getElementById('login-in'),
loginUp = document.getElementById('login-up');

const usernameRegister = document.getElementById('username-register');
const passwordRegister = document.getElementById('password-register');
const emailRegister = document.getElementById('email-register');
const cpasswordRegister = document.getElementById('cpassword-register');
const usernameRegister_error = document.getElementById('usernameRegister-error');
const passwordRegister_error = document.getElementById('passwordRegister-error');
const emailRegister_error = document.getElementById('emailRegister-error');
const cpasswordRegister_error = document.getElementById('cpasswordRegister-error');

const smallUsernameRegister = usernameRegister_error.querySelector('small');
const smallPasswordRegister = passwordRegister_error.querySelector('small');
const smallEmailRegister = emailRegister_error.querySelector('small');
const smallCPasswordRegister = cpasswordRegister_error.querySelector('small');



signUp.addEventListener('click', ()=> {
    // Remove classes first if they exist
    loginIn.classList.remove('block');
    loginUp.classList.remove('none');

    // Add classes
    loginIn.classList.add('none');
    loginUp.classList.add('block');
})

signIn.addEventListener('click', ()=> {
    // Remove classes first if they exist
    loginIn.classList.remove('none');
    loginUp.classList.remove('block');

    // Add classes
    loginIn.classList.add('block');
    loginUp.classList.add('none');
})

inputs.forEach(inputs => {
    usernameRegister.addEventListener('keyup', checkInputsUsernameRegister);
    passwordRegister.addEventListener('keyup', checkInputsPasswordRegister);
    cpasswordRegister.addEventListener('keyup', checkInputsCPasswordRegister);
    emailRegister.addEventListener('keyup', checkInputsEmailRegister);
})

function checkInputsUsernameRegister() {   
    const usernameValue = usernameRegister.value.trim();
    if(usernameValue != '') {
        console.log(validateNameRegister);

        if(validateNameRegister()) {
            console.log(true);
            setSuccessForUsernameRegister(usernameRegister);
        } else {
            setErrorForUsernameRegister(usernameRegister, 'Username can only contain uppercase, lowercase and digit!');
        }        
    } else {
        setErrorForUsernameRegister(usernameRegister, 'Username cannot be blank!');
    }
}

function checkInputsPasswordRegister() {
    const passwordValue = passwordRegister.value.trim();
    if(passwordValue != '') {
        
        if(validatePasswordRegister()) {
            setSuccessForCPasswordRegister(passwordRegister);
        } else {
            setErrorForPasswordRegister(passwordRegister, 'Password must contain a lowercase, a uppercase and a number!')
        }
    } else {
        setErrorForPasswordRegister(passwordRegister, 'Please Enter Password!');
    }
}

function checkInputsCPasswordRegister() {
    passwordRegister.value.trim() === cpasswordRegister.value.trim() ? setSuccessForCPasswordRegister(cpasswordRegister) : setErrorForCPasswordRegister(cpasswordRegister, "Password DID NOT matched!");
}

function checkInputsEmailRegister() {
    if(emailRegister.value != '') {
        validateEmailRegister(emailRegister.value.trim()) ? setSuccessForEmailRegister(emailRegister) : setErrorForEmailRegister(emailRegister, 'Invalid Format!');
    } else {
        setErrorForEmailRegister(emailRegister, 'Please give an Email address!');
    }
}


function setErrorForUsernameRegister(input, message) {
    const parent = input.parentNode.parentNode;
    
    smallUsernameRegister.innerHTML = message;
    usernameRegister_error.classList.remove('color-green');
    usernameRegister_error.classList.add('color-red');  
    parent.classList.remove('success');
    parent.classList.add('error');
}

function setSuccessForUsernameRegister(input) {
    const parent = input.parentNode.parentNode;

    smallUsernameRegister.innerHTML = '';
    usernameRegister_error.classList.remove('color-green');
    usernameRegister_error.classList.add('color-red');  
    parent.classList.remove('error');
    parent.classList.add('success');
}

function setErrorForPasswordRegister(input, message) {
    const parent = input.parentNode.parentNode;
    
    smallPasswordRegister.innerHTML = message;
    passwordRegister_error.classList.remove('color-green');
    passwordRegister_error.classList.add('color-red');  
    parent.classList.remove('success');
    parent.classList.add('error');
}

function setSuccessForPasswordRegister(input) {
    const parent = input.parentNode.parentNode;

    smallPasswordRegister.innerHTML = ''
    passwordRegister.classList.remove('color-green');
    passwordRegister.classList.add('color-red');  
    parent.classList.remove('error');
    parent.classList.add('success');
}

function setErrorForEmailRegister(input, message) {
    const parent = input.parentNode.parentNode;
    
    smallEmailRegister.innerHTML = message;
    emailRegister_error.classList.remove('color-green');
    emailRegister_error.classList.add('color-red');  
    parent.classList.remove('success');
    parent.classList.add('error');
}

function setSuccessForEmailRegister(input) {
    const parent = input.parentNode.parentNode;

    smallEmailRegister.innerHTML = ''
    emailRegister_error.classList.remove('color-green');
    emailRegister_error.classList.add('color-red');  
    parent.classList.remove('error');
    parent.classList.add('success');
}

function setErrorForCPasswordRegister(input, message) {
    const parent = input.parentNode.parentNode;
    
    smallCPasswordRegister.innerHTML = message;
    cpasswordRegister_error.classList.remove('color-green');
    cpasswordRegister_error.classList.add('color-red');  
    parent.classList.remove('success');
    parent.classList.add('error');
}

function setSuccessForCPasswordRegister(input) {
    const parent = input.parentNode.parentNode;

    smallCPasswordRegister.innerHTML = ''
    cpasswordRegister_error.classList.remove('color-green');
    cpasswordRegister_error.classList.add('color-red');  
    parent.classList.remove('error');
    parent.classList.add('success');
}

function validateNameRegister() {
    console.log(1);
    var regex = /^[a-zA-Z0-9 ]{2,30}$/;
    console.log(regex.test(usernameRegister.value));
    if(regex.test(usernameRegister.value.trim())) {    
        return true;
    } return false;
}

function validatePasswordRegister() {
    var regex =  /^(?=.*\d)(?=.*[a-z])(?=.)[a-zA-Z0-9]{4,}$/;
    return regex.test(passwordRegister.value.trim());
}

function validateEmailRegister() {   
    var regex = /^([a-zA-Z0-9.]+)*@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9]+)*$/;
    return regex.test(emailRegister.value.trim());
}