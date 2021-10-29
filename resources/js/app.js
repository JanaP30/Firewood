import axios from "axios";
import { data } from "jquery";
import { config } from './config.js';

console.log(config);

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

const userName = document.getElementById('name');
const nameRegex = /^[ a-zA-Z\-\’]+$/gi;

const userEmail = document.getElementById('email');
const emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/gi;

const userPassword = document.getElementById('password');
const userConfirmPassword = document.getElementById('password-confirm');
const registerForm = document.getElementById('register-form');
const pwRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/gi;
const pwText = document.querySelector('.pw-text');

const nameErr = document.getElementById('name-error');
const emailErr = document.getElementById('email-error');
const pwErr = document.getElementById('password-error');
const passErr = document.getElementById('confirm-password-error');
const errMsg = document.querySelector('.error-msg');


const users = [];
const usersLogged = []; 

// REGISTER FORM VALIDATION

registerForm && registerForm.addEventListener('submit', function(event) {
    //validation
    event.preventDefault();

    // Name
    nameValidation();
    
   
    // Email validation
    emailValidation();
    

    // Password validation
    passwordValidation();
  
    
    // Password confirmation
    passwordConfirmation();
    


    const user = {
        name: userName.value,
        email: userEmail.value,
        password: userPassword.value
    }

    if (nameValidation() && emailValidation() && passwordValidation() && passwordConfirmation) {
        users.push(user);
        registerForm.reset();
    } else {
        console.log('User data is not valid');
    }
        console.log(users);
});

// LOG IN FORM VALIDATION

const loginForm = document.getElementById('login-form');


loginForm && loginForm.addEventListener('submit', function(event) {
    //validation
    event.preventDefault();

    // Email validation
    emailValidation();

    // Password validation
    passwordValidation();


    const userLogged = {
        email: userEmail.value,
        password: userPassword.value
    }

    if (emailValidation() && passwordValidation()) {
        usersLogged.push(userLogged);
        loginForm.reset();
    } else {
        console.log('User data is not valid');
    }
        console.log(usersLogged);
});

// VALIDATION FUNCTIONS

// Name validation function
function nameValidation() {
    const nameErr = document.getElementById('name-error');
    if (userName.value === '') {
        nameErr.classList.remove('hide');
        nameErr.innerHTML= 'Please fill out this field.';
        userName.style.borderColor = 'tomato';
        return false;
    } else if (userName.value.match(nameRegex)) {
        nameErr.classList.add('hide');
        userName.style.borderColor = '';
        return true;
    } else {
        nameErr.classList.remove('hide');
        nameErr.innerHTML= 'Name is not valid';
        userName.style.borderColor = 'tomato';
        return false;
    }
};


// Email validation function
function emailValidation() {
    const emailErr = document.getElementById('email-error');
    if (userEmail.value === '') {
        emailErr.classList.remove('hide');
        emailErr.innerHTML= 'Please fill out this field.';
        userEmail.style.borderColor = 'tomato';
        return false;
    } else if (userEmail.value.match(emailRegex)) {
        emailErr.classList.add('hide');
        userEmail.style.borderColor = '';
        return true;
    } else {
        emailErr.classList.remove('hide');
        emailErr.innerHTML= 'Email is not valid';
        userEmail.style.borderColor = 'tomato';
        return false;
    }
};


// Password validation function
function passwordValidation() {
    const pwErr = document.getElementById('password-error');
    if (userPassword.value === '') {
        pwErr.classList.remove('hide');
        pwErr.innerHTML= 'Please fill out this field.';
        userPassword.style.borderColor = 'tomato';
        pwText.classList.remove('hide');
        return false;
    } else if (userPassword.value.match(pwRegex)) {
        pwErr.classList.add('hide');
        userPassword.style.borderColor = '';
        pwText.classList.add('hide');
        return true;
    } else {
        pwErr.classList.remove('hide');
        pwErr.innerHTML= 'Password not valid';
        userPassword.style.borderColor = 'tomato';
        pwText.classList.remove('hide');
        return false;
    }
};

// Password confirmation function
function passwordConfirmation() {
    const passErr = document.getElementById('confirm-password-error');
    if (userConfirmPassword.value === '') {
        passErr.classList.remove('hide');
        passErr.innerHTML= 'Please fill out this field.';
        userConfirmPassword.style.borderColor = 'tomato';
        return false;
    }
    else if (userPassword.value === userConfirmPassword.value) {
        passErr.classList.add('hide');
        userConfirmPassword.style.borderColor = '';
        return true;
    } else {
        passErr.classList.remove('hide');
        userConfirmPassword.style.borderColor = 'tomato';
        passErr.innerHTML = 'Password confirmation does not match';
        return false;
    }
};

userName && userName.addEventListener('focus', function(event) {
    //validation
    event.preventDefault();
    nameErr.classList.add('hide');
    userName.style.borderColor = '';
});

userEmail && userEmail.addEventListener('focus', function(event) {
    //validation
    event.preventDefault();
    emailErr.classList.add('hide');
    userEmail.style.borderColor = '';
});

userPassword && userPassword.addEventListener('focus', function(event) {
    //validation
    event.preventDefault();
    pwErr.classList.add('hide');
    userPassword.style.borderColor = '';
});

userConfirmPassword && userConfirmPassword.addEventListener('focus', function(event) {
    //validation
    event.preventDefault();
    passErr.classList.add('hide');
    userConfirmPassword.style.borderColor = '';
});


// HAMBURGER MENU

const hamburger = document.getElementById('hamburger');
const navMenu = document.getElementById('nav-menu');

hamburger.addEventListener('click', function() {
    hamburger.classList.toggle('active');
    navMenu.classList.toggle('active');
});


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




// REGISTER









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


 