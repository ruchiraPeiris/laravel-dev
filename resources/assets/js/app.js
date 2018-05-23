
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

const axios = require('axios');
Vue.prototype.$http = axios;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });


const search = new Vue({
    el: '#search-app',
    data: {
      	posts: [],
      	loading: false, 
      	noresult: false,
      	query: ''
  	},
  	methods: { 
    	search: function() {
        	// Clear the error message.
	        this.noresult = '';
	        // Empty the posts array so we can fill it with the new posts.
	        this.posts = [];
	        // Set the loading property to true, this will display the "Searching..." button.
	        this.loading = true;

	        // Making a get request to our API and passing the query to it.
	        this.$http.get('/api/search?q=' + this.query).then((response) => {
	        	console.log(response);
	            // If there was an error set the error message, if not fill the posts array.
	            response.data.error ? this.noresult = response.data.error : this.posts = response.data;
	            // The request is finished, change the loading to false again.
	            this.loading = false;
	            // Clear the query.
	            // this.query = '';
	        });
    	}
  	}
});