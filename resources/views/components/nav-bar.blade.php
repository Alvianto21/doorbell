<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Doorbell</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
          <x-navlink href="/" :active="request()->is('/')">Home</x-navlink>
        </li>
          <li class="nav-item">
            <x-navlink href="/about" :active="request()->is('about')">About
            </x-navlink>
          </li>
          <li class="nav-item">
            <x-navlink href="/contact" :active="request()->is('contact')">Contact
            </x-navlink>
          </li>
          <li class="nav-item">
            <x-navlink href="/posts" :active="request()->is('posts')">Blog
            </x-navlink>
          </li>
          <li class="nav-item">
            <x-navlink href="/categories" :active="request()->is('categories')">Categories
            </x-navlink>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          @auth
          <li class="nav-item">
            <form action="/logout" method="post" class="nav-link">
              @csrf
              <button type="submit" class="btn btn-link">Logout</button>
            </form>
          </li>
          @else
          <li class="nav-item">
            <x-navlink href="/login" :active="request()->is('login')">Login
            </x-navlink>
          </li>
          <li class="nav-item">
            <x-navlink href="/register" :active="request()->is('register')">Register
            </x-navlink>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>