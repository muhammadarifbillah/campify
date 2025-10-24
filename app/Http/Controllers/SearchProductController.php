<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchProductController extends Controller
{
    private $products = [
        ['id' => 1, 'name' => 'Tenda Dome 2 Orang', 'price' => 250000],
        ['id' => 2, 'name' => 'Tenda Dome 4 Orang', 'price' => 150000],
        ['id' => 3, 'name' => 'Carrier 60L', 'price' => 400000],
    ];

    public function index(Request $request)
   {
    $keyword = strtolower ((string) $request->get('search', ''));

    $filtered = array_values(array_filter($this->products, function($products) use ($keyword) {
        if ($keyword === '') {
            return true;
        }

    return str_contains(strtolower(string: $products['name']), $keyword);
    }));

    return view('products', [
        'products' => $filtered,
        'keyword' => $keyword,
    ]);
    
   }
}
