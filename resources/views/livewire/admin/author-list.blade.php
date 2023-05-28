<div>
    <div class="row justify-content-center align-items-center mb-2">
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <input type="text" wire:model.debounce.300ms='search' class="form-control" placeholder="Cari Pengguna..." id="cari_pengguna">
            </div>
        </div>
    </div>
    <div class="row justify-content-center align-items-center mb-2">
        <div class="col-12 col-md-10 col-lg-8 my-3">
            <table class="table table-bordered table-responsive border">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Pengguna</th>
                        <th scope="col">E-Mail</th>
                        <th scope="col">Tanggal Pembuatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($authors as $index => $author)
                        <tr>
                            <th scope="row">{{ $authors->firstItem() + $index }}</th>
                            <td>{{ $author->username }}</td>
                            <td>{{ $author->email }}</td>
                            <td>{{ $author->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row justify-content-end align-items-center mb-2">
        <div class="col col-md-6">
            {{ $authors->links() }}
        </div>
    </div>
</div>
