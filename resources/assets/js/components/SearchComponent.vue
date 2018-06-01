<template>
	<div class="search-area" style="position: relative;">
        <div class="search-from">
            <form action="search" class="form-inline my-2 my-lg-0">
                <input type="text" v-model="query" placeholder="What are you looking for?" class="form-control mr-sm-2" @keyup="search()" aria-label="Search">
                <button type="submit" class="btn btn-success" v-if="!loading" >
                    Search
                </button>
                <button type="button" class="btn btn-success" v-if="loading" disabled="disabled">
                    Searching...
                </button>
            </form>
        </div>
        <div class="search-results" style="position: absolute; top: 100%; left: 0; with: 100%; z-index: 1090; background: #fff; padding: 1rem;">
            <div class="post-preview" v-for="post in posts">
                <p>
                    <span class="well-sm">
                        <strong>
                            <a href="#">@{{ post.title }}</a>
                        </strong>
                    </span>
                    <span class="alert-danger">
                        On @{{ post.created_at }}
                    </span>
                </p>
            </div>
            <div class="alert alert-warning" v-if="noresult">
                <h2>
                    @{{ noresult }}
                </h2>
            </div>
        </div>
    </div>
</template>

<script>
	export default {
	    data: function () {
	    	return {
		      	posts: [],
		      	loading: false, 
		      	noresult: false,
		      	query: ''
		    }
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
		        	//console.log(response);
		            // If there was an error set the error message, if not fill the posts array.
		            response.data.error ? this.noresult = response.data.error : this.posts = response.data;
		            // The request is finished, change the loading to false again.
		            this.loading = false;
		            // Clear the query.
		            // this.query = '';
		        });
	    	}
	  	}
	};
</script>