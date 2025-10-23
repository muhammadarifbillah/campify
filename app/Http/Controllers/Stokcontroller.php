<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StokController extends Controller
{
    // Data stok default
    private $stok = [
        ['id' => 1, 'harga' => 120000, 'stok' => 10],
        ['id' => 2, 'harga' => 95000,  'stok' => 5],
        ['id' => 3, 'harga' => 150000, 'stok' => 7],
    ];

    // ✅ Tampilkan halaman stok
    public function index()
    {
        $stok = session('stok');

        // Cek apakah session kosong atau strukturnya salah
        if (empty($stok) || !isset($stok[0]['harga']) || !isset($stok[0]['stok'])) {
            session(['stok' => $this->stok]);
            $stok = $this->stok;
        }

        return view('stok.index', compact('stok'));
    }

    // ✅ Tambah data stok baru
    public function store(Request $request)
    {
        $stok = session('stok', []);

        // Dapatkan ID terakhir + 1
        $newId = empty($stok) ? 1 : end($stok)['id'] + 1;

        // Tambahkan data baru
        $stok[] = [
            'id' => $newId,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ];

        // Simpan ke session
        session(['stok' => $stok]);
        return redirect()->route('stok.index')->with('success', 'Data stok berhasil ditambahkan!');
    }

    // ✅ Edit data stok
    public function edit($id)
    {
        $stok = session('stok', $this->stok);
        $editProduk = collect($stok)->firstWhere('id', $id);
        return view('stok.index', compact('stok', 'editProduk'));
    }

    // ✅ Update data stok
    public function update(Request $request, $id)
    {
        $stok = session('stok', $this->stok);

        foreach ($stok as &$item) {
            if ($item['id'] == $id) {
                $item['harga'] = $request->harga;
                $item['stok'] = $request->stok;
                break;
            }
        }

        session(['stok' => $stok]);
        return redirect()->route('stok.index')->with('success', 'Data berhasil diperbarui!');
    }

    // ✅ Hapus data stok
    public function delete($id)
    {
        $stok = session('stok', $this->stok);
        $stok = array_filter($stok, fn($item) => $item['id'] != $id);

        session(['stok' => array_values($stok)]);
        return redirect()->route('stok.index')->with('success', 'Data berhasil dihapus!');
    }
}
