<x-dashboard.layout>
	<x-slot:title>{{ $title }}</x-slot:title>
	<h2>{{ $title }}</h2>
	<x-alert></x-alert>
	<div class="table-responsive small col-lg-6">
		<a href="/dashboard/categories/create" class="btn btn-block btn-outline-primary btn-sm mb-3 tombolpost"><i class="fa fa-plus" aria-hidden="true"></i>Create New Category</a>
		<table id="table1" class="table table-bordered table-hover" aria-describedby="table_info">
			<thead>
		  	<tr>
				<th scope="col">#</th>
				<th scope="col">Category Name</th>
				<th scope="col">Action</th>
		  	</tr>
			</thead>
			<tbody>
				@foreach ($categories as $category)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $category->name }}</td>
						<td>
							<a href="/dashboard/categories/{{ $category->slug }}/edit"class="badge bg-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
							<form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
								@method('delete')
								@csrf
								<button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="fa fa-ban" aria-hidden="true"></i></button>
							</form>
						</td>
		  			</tr>
				@endforeach
			</tbody>
	  	</table>
	</div>

	<style>
		.tombolpost {
    		width: 300px;
  		}
	</style>

	@push('scripts')
	<!-- DataTables  & Plugins -->
	<script src="{{ asset('/js/tableRes.js') }}"></script>

	<script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>

  	<script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

  	<script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>

  	<script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
	@endpush
  </x-dashboard>