<div class="col-12 col-md-10 col-lg-8 my-3" id="{{ $index }}">
    <div class="card text-white bg-dark border rounded">
        <div class="card-body">
            <h5 class="card-title fw-bold">
                <a href="{{ route('author.kategori.show', $id) }}" class="text-decoration-none text-white">{{ $name }}</a>
            </h5>
            <p class="card-text">{{ $description }}</p>
        </div>
    </div>
</div>