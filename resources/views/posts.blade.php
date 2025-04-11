<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <x-forms.search></x-forms.search>
    @if ($posts->isEmpty())
        <p class="text-center">No posts found.</p>
        <a href="/posts" class="block">&laquo; Back to All posts</a>
    @else
        <div class="container py-8">
            <x-card :post='$posts[0]'></x-card>
            <x-cards :posts='$posts'></x-cards>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
    <footer class="text-center">
        <a href="https://picsum.photos/images">&copy; Random images by Lorem Picsum</a>
    </footer>
</x-layout>