<div class="card mb-4">
    <div class="position-absolute bg-dark p-3-2"><a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{  $post->category->name }}</a></div>
    @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid kecil" alt="{{ $post->category->name }}">
    @else
        <img src="https://picsum.photos/400/400?random {{ $post }}" class="card-img-top" alt="picsum random images">
    @endif
    <div class="card-body">
        <h2 class="card-title">
            <a href="/posts/{{ $post['slug'] }}" class="text-decoration-none text-dark">{{ $post['title'] }}</a>
        </h2>
        <div class="text-base text-orange-400">
        By <a href="/posts?authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a> |  {{ $post['created_at']->diffForHumans() }}
        </div>
        <p class="card-text my-4">{!! Str::limit( $post['body'], 100 ) !!}</p>
        <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline">Read More &raquo;</a>
    </div>
</div>