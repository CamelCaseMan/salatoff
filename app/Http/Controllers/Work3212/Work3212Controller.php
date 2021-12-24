<?php

namespace App\Http\Controllers\Work3212;

use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Http\Request;

class Work3212Controller
{
    public function index()
    {
        $atr = Attribute::all();
        $count = round((count($atr) * 100) / 383, 2);
        return view('work3212.index', compact('count'));
    }

    public function add(Request $request)
    {
        $product = [
            'name' => $request->name,
            'slug' => \Str::of($request->name)->slug('-')->snake(),
            'category_id' => $request->category_id,
            'price' => $request->price,
            'image' => $request->image,
            'show' => 1
        ];


        $product_id = Product::create($product)->id;

        $atr = Attribute::find($product_id);
        if (is_null($atr)) {
            $attribyte = [
                'product_id' => $product_id,
                'weight' => $request->weight,
                'nutrients' => $request->nutrients,
                'energy' => $request->energy,
                'composition' => $request->composition,
                'implementation_period' => $request->implementation_period,
            ];

            Attribute::create($attribyte);
        } else {
            dd('Уже атрибуты этому товару добавлены');
        }

        return redirect('/work3212')->with('message', 'Товар добавлен!');
    }
}