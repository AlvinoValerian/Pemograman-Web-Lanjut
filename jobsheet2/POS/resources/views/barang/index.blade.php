@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Daftar Barang</h3>
            <div class="card-tools">
                <button onclick="modalAction('{{url('/barang/import')}}')" class="btn btn-sm btn-info mt-1">Import Barang</button>
                {{-- <a class="btn btn-sm btn-primary mt-1" href="{{ url('barang/create') }}">Tambah Data</a> --}}
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('barang/export_excel') }}"><i class="fa fa-file-excel mr-1"></i>Tambah Data</a>
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('barang/export_pdf') }}"><i class="fa fa-file-pdf mr-1"></i>Export Data</a>
                <button onclick="modalAction('{{url('/barang/create_ajax')}}')" class="btn btn-sm btn-success mt-1">Tambah
                    Data (Ajax)</button>
            </div>
        </div>
        <div class="card-body">

            {{-- untuk filter data --}}
            <div id="filter" class="form-horizontal filter-date p-2 border-bottom mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-sm row text-sm mb-0">
                            <label for="filter_date" class="col-md-1 col-form-
            label">Filter</label>
                            <div class="col-md-3">
                                <select name="filter_kategori" class="form-control form-
            control-sm filter_kategori">
                                    <option value="">- Semua -</option>
                                    @foreach ($kategori as $l)
                                        <option value="{{ $l->kategori_id }}">{{ $l->kategori_nama }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Kategori Barang</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Filter :</label>
                        <div class="col-3">
                            <select class="form-control" id="kategori_id" name="kategori_id" required>
                                <option value="">- Semua -</option>
                                @foreach ($kategori as $item)
                                <option value="{{ $item->kategori_id }}">{{ $item->kategori_nama }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Kategori Barang</small>
                        </div>
                    </div>
                </div>
            </div> --}}

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped table-hover table-sm" id="table_barang">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barang Kode</th>
                        <th>Barang Nama</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>kategori Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
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
            $('#myModal').load(url, function () {
                $('#myModal').modal('show');
            });
        }

        var dataBarang;
        // var tableBarang;
        $(document).ready(function () {
            dataBarang = $('#table_barang').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('barang/list') }}",
                    type: "GET",
                    dataType: 'json',
                    data: function (d) {
                        d.filter_kategori = $('.filter_kategori').val();
                    },
                    error: function (xhr, error, thrown) {
                        console.error('Error:', xhr.responseText);
                        alert('Terjadi kesalahan saat memuat data. Lihat konsol untuk detail.');
                    }
                },
                columns: [{
                    data: 'DT_RowIndex',
                    // data: 'No_Urut',
                    className: 'text-center',
                    width: "5%",
                    orderable: false,
                    searchable: false
                }, {
                    data: "barang_kode",
                    className: "",
                    width: "10%",
                    orderable: true,
                    searchable: true
                }, {
                    data: "barang_nama",
                    className: "",
                    width: "37%",
                    orderable: true,
                    searchable: true
                }, {
                    data: "harga_beli",
                    className: "",
                    width: "10%",
                    orderable: true,
                    // searchable: true
                    searchable: false,
                    render: function (data, type, row) {
                        return new Intl.NumberFormat('id-ID').format(data);
                    }
                }, {
                    data: "harga_jual",
                    className: "",
                    width: "10%",
                    orderable: true,
                    // searchable: true
                    searchable: false,
                    render: function (data, type, row) {
                        return new Intl.NumberFormat('id-ID').format(data);
                    }
                }, {
                    data: "kategori.kategori_nama",
                    className: "",
                    width: "14%",
                    orderable: true,
                    searchable: false
                }, {
                    data: "aksi",
                    className: "text-center",
                    width: "14%",
                    orderable: false,
                    searchable: false
                }]
            });

            $('#table-barang_filter input').unbind().bind().on('keyup', function (e) {
                if (e.keyCode == 13) { //enter key
                    tableBarang.search(this.value).draw();
                }
            });

            // $('#kategori_id').on('change', function () {
            //     dataBarang.ajax.reload();
            // });
            $('.filter_kategori').change(function () {
                tableBarang.draw();
                tableBarang.ajax.reload();
            });
        });
    </script>
@endpush