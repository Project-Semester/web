<div>
    <div class="row justify-content-center align-items-center g-3 mb-2">
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <input type="text" wire:model.debounce.300ms='search' class="form-control" placeholder="Cari Kategori..." id="cari_kategori">
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-2 align-self-end">
            <a href="{{ route('admin.category.create') }}" class="btn btn-outline-primary text-white w-100">Tambah <i class="ph ph-plus-square align-middle"></i></a>
        </div>
    </div>
    <div class="row justify-content-center align-items-center">
        @foreach ($categories as $index => $value)
            <x-category-card :index="$index" :id="$value->id" :name="$value->name" :description="$value->description" :color="$value->color" />
        @endforeach
    </div>
</div>
