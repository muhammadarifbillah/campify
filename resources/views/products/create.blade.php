@extends('layouts.app')

@section('title', 'Tambah Produk Baru')

@section('content')
<h2>Tambah Produk Baru</h2>

<form action="{{ route('products.store') }}" method="POST" class="mt-3">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nama Produk</label>
        <input type="text" name="nama_produk" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" name="harga" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stok" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="kategori" class="form-select">
            <option value="">Pilih Kategori</option>
            <option value="Camping">Camping</option>
            <option value="Hiking">Hiking</option>
            <option value="Climbing">Climbing</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
