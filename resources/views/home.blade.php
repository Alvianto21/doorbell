<x-layout>
	<x-slot:title>{{ $title }}</x-slot>
	<x-alert></x-alert>
	<p>Welcome to Doorbell page</p>
	<div class="container py-8">
		<x-card :post='$posts[0]'></x-card>
		<x-cards :posts='$posts'></x-cards>
	</div>
</x-layout>