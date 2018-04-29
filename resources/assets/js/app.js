
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
    	catfiltre:''
    },
    methods:{
    	 updatefiltrep: function($event) {
        this.catfiltre=$event;
      },
    }
});
