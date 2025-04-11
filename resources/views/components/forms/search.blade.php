<div>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts" method="GET">
                @if (request('category')) 
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author')) 
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                @if (request('tag')) 
                    <input type="hidden" name="tag" value="{{ request('tag') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="search" class="form-control" placeholder="Search ..." name="search" id="search" value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>