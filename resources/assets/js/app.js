

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}



/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import 'material-design-icons-iconfont' 
import 'vuetify/dist/vuetify.min.css' // Ensure you are using css-loader
window.Vue = require('vue');
import Vuetify from 'vuetify'
 
Vue.use(Vuetify)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('todo-list', require('./components/todolist.vue'));
Vue.component('categories', require('./components/categories'));

const app = new Vue({
    el: '#app',
    data:{
    	drawer:false,
    	catfiltre:0,
    },
    methods:{
    	 updatefiltrep: function($event) {
        this.catfiltre=$event;
      },
    }
});
