@props(['active' => false])
<a class="{{ $active ? 'nav-link active text-white' : 'nav-link text-darkgrey' }} hubung" aria-current="{{ $active ? 'page' : 'false' }}"  {{ $attributes }}>{{ $slot }}</a>
