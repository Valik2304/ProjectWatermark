import VueBootstrapTypeahead from 'vue-bootstrap-typeahead';
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./slick.min');
require('jquery');
require('./bootstrap');
require('select2');
require('./main');
require('./checkout');
require('./jquery.maskedinput.min');
require('vanilla-lazyload');
require('@fancyapps/fancybox');



window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('shop-cart', require('./components/ShopingCart').default);
Vue.component('item-row', require('./components/CartItemRow').default);

Vue.component('specification', require('./components/Specification').default);
Vue.component('specification-row', require('./components/SpecificationRow').default);
Vue.component('row-item', require('./components/SpecificationRowItem').default);
Vue.component('specification-archive', require('./components/SpecificationArchive').default);

// Vue.component('specification', require('./components/SpecificationMenu').default);
// Vue.component('item-row', require('./components/SpecificationMenuItem').default);

window.VueApp = new Vue({
    el: '#app'
});
window.VueSpec = new Vue({
    el: '#spec'
});


