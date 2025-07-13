<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Purchase;
use App\Models\Profile;

class PurchaseController extends Controller
{
    public function store(Item $item)
    {
        if ($item->purchases()->exists()){
            return back()->with('message', 'すでに購入されています');
        }
        //dd($item->id);

        Purchase::create([
            'user_id' => auth()->id(),
            'item_id' => $item->id,
        ]);
        
        $item->is_sold = true;
        $item->save();

        return redirect('/')->with('message', '購入しました');
    }

    public function confirm(Item $item)
    {
        return view('purchase', ['item' => $item]);
    }

    public function edit(Item $item)
    {
        $profile = auth()->user()->profile;
        return view('address_edit', compact('item', 'profile'));
    }

    public function update(Request $request, Item $item)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'postal_code' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'building' => 'nullable|string|max:255',
        ]);
        $user->profile->update($validated);

        return redirect()->back()->with('message', '配送先を更新しました。');
    }
}
