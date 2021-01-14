require('./bootstrap');

window.Vue = require('vue');

import Datepicker from 'vuejs-datepicker';

Vue.component('search-order', require('./components/SearchOrder.vue').default)
Vue.component('search-api-prestashop', require('./components/SearchApiPrestashop.vue').default)

const app = new Vue({
    el: '#app'
});
