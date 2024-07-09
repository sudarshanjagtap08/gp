<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use auth;

class FavoriteController extends Controller
{
    public function addToFavorites(Request $request)
    {
        if (auth()->check()) {
            $user = auth()->user();
            $propertyId = $request->input('propertyId');
            $isFavorite = Favorite::where('user_id', $user->id)
                ->where('property_id', $propertyId)
                ->exists();

            if ($isFavorite) {
                Favorite::where('user_id', $user->id)
                    ->where('property_id', $propertyId)
                    ->delete();
            } else {
                Favorite::create([
                    'user_id' => $user->id,
                    'property_id' => $propertyId,
                ]);
            }

            return response()->json(['success' => true, 'isFavorite' => !$isFavorite]);
        }

        return response()->json(['error' => 'Please log in to add properties to favorites']);
    }

}
