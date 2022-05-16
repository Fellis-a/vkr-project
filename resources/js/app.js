import Vue from 'vue'
import VueRouter from 'vue-router'
import VkrSingle from './components/VkrSingle.vue'
import VkrsIndex from './components/VkrsIndex.vue'

Vue.use(VueRouter)



/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;


const router = new VueRouter({
    base: __dirname,
    routes: [
      { path: '/vkr/:id', name: 'vkrSingle', component: VkrSingle },
      {
        path: '/vkrs',
        name: 'vkrAll',
        component: VkrsIndex,
        props: true
    },

    ]
  })
  export default router;
  

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('test', require('./components/Index.vue').default);
Vue.component('vkrs-index', require('./components/VkrsIndex.vue').default);

Vue.component('pagination', require('laravel-vue-pagination'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
    
});
