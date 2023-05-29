{{-- <div class="container" style="padding-top: 20px;">
    <div class="card text-bg-dark">
        <div class="card-body">
            <div class="col-lg-10" style="text-align: center; padding-left: 200px;">
                <br>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="episode ....">
                <hr class="solid">
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label" ></label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="30" readonly></textarea>
                </div>
            </div>
            <div class="row justify-content-end align-items-end">
                <div class="col-7" style="padding-left: 50px">
                    <button type="button" class="btn btn-primary" fdprocessedid="xvilt">Submit Cerita</button>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="row justify-content-center align-items-center">
    <div class="col-md-6">
        <div class="card text-bg-dark border">
            <div class="card-header">
                <h4>Tambah Kategori Baru</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('author.episode.store', $story->id) }}" method="POST" autocomplete="off">
                @csrf
                    <div class="form-group mb-4">
                        <label class="col-form-label mb-2" for="title">Judul</label>
                        <input type="text" class="form-control @if ($errors->has('title')) is-invalid @elseif($title == null) @else is-valid @endif" placeholder="Judul..." id="title" name="title" wire:model='title'>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="description" class="form-label mb-2">Isi</label>
                        <textarea class="form-control @if ($errors->has('body')) is-invalid @elseif($body == null) @else is-valid @endif" id="body" placeholder="Isi..." name="body" wire:model='body' rows="6"></textarea>
                        @error('body')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary fw-bold w-100 mb-4">Yuk Tambah!</button>
                </form>
            </div>
        </div>
    </div>
</div>