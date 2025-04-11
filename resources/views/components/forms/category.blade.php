<form method="post" action="/dashboard/categories" class="mb-5">								
    @csrf
    <div class="mb-3 form-group">
      <label for="name" class="form-label">Category Name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
        @error('name')	
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror		
    </div>
    <div class="mb-3 form-group">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
        @error('slug')	
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Create New Category</button>
</form>