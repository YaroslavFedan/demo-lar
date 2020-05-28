window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
    require('admin-lte/dist/js/adminlte');

    //datatable
    require('datatables.net-bs4');
    require('datatables.net-buttons-bs4');

    //maxlength
    require('./src/jQuery.maxlength');

    //select2
    require('select2/dist/js/select2.full');

    //autocomplete
    require('bootstrap-autocomplete/dist/latest/bootstrap-autocomplete');
    //require('bootstrap-3-typeahead/bootstrap3-typeahead')

    //datepicker
    require('bootstrap-datepicker/dist/js/bootstrap-datepicker');

    //Inputmask
    require('inputmask/dist/inputmask');

    //Admin scripts must be last
    require('./src/admin');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.baseUrl = document.head.querySelector('meta[name="api-base-url"]').content;

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

window.Vue = require('vue');
//
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
//


if(document.getElementById('vueapp')){

    const files = require.context('./', true, /\.vue$/i)
    files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

    const vueapp = new Vue({
        el: '#vueapp'
    });
}


// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
