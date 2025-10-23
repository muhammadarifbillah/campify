@extends('layouts.app')

@section('title', 'Daftar Produk Outdoor')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Daftar Produk Outdoor</h2>
    <a href="{{ route('products.create') }}" class="btn btn-success">+ Tambah Produk</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-success">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $key => $product)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $product['nama_produk'] }}</td>
            <td>{{ $product['deskripsi'] }}</td>
            <td>Rp{{ number_format($product['harga'], 0, ',', '.') }}</td>
            <td>{{ $product['stok'] }}</td>
            <td>{{ $product['kategori'] }}</td>
            <td>
                <a href="{{ route('products.edit', $product['id']) }}" class="btn btn-sm btn-warning">Edit</a>
                <a href="{{ route('products.destroy', $product['id']) }}" class="btn btn-sm btn-danger"
                   onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
