<x-layout>
	<x-slot:title>{{ $title }}</x-slot>
	<p>Welcome to Doorbell Contact page</p>
	<ul>
		<li>Email: {{ $email }}</li>
		<li>Phone: {{ $phone }}</li>
		<li>Facebook: {{ $fb }}</li>
		<li>Instagram: {{ $ig }}</li>
	</ul>
</x-layout>
