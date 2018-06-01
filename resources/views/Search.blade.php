@extends('layouts.app')

@section('content')
<div id="search-app">
    <div v-cloak>
        <div class="container" >
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