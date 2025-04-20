<form id="formEditBook-{{ $book->book_id }}" style="display: none;" method="POST" action="{{ url('/books/' . $book->book_id . '/update') }}">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-header">
            <h5>Edit Buku: {{ $book->title }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-outline">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="title" value="{{ $book->title }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-outline">
                        <label>Penulis</label>
                        <input type="text" class="form-control" name="author" value="{{ $book->author }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-outline">
                        <label>Stok</label>
                        <input type="number" class="form-control" name="stock" value="{{ $book->stock }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer bg-light">
            <button type="button" class="btn btn-warning" onclick="closeEditForm({{ $book->book_id }})">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>
