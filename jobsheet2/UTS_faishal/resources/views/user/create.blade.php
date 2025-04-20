<form action="{{ url('user/create') }}" method="POST" class="p-4" id="form-create" style="display: none;">
    @csrf
    <div class="card">
        <div class="card-header">
            <h5>Form tambah User</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-outline">
                        <label class="form-label" for="form8Example3">Nama</label>
                        <input type="text" id="form8Example3" class="form-control" name="name" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-outline">
                        <label class="form-label" for="form8Example3">Email</label>
                        <input type="email" id="form8Example3" class="form-control" name="email" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-outline">
                        <label class="form-label" for="form8Example3">Password</label>
                        <input type="password" id="form8Example3" class="form-control" name="password" />
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer bg-light">
            <button type="button" data-dismiss="modal" class="btn btn-warning"
                onclick="closeFormCreate()">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>