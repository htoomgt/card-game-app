<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\Events\ScoreUpdate;

class CardController extends Controller
{
    public function show(Card $card){
        $user = auth()->user();
        $user->score = $user->score + $card->value;
        $user->save();

        event(new ScoreUpdate($user)); // broadcast `ScoreUpdated` event

        return redirect()->back()->withValue($card->value);
    }
}
