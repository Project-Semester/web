<div>
    <div class="row justify-content-center align-items-center g-3 mb-2">
        <div class="col-8">
            <div class="form-group">
                <input type="text" wire:model.debounce.300ms='search' class="form-control" placeholder="Cari Kategori..." id="cari_kategori">
            </div>
        </div>
    </div>
    <div class="row justify-content-center align-items-center">
        @foreach ($categories as $index => $value)
            <x-auth-categorycard :index="$index" :id="$value->id" :name="$value->name" :description="$value->description" :color="$value->color" />
        @endforeach
    </div>
</div>
