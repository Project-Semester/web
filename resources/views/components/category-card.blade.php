<div class="col-12 col-md-10 col-lg-8 my-3" id="{{ $index }}">
    <div class="card text-white bg-dark border rounded">
        <div class="card-body">
            <h5 class="card-title">{{ $name }}</h5>
            <p class="card-text">{{ $description }}</p>
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.category.show', $id) }}" class="btn btn-primary">Lihat lebih...</a>
            </div>
        </div>
    </div>
</div>