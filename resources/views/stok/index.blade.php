@extends('layouts.main')

@section('title', 'Kelola Stok Barang')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h4 class="mb-4 text-success">Kelola Stok Barang</h4>

        {{-- Form Tambah --}}
        @if(!isset($editProduk))
            <form action="{{ route('stok.store') }}" method="POST" class="mb-4">
                @csrf
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <input type="number" name="harga" class="form-control" placeholder="Harga" required>
                    </div>
                    <div class="col">
                        <input type="number" name="stok" class="form-control" placeholder="Stok" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </div>
            </form>
        @endif

        {{-- Form Edit --}}
        @if(isset($editProduk))
            <form action="{{ route('stok.update', $editProduk['id']) }}" method="POST" class="mb-4">
                @csrf
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <input type="number" name="harga" value="{{ $editProduk['harga'] }}" class="form-control" required>
                    </div>
                    <div class="col">
                        <input type="number" name="stok" value="{{ $editProduk['stok'] }}" class="form-control" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('stok.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
            </form>
        @endif

        {{-- Tabel Data --}}
        <table class="table table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stok as $item)
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                        <td>{{ $item['stok'] }}</td>
                        <td>
                            <a href="{{ route('stok.edit', $item['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('stok.delete', $item['id']) }}" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin mau hapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
