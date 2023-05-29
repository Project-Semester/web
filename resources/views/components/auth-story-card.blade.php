<div class="col-12 col-md-10 col-lg-8 my-3">
    <div class="card text-white bg-dark border">
        <div class="card-header py-3">
            {{ $story->user->username }}
            <small class="ms-2 text-info">{{ $story->created_at->diffForHumans() }}</small>
        </div>
        <div class="card-body">
            <a href="{{ route('author.story.show', $story->id) }}" class="card-title text-decoration-none text-white fw-bold fs-5">{{ $story->title }}</a>
            <p class="card-text mt-1">
                {{ $story->synopsis }}
            </p>
            @if ($option)
                @if (auth()->user()->role === 'author')
                    <div class="d-flex justify-content-end align-text-middle gap-2">
                        <a href="{{ route('author.story.edit', $story->id) }}" class="btn btn-primary">Edit <i class="ph ph-pencil-simple"></i></a>
                        <form action="{{ route('author.story.destroy', $story->id) }}" method="POST">
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