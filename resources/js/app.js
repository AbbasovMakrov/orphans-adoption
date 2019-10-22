

require('./bootstrap');

window.Vue = require('vue');
//Vue.component('get-orphans', require('./components/get-orphans.vue').default);
Vue.component('locations', require('./components/locations.vue').default);
Vue.component('search-users', require('./components/SearchUsers').default);
Vue.component('search-orphans', require('./components/SearchOrphans').default);

const app = new Vue({
    el:"#app",
});
