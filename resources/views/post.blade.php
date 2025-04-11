<x-layout>
	<x-slot:title>{{ $title }}</x-slot>
	<article class="py-8 max-w-screen-mb">
		<h2 class="mb-1 text-3xl tracking-tight font-bold">{{ $post['title'] }}</h2>
		<div class="text-base text-orange-400">
			By <a href="/posts?authors={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a> |  {{ $post['created_at']->diffForHumans() }}
		</div>
			@if ($post->image)
				<img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="{{ $post->category->name }}">
			@else
				<img src="https://picsum.photos/500/400" alt="picsum random images" class="img-fluid">
			@endif
			<p class="my-4">{!! $post->body !!}</p>
			<a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back to posts</a>
	</article>
	<footer class="text-center">
		<a href="https://picsum.photos/images">&copy; Random images by Lorem Picsum</a>
	</footer>
</x-layout>