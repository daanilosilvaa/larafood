/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueToastify from "vue-toastify";
Vue.use(VueToastify);

Vue.component('orders-tenant', require('./components/Orders/OrdersTenant.vue').default)

const app = new Vue({
    el: '#app',
});
