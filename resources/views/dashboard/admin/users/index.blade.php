<x-dashboard.layout>
	<x-slot:title>{{ $title }}</x-slot:title>
	<h2>{{ $title }}</h2>
	<x-alert></x-alert>
	<div class="table-responsive col-lg-12">
		{{-- <a href="" class="btn btn-primary"><i data-feather="plus-circle"></i>Create New Post</a> --}}
		<table id="table1" class="table table-bordered table-hover" aria-describedby="table_info">
			<thead>
				<tr>
				<th scope="col">#</th>
				<th scope="col">Name</th>
				<th scope="col">Username</th>
				<th scope="col">Email</th>
				<th scope="col">Post</th>
				<th scope="col">Gender</th>
				<th scope="col">Phone Nomber</th>
				<th scope="col">Action</th>
		  		</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->username }}</td>
						<td>{{ $user->email }}</td>
						@if ($user->is_admin)
							<td>Admin</td>
						@else
							<td>User</td>
		  				@endif
						<td>{{ $user->gender }}</td>
						<td>{{ $user->phone }}</td>
						<td>
							{{-- <a href=""class="badge bg-info"><i data-feather="eye"></i></a> --}}
							<a href="/dashboard/admins/users/{{ $user->username }}"class="badge bg-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
							{{-- <form action="" method="post" class="d-inline">
								@method('delete')
								@csrf
								<button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i data-feather="x-circle"></i></button>
							</form> --}}
						</td>
		  			</tr>
				@endforeach
			</tbody>
	  	</table>
	</div>

	@push('scripts')
	<!-- DataTables  & Plugins -->
	<script src="{{ asset('/js/tableRes.js') }}"></script>

	<script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  
  	<script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  
  	<script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  
  	<script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
	@endpush
  </x-dashboard.layout>