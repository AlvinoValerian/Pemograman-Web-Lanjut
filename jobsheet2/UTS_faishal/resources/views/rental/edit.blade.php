<form id="formEditRental-{{ $rental->rentals_id }}" style="display: none;" method="POST" action="{{ url('/rentals/' . $rental->rentals_id . '/update') }}">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-header">
            <h5>Edit Rental</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-outline">
                        <label>Nama User</label>
                        <select name="user_id" class="form-control">
                            @foreach ($users as $user)
                                <option value="{{ $user->user_id }}" {{ $rental->user_id == $user->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-outline">
                        <label>Judul Buku</label>
                        <select name="book_id" class="form-control">
                            @foreach ($books as $book)
                                <option value="{{ $book->book_id }}" {{ $rental->book_id == $book->book_id ? 'selected' : '' }}>{{ $book->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6">
                    <div class="form-outline">
                        <label>Tanggal Pinjam</label>
                        <input type="date" name="rental_date" class="form-control" value="{{ $rental->rental_date }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-outline">
                        <label>Tanggal Kembali</label>
                        <input type="date" name="return_date" class="form-control" value="{{ $rental->return_date }}">
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="dipinjam" {{ old('status', $rental->status) == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                            <option value="dikembalikan" {{ old('status', $rental->status) == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                        </select>
                        <small id="error-status" class="error-text form-text text-danger"></small>
                    </div>                 
                </div>
            </div>
        </div>
        <div class="modal-footer bg-light">
            <button type="button" onclick="closeEditForm({{ $rental->rentals_id }})" class="btn btn-warning">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>
