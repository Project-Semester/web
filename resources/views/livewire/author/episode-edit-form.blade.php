<div class="row justify-content-center align-items-center">
    <div class="col-md-6">
        <div class="card text-bg-dark border">
            <div class="card-header">
                <h4>Ubah Episode Baru</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('author.episode.update', $episode->id) }}" method="POST" autocomplete="off">
                @method('PATCH')
                @csrf
                    <div class="form-group mb-4">
                        <label class="col-form-label mb-2" for="title">Judul</label>
                        <input type="text" class="form-control @if ($errors->has('episode.title')) is-invalid @else is-valid @endif" placeholder="Judul..." id="title" name="title" wire:model='episode.title'>
                        @error('episode.title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="body" class="form-label mb-2">Isi</label>
                        <textarea class="form-control @if ($errors->has('episode.body')) is-invalid @else is-valid @endif" id="body" placeholder="Isi..." name="body" wire:model='episode.body' rows="6"></textarea>
                        @error('episode.body')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary fw-bold w-100 mb-4">Yuk Ubah!</button>
                </form>
            </div>
        </div>
    </div>
</div>