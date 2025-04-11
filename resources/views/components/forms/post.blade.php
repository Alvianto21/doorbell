<form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">								
    @csrf
    <div class="mb-3 form-group">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
        @error('title')	
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
    <div class="mb-3 form-group">
        <label for="category" class="form-label">Category</label>
        <select class="form-select custom-select @error('category_id') is-invalid @enderror" name="category_id">
            <option selected disabled>Select category</option>
            @foreach ($categories as $category)
                @if (old('category_id') == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>	
                @endif
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3 form-group">
        <img class="img-preview img-fluid mb-3 col-sm-5">
        <div class="custom-file">
            <input class="form-control custom-file-input @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            <label for="image" name="image" class="form-label custom-file-label">Post image</label>
        </div>
        @error('image')	
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3 form-group">
        <label for="body" class="form-label">Body</label>
        @error('body')	
            <p class="text-danger">{{ $message }}</p>
        @enderror	
        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
        <trix-editor input="body"></trix-editor>
    </div>

    <button type="submit" class="btn btn-primary">Create post</button>
</form>