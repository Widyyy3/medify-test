@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="form-group mb-2">
                <a href="{{ url('kategoris/form/new') }}" class="btn btn-secondary">
                    + Kategori Baru
                </a>
            </div>

            <div class="card">
                <div class="card-header">
                    Daftar Kategori Items
                </div>

                <div class="card-body">

                    <form method="GET" action="{{ url('kategoris') }}" class="mb-3">
                        <div class="row">

                            <div class="col-5">
                                <label>Nama</label>
                                <input
                                    type="text"
                                    name="nama"
                                    class="form-control"
                                    value="{{ request('nama') }}"
                                >
                            </div>

                            <div class="col-5">
                                <label>Kode</label>
                                <input
                                    type="text"
                                    name="kode"
                                    class="form-control"
                                    value="{{ request('kode') }}"
                                >
                            </div>

                            <div class="col-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary">
                                    Filter
                                </button>
                            </div>

                        </div>
                    </form>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kode</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($data as $index => $kategori)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $kategori->nama }}</td>
                                <td>{{ $kategori->kode }}</td>
                                <td>
                                    <a
                                        href="{{ url('kategoris/view/' . $kategori->id) }}"
                                        class="btn btn-primary btn-sm"
                                    >
                                        View
                                    </a>

                                    <a
                                        href="{{ url('kategoris/form/edit/' . $kategori->id) }}"
                                        class="btn btn-warning btn-sm"
                                    >
                                        Edit
                                    </a>

                                    <a
                                        href="{{ url('kategoris/delete/' . $kategori->id) }}"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this category?');"
                                    >
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    Belum ada kategori.
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