<form action="{{ url('books/create') }}" method="POST" class="p-4" id="form-create" style="display: none;">
    @csrf
    <div class="card">
        <div class="card-header">
            <h5>Form Tambah Buku</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-outline">
                        <label class="form-label" for="form8Example3">Judul</label>
                        <input type="text" id="form8Example3" class="form-control" name="title" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-outline">
                        <label class="form-label" for="form8Example3">Penulis</label>
                        <input type="text" id="form8Example3" class="form-control" name="author" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-outline">
                        <label class="form-label" for="form8Example3">Stok</label>
                        <input type="number" id="form8Example3" class="form-control" name="stock" />
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer bg-light">
            <button type="button" data-dismiss="modal" class="btn btn-warning" onclick="closeFormCreate()">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>
