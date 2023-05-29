<div>
    <div class="row justify-content-center align-items-center g-3 mb-2">
        <div class="col-8">
            <h2 class="text-center fw-bold">Populer</h2>
            <br>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                  <div class="card h-100">
                    <img src="/assets/cover.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100">
                    <img src="/assets/cover.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100">
                    <img src="/assets/cover.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                  </div>
                </div>
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
