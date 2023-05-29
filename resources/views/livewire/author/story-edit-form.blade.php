  <div style="padding-top: 20px">
    <form action="{{ route('author.story.store') }}" method="POST" autocomplete="off">
      @csrf
      <div class="row">
        <div class="col-lg-4 col-md-7 col-sm-6">
          <div class="text-center">
            <div class="col">
              <img src="https://via.placeholder.com/200x300.png/c2c2c2/000000?Text=200x300" class="rounded-square w-60" alt="">
              <input type="file" class="form-control @if ($errors->has('cover')) is-invalid @elseif($cover == null) @else is-valid @endif" id="formFile" name="cover" wire:model='cover'>
              @error('cover')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-md-7 col-sm-6">
          <div class="card text-bg-dark">
            <div class="card-body">
                <div class="container">
                  <h3>Detail Cerita</h3>
                  <hr class="solid">
                  <h5>Judul Cerita</h5>
                  <input class="form-control form-control-sm @if ($errors->has('title')) is-invalid @elseif($title == null) @else is-valid @endif" type="text" placeholder="Tulis judul" aria-label=".form-control-sm example" name="title" wire:model='title'>
                    @error('title')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  <br>
                  <h5>Sinopsis</h5>
                    <div class="mb-3">
                      <textarea class="form-control @if ($errors->has('synopsis')) is-invalid @elseif($synopsis == null) @else is-valid @endif" id="exampleFormControlTextarea1" rows="5" name="synopsis" wire:model='synopsis'></textarea>
                      @error('synopsis')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  <h5>Pilih Kategori</h5>
                  <select class="form-select @if ($errors->has('category_id')) is-invalid @elseif($category_id == null) @else is-valid @endif" aria-label="Default select example" name="category_id" wire:model='category_id'>
                    @foreach ($categories as $category)
                      <option hidden selected>Pilih kategori</option>
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    @error('category_id')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </select>
                  <br>
                  <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary fw-bold w-20 mb-6">Yuk Publish</button>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  
