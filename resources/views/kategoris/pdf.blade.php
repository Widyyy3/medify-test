<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>Detail Kategori {{ $kategori->nama }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
        }

        th {
            background-color: #eeeeee;
        }

        .info-table {
            width: auto;
            border: none;
            margin-top: 0;
        }

        .info-table td,
        .info-table th {
            border: none;
            padding: 4px 8px 4px 0;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
        }
    </style>
</head>

<body>

    <h2>Detail Kategori Items</h2>

    <table class="info-table">
        <tr>
            <th>Nama Kategori</th>
            <td>: {{ $kategori->nama }}</td>
        </tr>

        <tr>
            <th>Kode Kategori</th>
            <td>: {{ $kategori->kode }}</td>
        </tr>
    </table>

    <h3>Daftar Items</h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Item</th>
                <th>Jenis</th>
                <th>Harga Beli</th>
                <th>Laba (%)</th>
                <th>Supplier</th>
            </tr>
        </thead>

        <tbody>
            @forelse($kategori->masterItems as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jenis }}</td>
                    <td>{{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                    <td>{{ $item->laba }}%</td>
                    <td>{{ $item->supplier }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">
                        Belum ada item dalam kategori ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ now()->format('d-m-Y H:i:s') }}
</div>

</body>
</html>