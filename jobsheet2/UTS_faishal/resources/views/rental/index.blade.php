@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <button onclick="openFormCreate()" class="btn btn-sm btn-info mt-1">Tambah Rental</button>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @include('rental.create')

        <div class="p-4">
            <table class="table table-bordered table-striped table-hover table-sm w-100" id="table_rental">
                <thead>
                    <tr>
                        <th>Nama User</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rentals as $rental)
                        <tr>
                            <td>{{ $rental->user->name }}</td>
                            <td>{{ $rental->books->title }}</td>
                            <td>{{ $rental->rental_date }}</td>
                            <td>{{ $rental->return_date }}</td>
                            <td>{{ $rental->status }}</td>
                            <td>
                                <div style="display: inline-flex; gap: 8px;">
                                    <a><button type="button" onclick="openEditForm({{ $rental->rentals_id }})"
                                        class="btn btn-warning btn-sm">Edit</button></a>
                                    <form id="form-delete-{{ $rental->rentals_id }}" action="{{ url('/rentals/' . $rental->rentals_id . '/delete') }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $rental->rentals_id }})">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <div id="form-row-{{ $rental->rentals_id }}" style="display: none;">
                            <div colspan="6">
                                @include('rental.edit', ['rental' => $rental, 'users' => $users, 'books' => $books])
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

    function openEditForm(rentalsId) {
        $('div[id^="form-row-"]').hide();
        $('#form-row-' + rentalsId).fadeToggle();
        $('html, body').animate({
                scrollTop: $('#form-row-' + rentalsId).offset().top - 100
            }, 600);
    }

    function closeEditForm(rentalsId) {
        $('#form-row-' + rentalsId).fadeOut();
    }

    function confirmDelete(rentalsId) {
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
                document.getElementById('form-delete-' + rentalsId).submit();
            }
        });
    }
</script>
@endpush
