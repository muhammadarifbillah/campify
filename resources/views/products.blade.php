<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Penjualan</title>
    <!-- Panggil file CSS dari folder public/css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="brand">Campify</div>
        <form action="{{ route('search-products') }}" method="GET">
            <input type="text" name="search" placeholder="Cari produk..." value="{{ $keyword }}">
            <button type="submit">Cari</button>
        </form>
    </div>

    <!-- Konten utama -->
    <div class="container">
        <h2>🛒 Daftar Produk</h2>

        @if(count($products) > 0)
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $p)
                        <tr>
                            <td>{{ $p['id'] }}</td>
                            <td>{{ $p['name'] }}</td>
                            <td>Rp {{ number_format($p['price'], 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Tidak ada produk ditemukan.</p>
        @endif
    </div>

</body>
</html>
