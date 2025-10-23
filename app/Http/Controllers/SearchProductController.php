<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchProductController extends Controller
{
    private $products = [
        ['id' => 1, 'name' => 'Sepatu Gunung', 'price' => 350000],
        ['id' => 2, 'name' => 'Tenda 2 Orang', 'price' => 750000],
        ['id' => 3, 'name' => 'Carrier 60L', 'price' => 680000],
        ['id' => 4, 'name' => 'Jaket Waterproof', 'price' => 450000],
        ['id' => 5, 'name' => 'Sleeping Bag', 'price' => 250000],
    ];

    public function index(Request $request)
    {
        $keyword = strtolower((string) $request->get('search', ''));

        $filtered = array_values(array_filter($this->products, function($product) use ($keyword) {
            if ($keyword === '') {
                return true;
            }
            return str_contains(strtolower($product['name']), $keyword);
        }));

        return view('products', [
            'products' => $filtered,
            'keyword' => $keyword,
        ]);
    }
}
