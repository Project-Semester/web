<div class="col-md-6">
    <div class="card text-bg-dark border">
        <div class="card-header d-flex justify-content-between">
            <h4>Ubah Profile Pengguna</h4>
            <a href="{{ route('admin.logout') }}" class="btn btn-outline-danger">Keluar</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.profile.update', auth()->id()) }}" method="POST" autocomplete="off">
            @method('PATCH')
            @csrf
                <div class="form-group mb-4">
                    <label class="col-form-label mb-2" for="username">Nama Pengguna</label>
                    <input type="text" class="form-control @if ($errors->has('user.username')) is-invalid @else is-valid @endif" placeholder="Nama Pengguna..." id="username" name="username" wire:model='user.username'>
                    @error('user.username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label class="col-form-label mb-2" for="email">E-mail</label>
                    <input type="email" class="form-control @if ($errors->has('user.email')) is-invalid @else is-valid @endif" placeholder="user@example.com" id="email" name="email" wire:model='user.email'>
                    @error('user.email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary fw-bold w-100 mb-4">Yuk Ubah!</button>
            </form>
        </div>
    </div>
</div>
