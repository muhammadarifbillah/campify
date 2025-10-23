<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Data default (dummy)
    private $defaultProducts = [
        [
            'id' => 1,
            'nama_produk' => 'Tenda Dome 2 Orang',
            'deskripsi' => 'Tenda ringan cocok untuk camping gunung.',
            'harga' => 250000,
            'stok' => 5,
            'kategori' => 'Camping'
        ],
        [
            'id' => 2,
            'nama_produk' => 'Carrier 60L',
            'deskripsi' => 'Tas gunung kapasitas besar untuk mendaki.',
            'harga' => 400000,
            'stok' => 3,
            'kategori' => 'Hiking'
        ],
        [
            'id' => 3,
            'nama_produk' => 'Tenda Dome 4 Orang',
            'deskripsi' => 'Tenda khusus 4 orang',
            'harga' => 150000,
            'stok' => 3,
            'kategori' => 'Camping'
        ],
    ];

    // 🔹 Ambil semua produk (dari session jika ada)
    public function index()
    {
        $products = session('products', $this->defaultProducts);
        return view('products.index', compact('products'));
    }

    // 🔹 Halaman create
    public function create()
    {
        return view('products.create');
    }

    // 🔹 Simpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        // Ambil produk lama dari session
        $products = session('products', $this->defaultProducts);

        // Buat ID baru
        $newId = collect($products)->max('id') + 1;

        // Tambah produk baru
        $products[] = [
            'id' => $newId,
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori' => $request->kategori,
        ];

        // Simpan ke session
        session(['products' => $products]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // 🔹 Halaman edit produk
    public function edit($id)
    {
        $products = session('products', $this->defaultProducts);
        $product = collect($products)->firstWhere('id', $id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Produk tidak ditemukan.');
        }

        return view('products.edit', compact('product'));
    }

    // 🔹 Update produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        $products = session('products', $this->defaultProducts);

        foreach ($products as &$p) {
            if ($p['id'] == $id) {
                $p['nama_produk'] = $request->nama_produk;
                $p['deskripsi'] = $request->deskripsi;
                $p['harga'] = $request->harga;
                $p['stok'] = $request->stok;
                $p['kategori'] = $request->kategori;
                break;
            }
        }

        session(['products' => $products]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // 🔹 Hapus produk
    public function destroy($id)
    {
        $products = session('products', $this->defaultProducts);
        $products = array_filter($products, fn($p) => $p['id'] != $id);
        session(['products' => $products]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}
