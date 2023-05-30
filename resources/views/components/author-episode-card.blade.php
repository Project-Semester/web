<div class="col-12 col-md-10 col-lg-8 my-3">
    <div class="card text-white bg-dark border">
        <div class="card-header py-3">
            @if ($link)
                <a href="{{ route('author.episode.show', $episode->id) }}" class="text-decoration-none text-white"><strong>{{ $episode->title }}</strong></a>
            @else
                <strong>{{ $episode->title }}</strong>
            @endif
            <small class="ms-2 text-info">{{ $episode->created_at->diffForHumans() }}</small>
        </div>
        <div class="card-body">
        @if ($body)
                <p>
                    {{ $episode->body }}
                </p>
        @endif
        @if ($option)
                @if (auth()->user()->role === 'author')
                    <div class="d-flex justify-content-end align-text-middle gap-2">
                        <a href="{{ route('author.episode.edit', $episode->id) }}" class="btn btn-primary">Edit <i class="ph ph-pencil-simple"></i></a>
                        <form action="{{ route('author.episode.destroy', $episode->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">Hapus <i class="ph ph-trash-simple"></i></button>
                        </form>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>