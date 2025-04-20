<form id="formEditUser-{{ $user->user_id }}" style="display: none;" method="POST" action="{{ url('/user/' . $user->user_id . '/update') }}">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-header">
            <h5>Edit User: {{ $user->name }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-outline">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-outline">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer bg-light">
            <button type="button" class="btn btn-warning" onclick="closeEditForm({{ $user->user_id }})">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>
