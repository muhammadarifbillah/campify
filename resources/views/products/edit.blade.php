@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<h2>Edit Produk: {{ $product['nama_produk'] }}</h2>

<form action="{{ route('products.update', $product['id']) }}" method="POST">
    @csrf
    @method('POST') 
    
    <div class="mb-3">
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" class="form-control" value="{{ $product['nama_produk'] }}">
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3">{{ $product['deskripsi'] }}</textarea>
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-label" value="{{ $product['harga'] }}" disabled>
        <input type="hidden" name="harga" value="{{ $product['harga'] }}">
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" value="{{ $product['stok'] }}" disabled>
        <input type="hidden" name="stok" value="{{ $product['stok'] }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="kategori" class="form-select">
            <option value="{{ $product['kategori'] }}">{{ $product['kategori'] }}</option>
            <option value="Camping">Camping</option>
            <option value="Hiking">Hiking</option>
            <option value="Climbing">Climbing</option>
        </select>
    </div>

    <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
</form>
@endsection

