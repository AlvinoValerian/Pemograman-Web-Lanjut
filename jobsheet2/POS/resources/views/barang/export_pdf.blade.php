<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 6px 20px 5px 20px;
            line-height: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td, th {
            padding: 4px 3px;
        }

        th {
            text-align: left;
        }

        .d-block {
            display: block;
        }

        img.image {
            width: auto;
            height: 80px;
            max-width: 150px;
            max-height: 150px;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .p-1 {
            padding: 5px 1px 5px 1px;
        }

        .font-size-8pt {
            font-size: 8pt;
        }

        .font-11 {
            font-size: 11pt;
        }

        .font-12 {
            font-size: 12pt;
        }

        .font-13 {
            font-size: 13pt;
        }

        .border-bottom-header {
            border-bottom: 1px solid;
        }

        .border-all {
            border: 1px solid;
        }

        .border-all th, .border-all td {
            border: 1px solid;
        }
    </style>
</head>
<body>
<table class="border-bottom-header">
    <tr>
        <td width="15%" class="text-center"><img src="{{ asset('https://upload.wikimedia.org/wikipedia/id/4/4a/Logo_Politeknik_Negeri_Malang.png') }}" class="image"></td>
        <td width="85%">
            <span class="text-center d-block font-11 font-bold mb-1">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</span>
            <span class="text-center d-block font-13 font-bold mb-1">POLITEKNIK NEGERI MALANG</span>
            <span class="text-center d-block font-11">Jl. Soekarno-Hatta no. 9 Malang 65141</span>
            <span class="text-center d-block font-11">Telepon (0341) 404424, Fax. (0341) 404420</span>
            <span class="text-center d-block font-11">Laman: www.polinema.ac.id</span>
        </td>
    </tr>
</table>

<h3>LAPORAN DATA BARANG</h3>
<table class="border-all">
    <thead>
    <tr>
        <th class="text-center">NO</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th class="text-right">Harga Beli</th>
        <th class="text-right">Harga Jual</th>
        <th>Kategori</th>
    </tr>
    </thead>
    <tbody>
    @foreach($barang as $b)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $b->barang_kode }}</td>
            <td>{{ $b->barang_nama }}</td>
            <td class="text-right">{{ number_format($b->harga_beli, 0, ',', '.') }}</td>
            <td class="text-right">{{ number_format($b->harga_jual, 0, ',', '.') }}</td>
            <td>{{ $b->kategori->kategori_nama }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>