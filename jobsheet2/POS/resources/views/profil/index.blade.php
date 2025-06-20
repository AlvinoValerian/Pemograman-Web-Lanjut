@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>

        </div>
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <div class="card card-primary card-outline" style="width:20%;">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{ asset('storage/' . $profil->image) }}" alt="User profile picture" max-width="50px">
                        </div>

                        <h3 class="profile-username text-center">{{ $profil->nama }}</h3>

                        <p class="text-muted text-center">{{ $profil->username }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Kode Level</b> <a class="float-right">{{ $profil->level->level_kode }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Nama Level</b> <a class="float-right">{{ $profil->level->level_nama }}</a>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-sm-6">
                                <a onclick="modalAction('{{ url('user/' . $profil->user_id . '/edit_ajax') }}')"
                                    class="btn btn-primary btn-block"><b>Edit Profil</b></a>
                            </div>
                            <div class="col-sm-6">
                                <a onclick="modalAction('{{ url('profil/' . $profil->user_id . '/edit_image') }}')"
                                    class="btn btn-warning btn-block"><b>Edit Image</b></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"
        data-keyboard="false" data-width="75%" aria-hidden="true"></div>
@endsection

@push('css')
@endpush

@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }

    </script>
@endpush