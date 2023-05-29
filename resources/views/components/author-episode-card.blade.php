<div class="col-12 col-md-10 col-lg-8 my-3">
    <div class="d-flex justify-content-end" style="padding-top: 20px">
        <a href="{{ route('author.episode.create') }}"><button type="submit" class="btn btn-primary fw-bold w-20 mb-6">Tambah Episode</button></a>
    </div>
    <div class="card text-white bg-dark border">
        <div class="card-header py-3">
            @if ($link)
                <a href="{{ route('author.episode.show', $episode->id) }}" class="text-decoration-none text-white"><strong>{{ $episode->title }}</strong></a>
            @else
                <strong>{{ $episode->title }}</strong>
            @endif
            <small class="ms-2 text-info">{{ $episode->created_at->diffForHumans() }}</small>
        </div>
        @if ($body)
            <div class="card-body pb-5">
                    {{ $episode->body }}
                </p>
            </div>
        @endif
    </div>
</div>