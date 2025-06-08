<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('index', compact('items'));
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('detail', compact('item'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('sell', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'condition' => 'required',
            'brand' => 'nullable|string|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,jpe,png|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        $item = Item::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'price' => $validated['price'],
            'condition' => $validated['condition'],
            'brand' => $validated['brand'] ?? null,
            'description' => $validated['description'],
            'image' => $imagePath
        ]);

        $item->categories()->attach($request->input('categories', []));

        return redirect('/')->with('message', '商品を出品しました！');
    }
}
