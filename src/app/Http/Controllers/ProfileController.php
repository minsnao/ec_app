<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\Item;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function show()
    {
        $item = Item::first();
        $user = auth()->user();
        $itemsForSale = $user->items()->get();

        $purchasedItems = Item::whereHas('purchases', function($query) use ($user){
            $query->where('user_id', $user->id);
        })->get();
        return view('profile', compact('user', 'itemsForSale', 'purchasedItems', 'item'));
    }

    public function edit()
    {
        $user = auth()->user();
        $profile = $user->profile;
        return view('profile_edit', compact('profile', 'user'));
    }

    public function update(ProfileRequest $request)
    {
        $user = auth()->user();
        $validated = $request->validated();

        if ($request->hasFile('avatar')) {
            if (!Storage::disk('public')->exists('avatars')) {
                Storage::disk('public')->makeDirectory('avatars');
            }
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }
        $user->save();

        if ($user->profile) {
            $user->profile->update([
                'postal_code' => $validated['postal_code'],
                'address' => $validated['address'],
                'building' => $validated['building'],
            ]);
        } else {
            $user->profile()->create([
                'postal_code' => $validated['postal_code'],
                'address' => $validated['address'],
                'building' => $validated['building'],
            ]);
        }

        return redirect('mypage');
    }
}
