<div class="col-12 col-md-10 col-lg-8 my-2">
    <div class="card text-white bg-dark border">
        <div class="card-body">
            <h5 class="card-title">{{ $category->name }}</h5>
            <p class="card-text">{{ $category->description }}</p>
            @if (auth()->user()->role === 'admin')
                <div class="d-flex justify-content-end align-text-middle gap-2">
                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary">Edit <i class="ph ph-pencil-simple"></i></a>
                    <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Hapus <i class="ph ph-trash-simple"></i></button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>