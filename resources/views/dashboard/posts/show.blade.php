<x-dashboard.layout>
	<x-slot:title>{{ $title }}</x-slot:title>

	<a href="/dashboard/posts"class="btn btn-info"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>

	<a href="/dashboard/posts/{{ $post->slug }}/edit"class="btn btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>

	<form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
		@method('delete')
		@csrf
		<button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><i class="fa fa-ban" aria-hidden="true"></i></button>
	</form>

	<article class="py-8 max-w-screen-mb">
		<h2 class="mb-1 text-3xl tracking-tight font-bold">{{ $post['title'] }}</h2>
		@if ($post->image)
			<div style="max-height: 400; overflow:hidden; margin-top: 5px; width: 300px;">
				<img src="{{ asset('storage/' . $post->image) }}" class="img-fluid kecil" alt="{{ $post->category->name }}">
			</div>
		@else
			<img src="https://picsum.photos/500/400" alt="picsum random images" class="img-fluid">
			@endif
		<p class="my-4">{!! $post->body !!}</p>
		<a href="/dashboard/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back to my posts</a>
	</article>

	<footer class="text-center">
		<a href="https://picsum.photos/images">Random images by Lorem Picsum</a>
	</footer>
	
</x-dashboard.layout>