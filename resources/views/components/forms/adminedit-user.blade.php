<form method="post" action="/dashboard/admins/users/{{ $user->username }}" class="mb-5" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3 form-group">
        @if ($user->photo)
            <img src="{{ asset('storage/' . $user->photo) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block img-fluid rounded-circle" style="max-height: 300px; max-width: 200px;">
        @else
            <img class="img-preview img-fluid mb-3 col-sm-5 img-fluid rounded-float" style="max-height: 300px; max-width: 200px;">
        @endif
        <div class="custom-file">
            <input type="hidden" name="oldPhoto" value="{{ $user->photo }}">
            <input class="form-control custom-file-input @error('photo') is-invalid @enderror" type="file" id="photo" name="photo" onchange="previewImage()">
            <label for="photo" class="form-label custom-file-label">Photo Profile</label>
        </div>
        @error('photo')	
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3 form-group">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control @error('username') is-invalid 
        @enderror" id="username" name="username">
        @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <small class="form-text text-muted">Leave blank if you don't want to change.</small>
    </div>
    <div class="mb-3 form-group">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid
        @enderror" id="name" name="name" value="{{ $user->name }}" required>
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3 form-group">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="tel" class="form-control @error('phone') is-invalid
        @enderror" id="phone" name="phone" data-inputmask="'mask': '9999 9999 9999 999'" data-mask inputmode="numeric" value="{{ $user->phone }}" required>
        @error('phone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3 form-group">
        <label for="gender" class="form-label">Gender</label>
        <select name="gender" class="form-select form-control custom-select @error('gender') is-invalid @enderror" id="gender" required>
            <option value="" disabled selected>>Select your gender</option>
            <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>male</option>
            <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>female</option>
        </select>
        @error('gender')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3 mt-3 form-group">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid 
        @enderror" id="email" name="email">
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <small class="form-text text-muted">Leave blank if you don't want to change.</small>
    </div>
    <div class="mb-3 form-group">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <small class="form-text text-muted">Leave blank if you don't want to change the password.</small>
    </div>
    <div class="mb-3 form-group">
        <label for="password_confirmation" class="form-label">Confirm New Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
    </div>

    <button type="submit" class="btn btn-primary" onclick="return validatePasswords()">Update Profile</button>
</form>