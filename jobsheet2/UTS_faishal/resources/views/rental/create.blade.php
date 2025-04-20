<form action="{{ url('rentals/create') }}" method="POST" class="p-4" id="form-create" style="display: none;">
    @csrf
    <div class="card">
        <div class="card-header">
            <h5>Form Tambah Rental</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-outline">
                        <label>Nama User</label>
                        <select name="user_id" class="form-control">
                            @foreach ($users as $user)
                                <option value="{{ $user->user_id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-outline">
                        <label>Judul Buku</label>
                        <select name="book_id" class="form-control">
                            @foreach ($books as $book)
                                <option value="{{ $book->book_id }}">{{ $book->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6">
                    <div class="form-outline">
                        <label>Tanggal Pinjam</label>
                        <input type="date" name="rental_date" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-outline">
                        <label>Tanggal Kembali</label>
                        <input type="date" name="return_date" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="dipinjam">Dipinjam</option>
                            <option value="dikembalikan">Dikembalikan</option>
                        </select>
                        <small id="error-status" class="error-text form-text text-danger"></small>
                    </div>                  
                </div>
            </div>
        </div>
        <div class="modal-footer bg-light">
            <button type="button" onclick="closeFormCreate()" class="btn btn-warning">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>
