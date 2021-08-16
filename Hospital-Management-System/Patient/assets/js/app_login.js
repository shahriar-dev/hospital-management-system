const inputs = document.querySelectorAll(".form__input");
const username = document.getElementById('username');
const password = document.getElementById('password');
const username_error = document.getElementById('username-error');
const smallUsername = username_error.querySelector('small');
const password_error = document.getElementById('password-error');
const smallPassword = password_error.querySelector('small');


function addFocus() {
    let parent = this.parentNode.parentNode;
    parent.classList.add("focus");
}

function removeFocus() {
    let parent = this.parentNode.parentNode;
    if(this.value === "") {
        parent.classList.remove("focus");
    }
}

inputs.forEach(inputs => {
    inputs.addEventListener("focus", addFocus);
    inputs.addEventListener("blur", removeFocus);
})

inputs.forEach((inputs, index) => {
    username.addEventListener('keyup', checkInputsUsername);
    // username.addEventListener('click', checkInputsUsername);
    password.addEventListener('keyup', checkInputsPassword);
    // password.addEventListener('click', checkInputsPassword);

})

// password.forEach(username => {
//     target.addEventListener('keypress', checkInputsPassword);
// })

function checkInputsUsername(index) {   
    const usernameValue = username.value.trim();
    if(usernameValue != '') {
        if(validateName()) {
            setSuccessForUsername(username);
        } else {
            setErrorForUsername(username, 'Username can only contain uppercase, lowercase and digit!');
        }        
    } else {
        setErrorForUsername(username, 'Username cannot be blank!');
    }
}

function checkInputsPassword() {
    const passwordValue = password.value.trim();
    if(passwordValue === '') {
        setErrorForPassword(password, 'GIVE Password!');
    } else {
        setSuccessForPassword(password);
    }
}

function setErrorForUsername(input, message) {
    const parent = input.parentNode.parentNode;
    
    smallUsername.innerHTML = message;
    username_error.classList.remove('color-green');
    username_error.classList.add('color-red');  
    parent.classList.remove('success');
    parent.classList.add('error');
}

function setSuccessForUsername(input) {
    const parent = input.parentNode.parentNode;

    smallUsername.innerHTML = '';
    username_error.classList.remove('color-green');
    username_error.classList.add('color-red');  
    parent.classList.remove('error');
    parent.classList.add('success');
}

function setErrorForPassword(input, message) {
    const parent = input.parentNode.parentNode;
    
    smallPassword.innerHTML = message;
    password_error.classList.remove('color-green');
    password_error.classList.add('color-red');  
    parent.classList.remove('success');
    parent.classList.add('error');
}

function setSuccessForPassword(input) {
    const parent = input.parentNode.parentNode;

    smallPassword.innerHTML = ''
    password_error.classList.remove('color-green');
    password_error.classList.add('color-red');  
    parent.classList.remove('error');
    parent.classList.add('success');
}

function validateName() {
    var regex = /^[a-zA-Z0-9 ]{2,30}$/;
    if(regex.test(username.value)) {
        return true;
    } return false;
}