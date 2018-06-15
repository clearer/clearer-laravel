
/*
 |--------------------------------------------------------------------------
 | Laravel Spark Bootstrap
 |--------------------------------------------------------------------------
 |
 | First, we will load all of the "core" dependencies for Spark which are
 | libraries such as Vue and jQuery. This also loads the Spark helpers
 | for things such as HTTP calls, forms, and form validation errors.
 |
 | Next, we'll create the root Vue application for Spark. This will start
 | the entire application and attach it to the DOM. Of course, you may
 | customize this script as you desire and load your own components.
 |
 */

require('spark-bootstrap');

require('./components/bootstrap');

Vue.component('dropdown', require('./components/Dropdown.vue'));
Vue.component('edit', require('./components/EditComponent.vue')); // may be redundant
Vue.component('modal', require('./components/Modal.vue'));
Vue.component('votes', require('./components/Votes.vue'));
Vue.component('move-forward', require('./components/MoveForward.vue'));

var app = new Vue({
    mixins: [require('spark')]
});
