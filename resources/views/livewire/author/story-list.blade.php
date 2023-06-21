<div>
    <div class="row justify-content-center align-items-center g-3 mb-2">
      <h2 class="text-center fw-bold mb-2 mt-4">Cerita</h2>
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
