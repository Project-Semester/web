<div class="row justify-content-center align-items-center">
    <div class="col-md-6">
        <div class="card text-bg-dark border">
            <div class="card-header">
                <h4>Tambah Kategori Baru</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.store') }}" method="POST" autocomplete="off">
                @csrf
                    <div class="form-group mb-4">
                        <label class="col-form-label mb-2" for="name">Nama</label>
                        <input type="text" class="form-control @if ($errors->has('name')) is-invalid @elseif($name == null) @else is-valid @endif" placeholder="Kategori Baru..." id="name" name="name" wire:model='name'>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="description" class="form-label mb-2">Deskripsi</label>
                        <textarea class="form-control @if ($errors->has('description')) is-invalid @elseif($description == null) @else is-valid @endif" id="description" placeholder="Deskripsi..." name="description" wire:model='description' rows="6"></textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary fw-bold w-100 mb-4">Yuk Tambah!</button>
                </form>
            </div>
        </div>
    </div>
</div>
