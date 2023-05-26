<div class="col-12 col-md-10 col-lg-8 my-3">
    <div class="card text-white bg-dark border">
        <div class="card-header py-3">
            @if ($link)
                <a href="{{ route('admin.episode.show', $episode->id) }}" class="text-decoration-none text-white"><strong>{{ $episode->title }}</strong></a>
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