<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('menu.index', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['image'] = Storage::put('/images', $data['image']);
        Product::create($data);
        return redirect()->route('menu');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('menu');
    }

    public function status($id)
    {
        $product = Product::find($id);
        $product->update(['status' => $product->status == 1 ? 0 : 1]);
        return redirect()->route('menu');
    }
}
