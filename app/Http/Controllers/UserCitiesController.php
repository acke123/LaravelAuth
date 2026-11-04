<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserCitiesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCitiesController extends Controller
{
    public function favorite(Request $request, $city)
    {
        $user = Auth::user();
        if (is_null($user)){
            return redirect()->back()->with(['error' => 'You must be logged in if you want to set city as a favorite']);
        }

        UserCitiesModel::create([
            'city_id' => $city,
            'user_id' => $user->id
        ]);
        return redirect()->back();
    }

    public function unfavorite(Request $request, $city)
    {
        $user = Auth::user();
        if (is_null($user)){
            return redirect()->back()->with(['error' => 'You must be logged in if you want to set city as a favorite']);
        }
        $userFavorites = UserCitiesModel::where([
            'city_id' => $city,
            'user_id' => $user->id
        ])->first();


        $userFavorites->delete();
        return redirect()->back();
    }
}
