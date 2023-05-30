<div>
    <div class="row justify-content-center align-items-center g-3 mb-2">
        <div class="col-8">
            <h2 class="text-center fw-bold">Populer</h2>
            <br>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($stories as $story)
                <div class="col">
                  <div class="card bg-dark border h-100">
                    <img src="/assets/cover.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title fw-bold">{{ $story->title }}</h5>
                      <p class="card-text">{{ $story->synopsis }}</p>
                    </div>
                  </div>
                </div>
                @endforeach
            </div>
            <hr class="solid opacity-50">
        </div>
        <div class="col-8">
            <div class="form-group">
                <input type="text" wire:model.debounce.300ms='search' class="form-control" placeholder="Cari Cerita..." id="cari_kategori">
            </div>
        </div>
    </div>
    <div class="row justify-content-center align-items-center">
        @foreach ($stories as $story)
            <x-auth-story-card :story="$story" />
        @endforeach
    </div>
</div>
