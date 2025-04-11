<x-layout>
	<x-slot name="title">Categories</x-slot>
	<div class="container py-8">
		<x-categories-card :categories='$categories'></x-cards>
	</div>

	<footer class="text-center">
		<a href="https://ui-avatars.com/">&copy; Random Random images by Lorem</a>
	</footer>

</x-layout>