@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <button onclick="openFormCreate()" class="btn btn-sm btn-info mt-1">Tambah Buku</button>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @include('book.create')
            <div class="p-4">
                <table class="table table-bordered table-striped table-hover table-sm w-100" id="table_book">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->stock }}</td>
                                <td>
                                    <div style="display: inline-flex; gap: 8px;">
                                        <a><button type="button" onclick="openEditForm({{ $book->book_id }})"
                                                class="btn btn-warning btn-sm">Edit</button></a>
                                        <form id="form-delete-{{ $book->book_id }}"
                                            action="{{ url('/books/' . $book->book_id . '/delete') }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="confirmDelete({{ $book->book_id }})">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <div id="form-row-{{ $book->book_id }}" style="display: none;">
                                <div colspan="4">
                                    @include('book.edit', ['book' => $book])
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

        function openEditForm(bookId) {
            // Tutup semua form edit yang sedang terbuka
            $('div[id^="form-row-"]').hide();

            // Buka form edit yang sesuai dengan bookId
            $('#form-row-' + bookId).fadeToggle();

            // Scroll ke form edit
            $('html, body').animate({
                scrollTop: $('#form-row-' + bookId).offset().top - 100
            }, 600);
        }

        function closeEditForm(bookId) {
            $('#form-row-' + bookId).fadeOut();
        }

        function confirmDelete(bookId) {
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
                    document.getElementById('form-delete-' + bookId).submit();
                }
            });
        }
    </script>
@endpush
