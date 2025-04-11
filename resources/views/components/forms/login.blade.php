<div class="row justify-content-center">
    <div class="col-md-4">
        <x-login-alert></x-loginalert>
        <main class="form-signin w-100 m-auto">
            <h1 class="h3 fw-normal text-center mt-4 mb-4">Please Login</h1>
            <form action="/login" method="post">
                @csrf      
                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-3">
                New User? <a href="/register">Register</a>
            </small>
        </main>    
    </div>    
</div>