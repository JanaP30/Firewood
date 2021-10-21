'use strict';

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

const userEmail = document.getElementById('email');
const emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/gi;


const userPassword = document.getElementById('password');
const userConfirmPassword = document.getElementById('password-confirm');
const registerForm = document.getElementById('register-form');
const pwRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/gi;
const pwText = document.querySelector('.pw-text');

const nameErr = document.getElementById('name-error');
const emailErr = document.getElementById('email-error');
const pwErr = document.getElementById('password-error');
const passErr = document.getElementById('confirm-password-error');
const errMsg = document.querySelector('.error-msg');

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
   
});

// Name validation function
function nameValidation() {
    const nameErr = document.getElementById('name-error');
    if (userName.value === '') {
        nameErr.classList.remove('hide');
        nameErr.innerHTML= 'Please fill out this field.';
        userName.style.borderColor = 'tomato';
    } else {
        nameErr.classList.add('hide');
        userName.style.borderColor = '';
    }
};


// Email validation function
function emailValidation() {
    const emailErr = document.getElementById('email-error');
    if (userEmail.value === '') {
        emailErr.classList.remove('hide');
        emailErr.innerHTML= 'Please fill out this field.';
        userEmail.style.borderColor = 'tomato';
    } else if (userEmail.value.match(emailRegex)) {
        emailErr.classList.add('hide');
        userEmail.style.borderColor = '';
    } else {
        emailErr.classList.remove('hide');
        emailErr.innerHTML= 'Email is not valid';
        userEmail.style.borderColor = 'tomato';
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
    } else if (userPassword.value.match(pwRegex)) {
        pwErr.classList.add('hide');
        userPassword.style.borderColor = '';
        pwText.classList.add('hide');
    } else {
        pwErr.classList.remove('hide');
        pwErr.innerHTML= 'Password not valid';
        userPassword.style.borderColor = 'tomato';
        pwText.classList.remove('hide');
    }
};

// Password confirmation function
function passwordConfirmation() {
    const passErr = document.getElementById('confirm-password-error');
    if (userConfirmPassword.value === '') {
        passErr.classList.remove('hide');
        passErr.innerHTML= 'Please fill out this field.';
        userConfirmPassword.style.borderColor = 'tomato';
    }
    else if (userPassword.value === userConfirmPassword.value) {
        passErr.classList.add('hide');
        userConfirmPassword.style.borderColor = '';
    } else {
        passErr.classList.remove('hide');
        userConfirmPassword.style.borderColor = 'tomato';
        passErr.innerHTML = 'Password confirmation does not match';
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


// Hamburger Menu

function toggleMenu() {
    const getMenu = document.querySelector(".main-menu");
    getMenu.classList.toggle("hamburger");
}

const getHamburger = document.getElementById("toggle-bar");

getHamburger.addEventListener("click", toggleMenu); 


    // jquery
/*
const jquserPassword = $('#password');
const jquserConfirmPassword = $('#password-confirm');

$('#register-form').on('submit', function(event) {
    event.preventDefault();
    $(this).css({background: 'red'});
})*/