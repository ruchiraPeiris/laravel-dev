@extends('layouts.app')

@section('content')
<div id="search-app">
    <div v-cloak>
        <div class="container" >
            <div class="row" id="posts">
                <div class="col-md-12">
                    <form action="search">
                        <div class="input-group input-group-sm">
                            <div class="icon-addon addon-md">
                                <input type="text" v-model="query" placeholder="What are you looking for?" class="form-control" @keyup="search()">
                            </div>
                            <span class="input-group-btn">
                                <button type="submit" class="btn-danger" v-if="!loading" >
                                    Search
                                </button>
                                <button type="button" class="btn-danger" v-if="loading" disabled="disabled">
                                    Searching...
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12">
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
            </div>
            <!-- Show all data posts from database -->
            <div class="row">
                <div class="col-md-12">
                    <div class="post-preview">
                        <div class="alert alert-warning">
                            <h2> 
                                Search
                            </h2>
                            <span>  
                                @foreach($posts as $post)
                                <p>
                                    <strong><a href="#">{{ $post->slug }}</a></strong>
                                    <span class="alert-danger">On {{ $post->created_at->format('M d,Y \a\t h:i a') }}</span>
                                </p>
                                @endforeach
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection