// /**
//  * First we will load all of this project's JavaScript dependencies which
//  * includes Vue and other libraries. It is a great starting point when
//  * building robust, powerful web applications using Vue and Laravel.
//  */

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

const userPassword = document.getElementById('password');
const userConfirmPassword = document.getElementById('password-confirm');
const registerForm = document.getElementById('register-form');


const userEmail = document.getElementById('email');
const emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/gi;

registerForm.addEventListener('submit', function(event) {
    //validation
    event.preventDefault();

    // Email 
    

    // Password confirmation
    const passErr = document.getElementById('confirm-password-error');
    if (userPassword.value === userConfirmPassword.value) {
        passErr.classList.add('d-none');
    } else {
        passErr.classList.remove('d-none');
    }

});




// jquery
/*
const jquserPassword = $('#password');
const jquserConfirmPassword = $('#password-confirm');

$('#register-form').on('submit', function(event) {
    event.preventDefault();
    $(this).css({background: 'red'});
})*/