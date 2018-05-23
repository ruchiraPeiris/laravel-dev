<!DOCTYPE html>
<html>
<head>
	<title>Laravel 5 Instagram API</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">

	@foreach ($instagram_items as $instagram_item)
	<img src="{{ $instagram_item->images->thumbnail->url }}" alt="">
	@if ($instagram_item->caption)
	<p>{{ $instagram_item->caption->text }}</p>
	@endif
	<a href="{{ $instagram_item->link }}">{{ $instagram_item->link }}</a>
	@endforeach
	

</div>


</body>
</html>