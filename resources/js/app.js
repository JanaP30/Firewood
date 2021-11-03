import axios from "axios";
import { data, post } from "jquery";
import { config } from './config.js';



// /**
//  * First we will load all of this project's JavaScript dependencies which
//  * includes Vue and other libraries. It is a great starting point when
//  * building robust, powerful web applications using Vue and Laravel.
//  */

const { Input } = require("postcss");

// require('./bootstrap');

// window.Vue = require('vue').default;

// /**
//  * The following block of code may be used to automatically register your
//  * Vue components. It will recursively scan this directory for the Vue
//  * components and automatically register them with their "basename".
//  *
//  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
//  */

// // const files = require.context('./', true, /\.vue$/i)
// // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

// const app = new Vue({
//     el: '#app',
// });

//sanjin
//plain JS

// let userPassword = document.getElementById('password').value;
// let confirmPassword = document.getElementById('password-confirm');

// function matchPassword() {   
//     if(userPassword != confirmPassword)  
//     {   
//       alert("Passwords did not match");  
//     } else {  
//       alert("Password created successfully");  
//     }  
//   }  

//const getId = (elemId) => document.getElementById(elemId);


//const nameRegex = /^[ a-zA-Z\-\’]+$/gi;
//const userNameElem = getId('name');
//const userEmailElem = getId('email');
//const emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/gi;

//const userPasswordElem = getId('password');
//const userConfirmPasswordElem = getId('password-confirm');
//const registerForm = getId('register-form');
//const pwRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/gi;
//const pwText = document.querySelector('.pw-text');

//const nameErr = getId('name-error');
//const emailErr = getId('email-error');
//const pwErr = getId('password-error');
//const passErr = getId('confirm-password-error');
//const errMsg = document.querySelector('.error-msg');


// REGISTER FORM VALIDATION
// console.log(document.getElementById('register-form'));
document.getElementById('register-form') && document.getElementById('register-form').addEventListener('submit', function(event) {
    
    event.preventDefault();
    console.log(event);
    const target   = event.target;
    const formData = {};

    for (let i = 0; i < target.length - 1; i++) {
        formData[target.elements[i].getAttribute("name")] = target.elements[i].value;
    }

    /*
    // Storing data in local storage
    const formDataString = JSON.stringify(formData);
    localStorage.setItem('formData', formDataString);
    
    const formDataObject = JSON.parse(localStorage.getItem('formData'));
    
    console.log(localStorage);
    */

    // Calling register validation function


    const validInputsReg = registerValidation(formData);
    
    if (!validInputsReg) {
        return;
    }

    
    //axios req

    
    
   /* const formData = {
        name: userName,
        email: userEmail,
        password: userPassword,
    }*/

    axios(`${config.baseURL}/api/v1/register`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }, 
        data: formData
    })
    .then(response => {
        window.location.href = '/login';
    })
    .catch(error => {
        console.log(error);
    })
});


function registerValidation() {
    //validate    
    
    // Name validation
    const nameValid = nameValidation();
    if (!nameValid) {
        console.log('Name is not valid!');
        // validationErrors.push('Name is not valid!');
    }

    // Email validation
    const emailValid = emailValidation();
    if (!emailValid) {
        console.log('Email is not valid!');
        // validationErrors.push('Email is not valid!');
    }
    
    // Password validation
    const passwordValid = passwordValidation();
    if (!passwordValid) {
        console.log('Password is not valid!');
        // validationErrors.push('Password is not valid!');
    }
    
    // Password confirmation
    const passwordConfirmationValid = passwordConfirmation();
    if (!passwordConfirmationValid) {
        console.log('Password confirmation is not valid!');
        // validationErrors.push('Password confirmation is not valid!');
    }

    console.log(nameValid, emailValid, passwordValid, passwordConfirmationValid)
    return nameValid && emailValid && passwordValid && passwordConfirmationValid;
    /*
    if (!nameValid || !emailValid || !passwordValid || !passwordConfirmationValid) {
        return false;
    } else {
        return true;
    }*/
}

// LOG IN FORM VALIDATION

document.getElementById('login-form') && document.getElementById('login-form').addEventListener('submit', function(event) {
    
    event.preventDefault();

    const target   = event.target;
    const loginFormData = {};

    for (let i = 0; i < target.length - 1; i++) {
    loginFormData[target.elements[i].getAttribute("name")] = target.elements[i].value;
    }
    
    console.log(loginFormData);

    const validInputsLog = loginValidation(loginFormData);

    if (!validInputsLog) {
        return;
    }

    // axios req
/*
    const loginFormData = {
        email: document.getElementById('email').value,
        password: document.getElementById('password'),value
    }*/

    
    axios(`${config.baseURL}/api/v1/login`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
            },
        data: loginFormData
    })
        .then(response => {
            window.location.href = '/';
        })
        .catch(error => {
            console.log(error);
        })
    }
);


function loginValidation() {
   
    // Email validation
    const emailValid = emailValidation();
    if (!emailValid) {
        console.log('Email is not valid!');
        //loginErrors.push('Email is not valid!');
    }
   
    // Password validation
    const passwordValid = passwordValidation();
    if (!passwordValid) {
        console.log('Password is not valid!');
        //loginErrors.push('Password is not valid!');
    }

    return emailValid && passwordValid;
}

// VALIDATION FUNCTIONS

// Name validation function
function nameValidation() {
    const nameRegex = /^[ a-zA-Z\-\’]+$/gi;
    const nameErr = document.getElementById('name-error');
    const userNameElem = document.getElementById('name');
    if (userNameElem.value === '') {
        nameErr.classList.remove('hide');
        nameErr.innerHTML = 'Please fill out this field.';
        userNameElem.classList.add('border-color');
        return false;
    } else if (!userNameElem.value.match(nameRegex)) {
        nameErr.classList.remove('hide');
        nameErr.innerHTML = 'Name is not valid';
        userNameElem.classList.add('border-color');
        return false;
    }
    //
    nameErr.classList.add('hide');
    userNameElem.classList.remove('border-color'); 
    return true;
};


// Email validation function
function emailValidation() {
    const emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/gi;
    const emailErr = document.getElementById('email-error');
    const userEmailElem = document.getElementById('email');
    if (userEmailElem.value === '') {
        emailErr.classList.remove('hide');
        emailErr.innerHTML= 'Please fill out this field.';
        userEmailElem.classList.add('border-color');
        return false;
    } else if (!userEmailElem.value.match(emailRegex)) {
        emailErr.classList.remove('hide');
        emailErr.innerHTML= 'Email is not valid';
        userEmailElem.classList.add('border-color');
        return false;
    } else {
        emailErr.classList.add('hide');
        userEmailElem.classList.remove('border-color');
        return true;
    }
};


// Password validation function
function passwordValidation() {
    const pwRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/gi;
    const pwErr = document.getElementById('password-error');
    const pwText = document.querySelector('.pw-text');
    const userPasswordElem = document.getElementById('password');
    if (userPasswordElem.value === '') {
        pwErr.classList.remove('hide');
        pwErr.innerHTML= 'Please fill out this field.';
        userPasswordElem.classList.add('border-color');
        pwText.classList.remove('hide');
        return false;
    } else if (!userPasswordElem.value.match(pwRegex)) {
        pwErr.classList.remove('hide');
        pwErr.innerHTML= 'Password not valid';
        userPasswordElem.classList.add('border-color');
        pwText.classList.remove('hide');
        return false;
    } else {
        pwText.classList.add('hide');
        pwErr.classList.add('hide');
        userPasswordElem.classList.remove('border-color');
        return true;
    }
};

// Password confirmation function
function passwordConfirmation() {
    const passErr = document.getElementById('confirm-password-error');
    const userConfirmPasswordElem = document.getElementById('password-confirm');
    const userPasswordElem = document.getElementById('password');
    if (userConfirmPasswordElem.value === '') {
        passErr.classList.remove('hide');
        passErr.innerHTML= 'Please fill out this field.';
        userConfirmPasswordElem.classList.add('border-color');
        return false;
    }
    else if (userPasswordElem.value !== userConfirmPasswordElem.value) {
        passErr.classList.remove('hide');
        userConfirmPasswordElem.classList.add('border-color');
        passErr.innerHTML = 'Password confirmation does not match';
        return false;
    } else {
        passErr.classList.add('hide');
        userConfirmPasswordElem.classList.remove('border-color');
        return true;
    }
};

document.getElementById('name') && document.getElementById('name').addEventListener('focus', function(event) {
    //validation
    // event.preventDefault();
    const userNameElem = document.getElementById('name');
    const nameErr = document.getElementById('name-error');
    nameErr.classList.add('hide');
    userNameElem.classList.remove('border-color'); 
    // userNameElem.style.borderColor = '';
});

document.getElementById('email') && document.getElementById('email').addEventListener('focus', function(event) {
    //validation
    //event.preventDefault();
    const userEmailElem = document.getElementById('email');
    const emailErr = document.getElementById('email-error');
    emailErr.classList.add('hide');
    userEmailElem.classList.remove('border-color'); 
    // userEmailElem.style.borderColor = '';
});

document.getElementById('password') && document.getElementById('password').addEventListener('focus', function(event) {
    //validation
   // event.preventDefault();
    const userPasswordElem = document.getElementById('password');
    const pwErr = document.getElementById('password-error');
    pwErr.classList.add('hide');
    userPasswordElem.classList.remove('border-color'); 
    //userPasswordElem.style.borderColor = '';
});

document.getElementById('password-confirm') && document.getElementById('password-confirm').addEventListener('focus', function(event) {
    //validation
   // event.preventDefault();
    const userConfirmPasswordElem = document.getElementById('password-confirm');
    const passErr = document.getElementById('confirm-password-error');
    passErr.classList.add('hide');
    userConfirmPasswordElem.classList.remove('border-color'); 
    //userConfirmPasswordElem.style.borderColor = '';
});



// HAMBURGER MENU
/*
const hamburger = getId('hamburger');
const navMenu = getId('nav-menu');

hamburger.addEventListener('click', function() {
    hamburger.classList.toggle('active');
    navMenu.classList.toggle('active');
});
*/


    // jquery
/*
const jquserPassword = $('#password');
const jquserConfirmPassword = $('#password-confirm');

$('#register-form').on('submit', function(event) {
    event.preventDefault();
    $(this).css({background: 'red'});
})*/

// AJAX/AXIOS

// napraviti async function koji vraca ordere i koristi await I try/catch blokove

// AXIOS ORDERS

axios.get(`${config.baseURL}/api/v1/get-orders`, {
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    }
})
.then(response => {
   
    // for (let i = 0; i < response.data.orders.length; i++) {
    //     const orderTable = document.getElementById('order-table');
    //     const orderTableRow = document.createElement('tr');
    //     orderTableRow.style.backgroundColor = 'red';
    //     orderTable.appendChild(orderTableRow);
    //     Object.keys(response.data.orders[i]).forEach(key) => {
    //       const orderTableCell = document.createElement('td');
    //       orderTableCell.innerHTML = response.data.orders[i][key];
    //       orderTableRow.appendChild(orderTableCell);
    //     });
    // }
    const loader = document.getElementById('loader');
    loader.classList.add('hide');
    for (let i = 0; i < response.data.orders.length; i++) {
        const orderTable = document.getElementById('order-table');
        orderTable.classList.remove('hide');
        const orderTableRow = document.createElement('tr');
        orderTableRow.classList.add('tr');
        orderTable.appendChild(orderTableRow);
        for (let j = 0; j < 9; j++) {
            const orderTableCell = document.createElement('td');
            orderTableCell.classList.add('td');
            switch(j) {
                case 0:
                    orderTableCell.innerHTML = response.data.orders[i].id;
                    break;
                case 1:
                    orderTableCell.innerHTML = response.data.orders[i].first_name;
                    break;
                case 2:
                    orderTableCell.innerHTML = response.data.orders[i].last_name;
                    break;
                case 3:
                    orderTableCell.innerHTML = response.data.orders[i].address;
                    break;
                case 4:
                    orderTableCell.innerHTML = response.data.orders[i].phone_number;
                    break;
                case 5:
                    orderTableCell.innerHTML = response.data.orders[i].product_type_id;
                    break;
                case 6:
                    orderTableCell.innerHTML = response.data.orders[i].product_id;
                    break;
                case 7:
                    orderTableCell.innerHTML = response.data.orders[i].quantity;
                    break;
                case 8:
                    const date = new Date(response.data.orders[i].created_at);
                    const dateString = ('0' + date.getDate()).slice(-2) + '.' + ('0' + (date.getMonth()+1)).slice(-2) + '.' + date.getFullYear() + '. ' + ('0' + date.getHours()).slice(-2) + ':' + ('0' + date.getMinutes()).slice(-2);
                    orderTableCell.innerHTML = dateString;
                    break;
                default:
             }
            orderTableRow.appendChild(orderTableCell);
        }
    }
})
.catch(error => {
    console.log(error);
});



// JQUERY
/*
$(function() {
    const jquserName = $('#name');
    const jquserEmail = $('#email');
    const jquserPassword = $('#password');
    const jquserConfirmPassword = $('#password-confirm');
    const jqregisterForm = $('#register-form');
    const jqpwText = $('.pw-text');
    const jqnameErr = $('#name-error');
    const jqemailErr = $('#email-error');
    const jqpwErr = $('password-error');
    const jqpassErr = $('confirm-password-error');
    const jqerrMsg = $('.error-msg');

    jqregisterForm.on('submit', function(event) {
        event.preventDefault();
    })
    
});
*/

// HAMBURGER MENU

const hamburger = document.getElementById('hamburger');
const navMenu = document.getElementById('nav-menu');
const navbar = document.getElementById('navbar');

hamburger.addEventListener('click', function() {
    hamburger.classList.toggle('active');
    navMenu.classList.toggle('active');
});

document.onclick = function(e) {
    if(e.target.id !== 'hamburger' && e.target.id !== 'nav-menu' && e.target.id !== 'navbar') {
        hamburger.classList.remove('active');
        navMenu.classList.remove('active');
    }
}


// HAMBURGER MENU JQUERY
/*
const jqhamburger = $('#hamburger');
const jqnavMenu = $('#nav-menu');

jqhamburger.on('click', function() {
    jqhamburger.toggleClass('active');
    jqnavMenu.toggleClass('active');
});*/








// REGISTER axios




// LOG IN axios

// slusamo event na login dugmetu
    // pokupimo vrijednosti sa inputa
    // validacija
    // submitamo vrijednosti
    // success: redirect /home
    // error: ipisati error


/*
const loginBtn = document.getElementById('login-btn');
loginBtn.addEventListener('submit', function (e) {
    const mailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    if (mailInput.value.match(emailValidation) && passwordInput.value.match(passwordValidation)) {
        console.log('success');
    } else {
        console.log('error');
    }
});
*/

/************************/
    

/*
    async function getOrders() {
        try {
            const order = await axios('https://run.mocky.io/v3/3001e677-ecda-4ba0-ba61-4e7077648a54');
            console.log(order);
        } catch(err) {
            alert(err);
        }
    }

    getOrders();
    */

    /*
    if (j === 0) {
        orderTableCell.innerHTML = response.data.orders[i].id
    }
    if (j === 1) {
        orderTableCell.innerHTML = response.data.orders[i].first_name
    }
    */


 