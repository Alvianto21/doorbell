<x-dashboard.layout>
	<x-slot:title>{{ $title }}</x-slot:title>
	<h2>{{ $title }}</h2>
	<div class="col-lg-8">
		<x-forms.edit-category :category='$category'></x-forms.edit-category>
	</div>
	
	<script>
		const name = document.querySelector('#name');
		const slug = document.querySelector('#slug');
	  
		name.addEventListener('change', function() {
		  fetch('/dashboard/categories/checkSlug?name=' + name.value)
			.then(response => response.json())
			.then(data => slug.value = data.slug)
		});
	   
	</script>
</x-dashboard.layout>