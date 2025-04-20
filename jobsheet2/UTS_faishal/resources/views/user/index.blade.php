@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <button onclick="openFormCreate()" class="btn btn-sm btn-info mt-1">Tambah</button>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @include('user.create')
            <div class="p-4">
                <table class="table table-bordered table-striped table-hover table-sm w-100" id="table_user">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $data)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>
                                    <div style="display: inline-flex; gap: 8px;">
                                        <a><button type="button" onclick="openEditForm({{ $data->user_id }})"
                                                class="btn btn-warning btn-sm">Edit</button></a>
                                        <form id="form-delete-{{ $data->user_id }}"
                                            action="{{ url('/user/' . $data->user_id . '/delete') }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="confirmDelete({{ $data->user_id }})">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <div id="form-row-{{ $data->user_id }}" style="display: none;">
                                <div colspan="3">
                                    @include('user.edit', ['user' => $data])
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function openFormCreate() {
            $('#form-create').fadeToggle();
        }

        function closeFormCreate() {
            $('#form-create').fadeOut();
        }

        function openEditForm(userId) {
            // Tutup semua form edit yang sedang terbuka
            $('div[id^="form-row-"]').hide();

            // Buka form edit yang sesuai dengan userId
            $('#form-row-' + userId).fadeToggle();

            // Scroll ke form edit
            $('html, body').animate({
                scrollTop: $('#form-row-' + userId).offset().top - 100
            }, 600);
        }

        function closeEditForm(userId) {
            $('#form-row-' + userId).fadeOut();
        }

        function confirmDelete(userId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-delete-' + userId).submit();
                }
            });
        }
    </script>
@endpush
