<?php

namespace App\Http\Controllers;

use App\Card;
use App\User;
use App\Events\ScoreUpdate;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function show(Card $card){
        $user = auth()->user();
        $user->score = $user->score + $card->value;
        $user->save();

        event(new ScoreUpdate($user)); // broadcast `ScoreUpdated` event

        return redirect()->back()->withValue($card->value);
    }

    public function leaderboard(){
        return User::all(['id', 'name', 'score']);
    }
}
