<x-dashboard.layout>
	<x-slot:title>{{ $title }}</x-slot:title>
	<h2>{{ $title }}</h2>
	<div class="col-lg-8">
		<x-forms.post :categories='$categories'></x-forms.post>
	</div>

	@push('styles')
	<!-- trix editor -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">

    <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
      }
    </style>
	@endpush

	@push('scripts')
	<!-- automatic slug and image preview -->
	<script src="{{ asset('/js/posts.js') }}"></script>

	<!-- trix js -->
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

	<!-- bs-custom-file-input -->
	<script src="{{ asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
	@endpush

</x-dashboard.layout>