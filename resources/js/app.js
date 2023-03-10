/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


window.Axios = require('axios').default;
window.VueRouter = require('vue-router').default;

window.eventBus = new Vue({});
import Notifications from 'vue-notification'
 
/*
or for SSR:
import Notifications from 'vue-notification/dist/ssr.js'
*/
 
Vue.use(Notifications)
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
const youtubeDashboard = Vue.component('youtube-dashboard', require('./youtube/YoutubeDashboard.vue').default);
const videoDetail = Vue.component('video-detail', require('./youtube/VideoDetail.vue').default);
const myPlaylist = Vue.component('my-playlists', require('./youtube/MyPlaylists.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//define the vue route
const routes = [
{
    name: "youtubeDashboard",
    path: "/",
    component: youtubeDashboard
},
{
    name: "videoDetail",
    path: "/video/:id",
    component: videoDetail
},
{
    name: "myPlaylist",
    path: "/user/myplaylist",
    component: myPlaylist
},]

//register modules
Vue.use(VueRouter,axios);

const router = new VueRouter({ mode: 'hash', routes: routes});

new Vue(
    Vue.util.extend(
        { router }
        )
    ).$mount('#app')