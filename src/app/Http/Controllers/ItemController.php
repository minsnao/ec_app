<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\Profile;
use App\Models\Purchase;
use App\Http\Requests\SellItemRequest;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::query();
    
        if ($request->filled('keyword')) {
            $query->where('title', 'like', '%' . $request->keyword . '%');
        }
    
        if ($request->filled('category_id')) {
            $categoryId = $request->category_id;

            $query->whereHas('categories', function($q) use ($categoryId) {
                $q->where('categories.id', $categoryId);
            });
        }
    
        $items = $query->get();
        $categories = Category::all();
        
        $likedItems = auth()->check() ? auth()->user()->likedItems : collect();

        $user = auth()->user(); 

        return view('index', compact('items', 'categories', 'likedItems', 'user'));
        // 事項：挙動コードの確認を行う
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('detail', compact('item',));
    }

    public function create()
    {
        
        $categories = Category::all();
        return view('sell', compact('categories'));
    }

    public function store(SellItemRequest $request)
    {
        $validated = $request->validated();
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
