<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
  <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="sidebarMenuLabel">Doorbell</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
      <ul class="nav flex-column">
        <li class="nav-item">
          <x-dashboard.nav-link href="/dashboard" :active="request()->is('dashboard')">
            <svg class="bi"><use xlink:href="#house-fill"/></svg>
            Dashboard
          </x-dashboard.nav-link>
        </li>
        <li class="nav-item">
          <x-dashboard.nav-link href="/dashboard/posts" :active="request()->is('dashboard/posts')">
            <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
            My Posts
          </x-dashboard.nav-link>
        </li>
        <li class="nav-item">
          <x-dashboard.nav-link href="/dashboard/authors/{{ Auth::user()->username }}" :active="request()->is('dashboard/authors/' . Auth::user()->username)">
            <svg class="bi"><use xlink:href="#people"/></svg>
            My Account
          </x-dashboard.nav-link>
        </li>
      </ul>
      
      @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
          <span>Administration</span>
        </h6>
        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <x-dashboard.nav-link href="/dashboard/admins/users" :active="request()->is('/dashboard/admins/users')">
              <svg class="bi"><use xlink:href="#people"/></svg>
              All Users
            </x-dashboard.nav-link>
          </li>
          <li class="nav-item">
            <x-dashboard.nav-link href="/dashboard/categories" :active="request()->is('dashboard/categories')">
            <svg class="bi"><use xlink:href="#puzzle"/></svg>
            Posts Category
            </x-dashboard.nav-link>
          </li>
        </ul>
      @endcan

      <hr class="my-3">
      <ul class="nav flex-column mb-auto">
        <li class="nav-item">
          <x-dashboard.nav-link href='/dashboard/authors/{{ Auth::user()->username }}/edit' :active="request()->is('dashboard/authors/' . Auth::user()->username.'/edit')">
            <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
            User Settings
          </x-dashboard.nav-link>
        </li>
        <li class="nav-item">
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="nav-link d-flex align-items-center gap-2">
              <svg class="bi"><use xlink:href="#door-closed"/></svg>
              Sign out
            </button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</div>