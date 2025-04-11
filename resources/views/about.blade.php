<x-layout>
	<x-slot:title>{{ $title }}</x-slot>
	<p>Welcome to Doorbell About page</p>
	<h3>Owner: {{ $name }}</h3>
	<h3>Location: {{ $location }}</h3>
	<img src="img/{{ $img }}" alt="Creator.jpg" width="200" class="img-thumbnail rounded-circle">
</x-layout>
