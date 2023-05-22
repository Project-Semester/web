<div class="col-12 col-md-10 col-lg-8 my-3">
    <div class="card text-white bg-dark border">
        <div class="card-header py-3">
            {{ $story->user->username }}
            <small class="ms-2 text-info">{{ $story->created_at->diffForHumans() }}</small>
        </div>
        <div class="card-body pb-5">
            <a href="" class="card-title text-decoration-none text-white fw-bold fs-5">{{ $story->title }}</a>
            <p class="card-text mt-1">
                {{ $story->synopsis }}
            </p>
        </div>
    </div>
</div>