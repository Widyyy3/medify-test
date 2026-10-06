@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="form-group mb-2">
                    <a href="{{ url('kategoris') }}" class="btn btn-secondary">
                        Kembali ke Daftar Kategori
                    </a>
                </div>

                <a href="{{ url('kategoris/pdf/' . $kategori->id) }}" class="btn btn-danger">
                    Download PDF
                </a>

                <div class="card">
                    <div class="card-header">
                        Detail Kategori
                    </div>

                    <div class="card-body">

                        <table class="mb-4">
                            <tr>
                                <th>Nama Kategori</th>
                                <td class="px-2">:</td>
                                <td>{{ $kategori->nama }}</td>
                            </tr>
                            <tr>
                                <th>Kode Kategori</th>
                                <td class="px-2">:</td>
                                <td>{{ $kategori->kode }}</td>
                            </tr>
                        </table>

                        <h5>Daftar Items</h5>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama Item</th>
                                    <th>Jenis</th>
                                    <th>Harga Beli</th>
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
                                        <td>{{ $item->harga_beli }}</td>
                                        <td>{{ $item->supplier }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            Belum ada item dalam kategori ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection