<x-dashboard.layout>
	<x-slot:title>{{ $title }}</x-slot:title>
	<h2>{{ $title }}</h2>
	<div class="col-lg-6">
		<x-forms.edit-user :user='$user'></x-forms.edit-user>
	</div>

	<form action="/dashboard/authors/{{ auth()->user()->username }}"
		method="post" class="d-inline">
		@method('delete')
		@csrf
		<button class="btn btn-danger text-dark border-0" onclick="return confirm('Are you sure?')">
		  <i class="fa fa-ban" aria-hidden="true"></i>
		  Delete Account
		</button>
	</form>

	@push('scripts')
	<!-- password validation and profile image preview -->
	<script src="{{ asset('js/profile.js') }}"></script>

	<!-- bs-custom-file-input -->
	<script src="{{ asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

	<!-- InputMask -->
	<script src="{{ asset('AdminLTE/plugins/moment/moment.min.js') }}"></script>

	<script src="{{ asset('AdminLTE/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
	@endpush
	
</x-dashboard.layout>