@props(['active' => false])
<a class="{{ $active ? 'nav-link d-flex align-items-center gap-2 active' : 'nav-link d-flex align-items-center gap-2' }}" aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>
    {{ $slot }}
</a>