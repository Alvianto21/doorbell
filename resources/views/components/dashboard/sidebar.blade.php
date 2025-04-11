<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (Auth::user()->photo)
                    <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="brand-image img-circle elevation-3" style="opacity: .8" alt="{{ Auth::user()->name }}">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&color=7F9CF5&background=EBF4FF" alt="{{ Auth::user()->name }}" class="brand-image img-circle elevation-3" style="opacity: .8">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <x-dashboard.nav-link href="/dashboard" :active="request()->is('dashboard')">
                        <i class="fa fa-dashboard" aria-hidden="true"></i>
                        Dashboard
                    </x-dashboard.nav-link>
                </li>
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-copy" aria-hidden="true"></i>
                        <p>
                            My Posts
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <x-dashboard.nav-link href="/dashboard/posts/create" :active="request()->is('/dashboard/posts/create')">
                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                                <p>New Post</p>
                            </x-dashboard.nav-link>
                        </li>
                        <li class="nav-item">
                            <x-dashboard.nav-link href="/dashboard/posts" :active="request()->is('dashboard/posts')">
                            <i class="fas fa-table" aria-hidden="true"></i>
                            <p>All Posts</p>                             
                            </x-dashboard.nav-link>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fa fa-user-circle-o" aria-hidden="true"></i>
                        <p>
                            User Profile
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <x-dashboard.nav-link href="/dashboard/authors/{{ Auth::user()->username }}" :active="request()->is('dashboard/authors/' . Auth::user()->username)">
                                <i class="fa fa-user-md" aria-hidden="true"></i>
                                My Account
                            </x-dashboard.nav-link>
                        </li>
                        <li class="nav-item">
                            <x-dashboard.nav-link href="/dashboard/authors/{{ Auth::user()->username }}/edit" :active="request()->is('dashboard/authors/'. Auth::user()->username.'/edit')">
                                <i class="fa fa-cog" aria-hidden="true"></i>
                                <p>Edit Profile</p>
                            </x-dashboard.nav-link>
                        </li>
                    </ul>
                </li>
                @can('admin')
                    <li class="nav-item">
                        <a class="nav-link">
                            <i class="fa fa-user-secret" aria-hidden="true"></i>
                            <p>
                                Administrator
								<i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <x-dashboard.nav-link href="/dashboard/admins/users" :active="request()->is('/dashboard/admins/users')">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    All Users
                                </x-dashboard.nav-link>
                            </li>
                            <li class="nav-item">
                                <x-dashboard.nav-link href="/dashboard/categories" :active="request()->is('dashboard/categories')">
                                    <i class="fa fa-table" aria-hidden="true"></i>
                                    Posts Category
                                </x-dashboard.nav-link>
                            </li>
                        </ul>
                    </li>
                @endcan
            </ul>
        </nav>
    </div>
</aside>