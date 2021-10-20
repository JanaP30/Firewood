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
const pwRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/gi;



registerForm.addEventListener('submit', function(event) {
    //validation
    event.preventDefault();

    
    
    // Name
    nameValidation();
   

    // Email validation
    emailValidation();

    // Password validation
    passwordValidation();
    
    // Password confirmation
    const passErr = document.getElementById('confirm-password-error');
    if (userPassword.value === userConfirmPassword.value) {
        passErr.classList.add('d-none');
    } else {
        passErr.classList.remove('d-none');
    }
});


function emailValidation() {
    const emailErr = document.getElementById('email-error');
    if (userEmail.value === '') {
        emailErr.classList.remove('d-none');
        emailErr.innerHTML= 'Please fill out this field.';
    } else if (userEmail.value.match(emailRegex)) {
        emailErr.classList.add('d-none');
    } else {
        emailErr.classList.remove('d-none');
        emailErr.innerHTML= 'Email is not valid';
    }
};


function passwordValidation() {
    const pwErr = document.getElementById('password-error');
    console.log('first', pwErr);
    if (userPassword.value === '') {
        pwErr.classList.remove('d-none');
        pwErr.innerHTML= 'Please fill out this field.';
    } else if (userPassword.value.match(pwRegex)) {
        pwErr.classList.add('d-none');
    } else {
        console.log('second', pwErr);
        pwErr.classList.remove('d-none');
        pwErr.innerHTML= 'Your password must contain at least 8 characters, one numeric character, one special character, uppercase and lowercase letters';
    }
};

function nameValidation() {
    const nameErr = document.getElementById('name-error');
    console.log(nameErr);
    if (userName.value === '') {
        nameErr.classList.remove('d-none');
        nameErr.innerHTML= 'Please fill out this field.';
    } else {
        nameErr.classList.add('d-none');
    }
};


// jquery
/*
const jquserPassword = $('#password');
const jquserConfirmPassword = $('#password-confirm');

$('#register-form').on('submit', function(event) {
    event.preventDefault();
    $(this).css({background: 'red'});
})*/