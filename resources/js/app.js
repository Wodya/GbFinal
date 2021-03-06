/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
import { Datepicker } from 'vanillajs-datepicker';

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('register-component', require('./components/RegisterComponent.vue').default);
Vue.component('header-component', require('./components/HeaderComponent.vue').default);
Vue.component('search-step2-component', require('./components/SearchStep2Component.vue').default);
Vue.component('vue-circle', require('./components/SearchStep2Component.vue').default);
Vue.component('basket-component', require('./components/BasketComponent.vue').default);
Vue.component('orders-component', require('./components/OrdersComponent.vue').default);
const app = new Vue({
    el: '#app',
});
const elems = document.querySelectorAll('.datepicker_input');
console.log(elems);

for (const el of elems) {
    const datepicker = new Datepicker(el, {
        buttonClass: 'btn',
        format: 'dd.mm.yyyy',
        clearBtn: true,
        todayBtn: true,
    });
    // el.value = new Date().toISOString().split('T')[0].slice(0, 10);
}
// const elem = document.querySelector('input[name="foo"]');
// const datepicker = new Datepicker(elem, {});

