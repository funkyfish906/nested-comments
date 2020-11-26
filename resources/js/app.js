require('./bootstrap');

window.Vue = require('vue');

Vue.component('comments-list', require('./comments/list.vue').default);

const app = new Vue({
    el: '#app',
});
