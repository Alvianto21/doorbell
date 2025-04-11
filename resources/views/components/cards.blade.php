<div class="row">
    @foreach ($posts->skip(1) as $post)
    <div class="col-md-4 mb-4">
        <div class="card" style="width: 18rem;">
            <div class="position-absolute bg-dark p-3-2"><a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{  $post->category->name }}</a></div>
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid kecil" alt="{{ $post->category->name }}">
            @else
                <img src="https://picsum.photos/500/500?random {{ $post }}" class="card-img-top" alt="picsum random images">
            @endif
            <div class="card-body">
                <h5 class="card-title">
                    <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark"> {{ $post->title }}</a>
                </h5>
                <div class="card-subtitle text-muted mb-2">
                    by <a href="/posts?authors={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a> | {{ $post->created_at->diffForHumans() }}
                    <p class="card-text">{!! Str::limit( $post['body'], 100 ) !!}</p>
                    <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>