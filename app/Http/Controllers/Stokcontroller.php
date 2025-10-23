<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StokController extends Controller
{
    // Data stok default
    private $stok = [
        ['id' => 1, 'nama' => 'Jaket Outdoor', 'harga' => 120000, 'stok' => 10],
        ['id' => 2, 'nama' => 'Celana Gunung', 'harga' => 95000, 'stok' => 5],
        ['id' => 3, 'nama' => 'Sepatu Hiking', 'harga' => 150000, 'stok' => 7],
    ];

    // Tampilkan halaman stok
    public function index()
    {
        // Simpan default hanya sekali
        if (!session()->has('stok')) {
            session(['stok' => $this->stok]);
        }

        $stok = session('stok');
        return view('stok.index', compact('stok'));
    }

    // Tambah data stok baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        $stok = session('stok', []);
        $newId = empty($stok) ? 1 : end($stok)['id'] + 1;

        $stok[] = [
            'id' => $newId,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ];

        session(['stok' => $stok]);
        return redirect()->route('stok.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Edit produk
    public function edit($id)
    {
        $stok = session('stok', $this->stok);
        $editProduk = collect($stok)->firstWhere('id', $id);
        return view('stok.index', compact('stok', 'editProduk'));
    }

    // Update produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        $stok = session('stok', $this->stok);

        foreach ($stok as &$item) {
            if ($item['id'] == $id) {
                $item['nama'] = $request->nama;
                $item['harga'] = $request->harga;
                $item['stok'] = $request->stok;
                break;
            }
        }

        session(['stok' => $stok]);
        return redirect()->route('stok.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // Hapus produk
    public function delete($id)
    {
        $stok = session('stok', $this->stok);
        $stok = array_filter($stok, fn($item) => $item['id'] != $id);
        session(['stok' => array_values($stok)]);

        return redirect()->route('stok.index')->with('success', 'Produk berhasil dihapus!');
    }
}
